<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RecetaController extends Controller
{
    public function receta($id){
        $consulta = Consulta::find($id);

        switch($consulta->profesional->receta){
            default:
                $pdf = Pdf::loadView('pdfs.recetas.generica', [
                    'consulta' => $consulta]);
                return $pdf->setPaper('a4', 'landscape')->stream('receta.pdf');
        }
    }  
}
