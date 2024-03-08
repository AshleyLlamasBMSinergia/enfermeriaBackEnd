<?php

// app/Services/HeaderService.php

namespace App\Services;

use App\Models\Profesional;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DataBaseService
{
    public function conexionEmpresa($empresa_id){
        switch($empresa_id){
            case 1: //CAN
                $BDRecursosHumanos = DB::connection('RecursosHumanosCAN');
            break;
            case 2: //CVN
                
            break;
            case 5: //ENV
                 
            break;
            case 11: //FCO
                $BDRecursosHumanos = DB::connection('RecursosHumanosFCO');
            break;
            case 12: //SBM
                $BDRecursosHumanos = DB::connection('RecursosHumanosSBM');
            break;
            default:
            return response()->json([
                'error' => 'Empresa del empleado no encontado :('
            ], 404);
        }

        if(!$BDRecursosHumanos){
            Log::error('No se encontro conexión con la base de datos de RH');
            return response()->json([
                'error' => 'No se encontro conexión con la base de datos de RH'
            ], 404);
        }

        return $BDRecursosHumanos;
    }
}
