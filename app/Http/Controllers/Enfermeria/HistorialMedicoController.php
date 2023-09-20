<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Externo;
use App\Models\HistorialMedico;
use App\Models\Imagen;
use App\Models\NomEmpleado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class HistorialMedicoController extends Controller
{
    public function index(){
        $data = HistorialMedico::with('pacientable')->get();
        return response()->json($data, 200);
    }

    public function show($id){
        
        $data = HistorialMedico::with(
            ['pacientable',
            'pacientable.puesto',
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
            'examenes'
            ])->find($id);

        if (!$data) {
            return response()->json(['error' => 'Historial médico no encontrado'], 404);
        }
        return response()->json($data, 200);
    }

    public function buscador(Request $request){
        try{
            $nombre = $request['nombre'];
    
            $historialesMedicos = HistorialMedico::whereHas('pacientable', function($query) use ($nombre) {
                $query->where('nombre', 'like', '%' . $nombre . '%')->orWhere('paterno', 'like', '%' . $nombre . '%')->orWhere('materno', 'like', '%' . $nombre . '%');
            })->with(['pacientable'])->get();
    
            return response()->json($historialesMedicos);
    
         }catch(\Exception $e){
            return response()->json([
                'error' => 'Ocurrió un error: '.$e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request){
        // Log::error($request);
        try{
            //Crear cuenta de usuario
            switch($request['paciente'])
            {
                case 'Empleado':

                    $user = User::create([
                        'name' => $request['nombre'].' '.$request['paterno'].' '.$request['materno'],
                        'email' => $request['email'],
                        'password' => Hash::make(Str::random(8)),
                        'nickname' => $request['nickname']
                    ]);

                    $nomEmpleado = NomEmpleado::create([
                        'paterno' => $request['paterno'],
                        'materno' => $request['materno'],
                        'nombre' => $request['nombre'],
                        'RFC' => $request['RFC'],
                        'CURP' => $request['CURP'],
                        'IMSS' => $request['IMSS'],
                        'sexo' => $request['sexo'],
                        'fechaNacimiento' => $request['fechaNacimiento'],
                        'estadoCivil' => $request['estadoCivil'],
                        // 'telefono' => $request['prefijo'].$request['telefono'],
                        'telefono' => '23242',
                        'correo' => $request['email'],
                        // 'direccion_id',
                        // 'estatus',
                        // 'puesto_id',
                        // 'clinica',
                        'user_id' => $user->id
                    ]);

                    $pacientable_id = $nomEmpleado->id;
                    $pacientable_type = NomEmpleado::class;
                break;
                case 'Externo':
                    $externo = Externo::create([
                        'paterno' => $request['paterno'],
                        'materno' => $request['materno'],
                        'nombre' => $request['nombre'],
                        'sexo' => $request['sexo'],
                        'fechaNacimiento' => $request['fechaNacimiento'],
                        // 'telefono' => $request['prefijo'].$request['telefono'],
                        'telefono' => '13321',
                        'correo' => $request['email'],
                        //'user_id' => $user->id
                    ]);

                    $pacientable_id = $externo->id;
                    $pacientable_type = Externo::class;
                break;
                default:
                    //$user->delete();
                    return response()->json([
                        'error' => 'No se encontro el tipo de paciente'
                    ], 500);
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
                'imageable_id' => $pacientable_id,
                'imageable_type' => $pacientable_type
            ]);

            //Crear historial medico
            $historialMedico = HistorialMedico::create([
                'pacientable_id' => $pacientable_id,
                'pacientable_type' => $pacientable_type,
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
}