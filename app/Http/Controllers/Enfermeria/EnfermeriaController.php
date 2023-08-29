<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use Illuminate\Http\Request;

class EnfermeriaController extends Controller
{
    public function getCitasHoy(){
        return Cita::whereDay('fecha', now()->day)->count();
    }
}
