<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RecetaController extends Controller
{
    // public function generica($id){
    //     $pdf = Pdf::loadView('pdfs.recetas.generica', ['consulta' => Consulta::find($id)]);
    //     return $pdf->setPaper('a4', 'landscape')->download('receta.pdf');
    // } 
    
    public function generica($id){
        $pdf = PDF::loadView('pdfs.recetas.generica', [
            'consulta' => Consulta::find($id)]);
        return $pdf->setPaper('a4', 'landscape')->stream('receta.pdf');
    }  
}
