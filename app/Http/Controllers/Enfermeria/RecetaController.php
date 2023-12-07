<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RecetaController extends Controller
{
    public function receta($id){
        $consulta = Consulta::find($id);

        switch($consulta->profesional->receta){
            default:
                $pdf = PDF::loadView('pdfs.recetas.generica', [
                    'consulta' => $consulta]);
                return $pdf->setPaper('a4', 'landscape')->stream('receta.pdf');
        }
    }  
}
