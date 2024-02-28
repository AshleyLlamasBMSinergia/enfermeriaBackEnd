<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Externo;
use App\Services\HeaderService;
use Illuminate\Http\Request;

class ExternoController extends Controller
{
    protected $headerProfesionalCedisService;

    public function __construct(HeaderService $headerService)
    {
        $this->headerProfesionalCedisService = $headerService->getProfesionalCedisFromHeader();
    }

    public function index(){
        $data = Externo::whereIn('cedi_id', $this->headerProfesionalCedisService->pluck('id'))->get();
        return response()->json($data, 200);
    }

    public function show($id){
        $data = Externo::find($id);
        return response()->json($data, 200);
    }
}
