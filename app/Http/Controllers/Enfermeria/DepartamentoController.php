<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use App\Services\HeaderService;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    protected $headerProfesionalCedisService;

    public function __construct(HeaderService $headerService)
    {
        $this->headerProfesionalCedisService = $headerService->getProfesionalCedisFromHeader();
    }

    public function index(){
        try{
            $profesionalCedis = $this->headerProfesionalCedisService;

            $data = Departamento::whereIn('cedi_id', $profesionalCedis->pluck('id'))->get();
            return response()->json($data, 200);
        }catch (\Exception $e){
            return response()->json([
                'error'=> $e->getMessage()
            ]);
        }
    }
}
