<?php

namespace App\Exports;

use App\Models\Cita;
use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Citas implements FromView
{
    protected $profesional_id, $tipo, $fechaInicial, $fechaFinal;

    function __construct($profesional_id, $tipo, $fechaInicial, $fechaFinal) {
        $this->profesional_id = $profesional_id;
        $this->tipo = $tipo;
        $this->fechaInicial = $fechaInicial;
        $this->fechaFinal = $fechaFinal;
    }

    public function view(): View
    {
        return view('exports.citas', [
            'citas' => Cita::where('profesional_id', $this->profesional_id)->where('tipo', $this->tipo)
                        ->whereDate('fecha', '>=', $this->fechaInicial)
                        ->whereDate('fecha', '<=', $this->fechaFinal)
                        ->get()
        ]);
    }
}
