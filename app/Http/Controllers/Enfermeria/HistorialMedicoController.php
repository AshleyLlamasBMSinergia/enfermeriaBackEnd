<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\EAntidoping;
use App\Models\EEmbarazo;
use App\Models\EFisico;
use App\Models\EVista;
use App\Models\Externo;
use App\Models\HistorialMedico;
use App\Models\Imagen;
use App\Models\NomEmpleado;
use App\Models\RHDependiente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class HistorialMedicoController extends Controller
{
    public function pdf($id, $fecha){

        $historialMedico = HistorialMedico::find($id);

        $fechaNacimiento = Carbon::parse($historialMedico->pacientable->fechaNacimiento);
        $edad = $fechaNacimiento->age;

        $fechaCreacion = Carbon::parse($fecha)->locale('es');
        $fechaFormateada = $fechaCreacion->isoFormat('D [de] MMMM [del] YYYY');

        $examenFisico = EFisico::where('historialMedico_id', $historialMedico->id)->whereDate('fecha', $fecha)->first();
        $examenAntidoping = EAntidoping::where('historialMedico_id', $historialMedico->id)->whereDate('fecha', $fecha)->first();
        $examenEmbarazo = EEmbarazo::where('historialMedico_id', $historialMedico->id)->whereDate('fecha', $fecha)->first();
        $examenVista = EVista::where('historialMedico_id', $historialMedico->id)->whereDate('fecha', $fecha)->first();

        $pdf = PDF::loadView('pdfs.formatoEnfermeria', [
            'historialMedico' => $historialMedico,
            'edad' => $edad,
            'fecha' => $fechaFormateada,
            'examenFisico' => $examenFisico,
            'examenAntidoping'=> $examenAntidoping,
            'examenEmbarazo' => $examenEmbarazo,
            'examenVista'=> $examenVista,
        ]);

        return $pdf->stream('historial-medico.pdf');
    }  

    public function index(){
        $data = HistorialMedico::with('pacientable')->orderBy('created_at', 'desc')
        ->take(100)
        ->get();
        return response()->json($data, 200);
    }

    public function show($id){
        
        $data = HistorialMedico::with(
            [
            'examenes.archivos',
            'pacientable',
            'pacientable.image',
            'antecedentesPersonalesPatologicos',
            'antecedentesPersonalesNoPatologicos',
            'antecedentesHeredofamiliares',
            'examenesFisicos',
            'examenesFisicos.cabeza',
            'examenesFisicos.organoSentido',
            'examenesFisicos.torax',
            'examenesFisicos.abdomen',
            'examenesFisicos.extremidad',
            'examenesFisicos.columnaVertebral',
            'examenesAntidoping',
            'examenesAntidoping.sustancias',
            'examenesEmbarazo',
            'examenesVista',
            ])->find($id);

        if (!$data) {
            return response()->json(['error' => 'Historial médico no encontrado'], 404);
        }else{
            if ($data->examenes) {

                $examenesPorCategoria = $data->examenes->groupBy('categoria');
                $data->examenesPorCategoria = $examenesPorCategoria;
            }

            if ($data->pacientable_type === 'App\\Models\\NomEmpleado') {
                $data->load(
                    'pacientable.dependientes',
                    'pacientable.dependientes.historialMedico',
                    'pacientable.dependientes.image',
                    'pacientable.dependientes.empleado.historialMedico',
                    'pacientable.puesto',
                    'pacientable.image'
                );
            }
        }

        return response()->json($data, 200);
    }

    public function buscador(Request $request){
        try{    
            $nombre = $request->input('nombre');
    
            $historialesMedicos = HistorialMedico::whereHas('pacientable', function($query) use ($nombre) {
                $query->where('nombre', 'like', '%' . $nombre . '%');
            })->with(['pacientable'])->get();

            return response()->json($historialesMedicos);    
         }catch(\Exception $e){
            return response()->json([
                'error' => 'Ocurrió un error: '.$e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request){
        try{
            //Crear cuenta de usuario
            switch($request['paciente'])
            {
                case 'Empleado':
                    $nomEmpleado = NomEmpleado::create([
                        'numero' => $request['numero'],
                        'nombre' => $request['nombre'],
                        'RFC' => $request['RFC'],
                        'CURP' => $request['CURP'],
                        'IMSS' => $request['IMSS'],
                        'sexo' => $request['sexo'],
                        'fechaNacimiento' => $request['fechaNacimiento'],
                        'estadoCivil' => $request['estadoCivil'],
                        'telefono' => $request['prefijoInternacional'].$request['telefono'],
                        'correo' => $request['email'],
                        // 'direccion_id',
                        // 'estatus',
                        // 'puesto_id',
                        // 'clinica',
                    ]);

                    $pacientable_id = $nomEmpleado->id;
                    $pacientable_type = NomEmpleado::class;

                    $user = User::create([
                        'name' => $request['nombre'],
                        'email' => $request['email'],
                        // 'password' => Hash::make(Str::random(8)),
                        'password' => Hash::make(1),
                        'nickname' => $request['nickname'],
                        'useable_id' => $pacientable_id,
                        'useable_type' => $pacientable_type,
                    ]);
                break;
                case 'Externo':
                    $externo = Externo::create([
                        'nombre' => $request['nombre'],
                        'sexo' => $request['sexo'],
                        'fechaNacimiento' => $request['fechaNacimiento'],
                        'telefono' => $request['prefijoInternacional'].$request['telefono'],
                        'correo' => $request['email'],
                    ]);

                    $pacientable_id = $externo->id;
                    $pacientable_type = Externo::class;
                break;
                default:
                    return response()->json([
                        'error' => 'No se encontro el tipo de paciente'
                    ], 500);
            }

            if($request['imagen']){
                $imagenBase64 = explode(";base64,",$request['imagen']);
                $imagenExplode = explode("image/", $imagenBase64[0]);
                $imagenFormato = $imagenExplode[1];
                $imagen = base64_decode($imagenBase64[1]);
                $imagenNombre = Str::random(12);
                $ruta = storage_path('app/private/fotografías/'.$imagenNombre.'.'.$imagenFormato);

                file_put_contents($ruta, $imagen);
            
                // Guardar la imagen
                $imagen = Imagen::create([
                    'url' => $imagenNombre.'.'.$imagenFormato,
                    'categoria' => 'fotografías',
                    'imageable_id' => $pacientable_id,
                    'imageable_type' => $pacientable_type
                ]);
            }

            //Crear historial medico
            $historialMedico = HistorialMedico::create([
                'pacientable_id' => $pacientable_id,
                'pacientable_type' => $pacientable_type,
                'talla' => $request['talla'],
                'peso' => $request['peso'],
                //'user_id' => $user->id
            ]);

            return response()->json([
                'message' => 'Historial médico guardado exitosamente',
            ]);

        }catch(\Exception $e){
            Log::error($e);
            return response()->json([
                 'error' => $e->getMessage()
                //'error' => $request,
            ], 500);
        }
    }

    public function update($id, Request $request){
        try{
            $historialMedico = HistorialMedico::find($id);

            if (!$historialMedico) {
                return response()->json(['error' => 'Historial médico no encontrado'], 404);
            }

            $historialMedico->update([
                'talla' => $request['talla'],
                'peso' => $request['peso'],
            ]);

            switch($request['paciente'])
            {
                case 'Empleado':
                    
                    switch($historialMedico->pacientable_type == NomEmpleado::class){
                        case NomEmpleado::class:

                            $historialMedico->pacientable->update([
                                'nombre' => $request['nombre'],
                                'RFC' => $request['RFC'],
                                'CURP' => $request['CURP'],
                                'IMSS' => $request['IMSS'],
                                'sexo' => $request['sexo'],
                                'fechaNacimiento' => $request['fechaNacimiento'],
                                'estadoCivil' => $request['estadoCivil'],
                                'telefono' => $request['prefijoInternacional'].$request['telefono'],
                                'correo' => $request['email'],
                                // 'direccion_id',
                                // 'estatus',
                                // 'puesto_id',
                            ]);
        
                            if ($historialMedico->pacientable->user) {
                                $historialMedico->pacientable->user->update([
                                    'name' => $request['nombre'],
                                    'email' => $request['email'],
                                    'nickname' => $request['nickname'],
                                ]);
                            } else {
                                return response()->json(['error' => 'No se pudo actualizar el usuario asociado'], 500);
                            }
                        break;
                        case Externo::class:

                        break;
                    }

                break;
                case 'Externo':
                    $historialMedico->pacientable->update([
                        'nombre' => $request['nombre'],
                        'sexo' => $request['sexo'],
                        'fechaNacimiento' => $request['fechaNacimiento'],
                        'telefono' => $request['prefijoInternacional'].$request['telefono'],
                        'correo' => $request['email'],
                    ]);
                break;
                default:
                    return response()->json([
                        'error' => 'No se encontro el tipo de paciente'
                    ], 400);
            }

            if($request['imagen']){
                if($historialMedico->pacientable->image){
                    Storage::delete($historialMedico->pacientable->image->url);
                    $historialMedico->pacientable->image->delete();
                }

                $imagenBase64 = explode(";base64,",$request['imagen']);
                $imagenExplode = explode("image/", $imagenBase64[0]);
                $imagenFormato = $imagenExplode[1];
                $imagen = base64_decode($imagenBase64[1]);
                $imagenNombre = Str::random(12);
                $ruta = storage_path('app/private/fotografías/'.$imagenNombre.'.'.$imagenFormato);

                file_put_contents($ruta, $imagen);
            
                // Guardar la imagen
                $imagen = Imagen::create([
                    'url' => $imagenNombre.'.'.$imagenFormato,
                    'categoria' => 'fotografías',
                    'imageable_id' => $historialMedico->pacientable_id,
                    'imageable_type' => $historialMedico->pacientable_type,
                ]);
            }

            return response()->json([
                'message' => 'Historial médico guardado exitosamente',
            ]);

        }catch(\Exception $e){
            // Log::error($e);
            return response()->json([
                 'error' => $e->getMessage()
                //'error' => $request,
            ], 500);
        }

    }

    public function destroy($id)
    {
        try{
            $historialMedico = HistorialMedico::find($id);

            if (!$historialMedico) {
                return response()->json([
                    'message' => "El historial médico con ID $id no existe",
                ], 404);
            }

            if ($historialMedico->pacientable) {

                if ($historialMedico->pacientable->image) {
                    Storage::delete('private/fotografías/'.$historialMedico->pacientable->image->url);
                    $historialMedico->pacientable->image->delete();
                }

                $historialMedico->pacientable->delete();
            }

            foreach(Cita::where('paciente_id', $historialMedico->id)->get() as $cita) {
                $cita->delete();
            }

            $historialMedico->delete();

            return response()->json([
                'message' => "Historial médico eliminado exitosamente",
            ]);

        }catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'error' => 'Ocurrió un error al eliminar el historial médico'
            ], 500);
        }
    }

    public function historialMedicoEmpleado($id){
        try{
            $data = $data = $this->buscarHistorialMedicoPorTipo($id, NomEmpleado::class);

            if (!$data) {
                return response()->json(['error' => 'Historial médico no encontrado'], 404);
            }
            return response()->json($data, 200);
        }catch(\Exception $e){

        }
    }
    public function historialMedicoExterno($id){
        try{
            $data = $this->buscarHistorialMedicoPorTipo($id, Externo::class);

            if (!$data) {
                return response()->json(['error' => 'Historial médico no encontrado'], 404);
            }
            return response()->json($data, 200);
        }catch(\Exception $e){

        }
    }

    public function historialMedicoDependiente($id){
        try{
            $data = $data = $this->buscarHistorialMedicoPorTipo($id, RHDependiente::class);

            if (!$data) {
                return response()->json(['error' => 'Historial médico no encontrado'], 404);
            }
            return response()->json($data, 200);
        }catch(\Exception $e){
            Log::error($e);
            return response()->json([
                 'error' => $e->getMessage()
            ], 500);
        }
    }

    public function buscarHistorialMedicoPorTipo($id, $tipo){
        return HistorialMedico::where('pacientable_id', $id)->where('pacientable_type', $tipo)->with('pacientable',
            'pacientable.image', 'antecedentesPersonalesPatologicos')->first();
    }
}