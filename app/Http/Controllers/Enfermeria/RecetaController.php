<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class RecetaController extends Controller
{
    public function receta($id){
        try{
            $consulta = Consulta::find($id);

            switch($consulta->profesional->receta){
                default:
                    $pdf = Pdf::loadView('pdfs.recetas.generica', [
                        'consulta' => $consulta]);
                    return $pdf->setPaper('a4', 'landscape')->stream('receta.pdf');
            }
        }catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'error' => 'Ocurrió un error: '.$e->getMessage()
            ], 500);
        }
    }  
}
