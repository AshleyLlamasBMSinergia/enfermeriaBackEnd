<?php

// app/Services/HeaderService.php

namespace App\Services;

use App\Models\Profesional;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class HeaderService
{
    public function getUserFromHeader()
    {
        $header = apache_request_headers();
        $user = User::find($header['user_id']);

        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        return $user;
    }

    public function getProfesionalCedisFromHeader(){
        $header = apache_request_headers();
        $user = User::find($header['user_id']);

        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        switch($user->useable_type){
            case Profesional::class:
                 return $user->useable->cedis;
            default: return response()->json(['error' => 'Acceso denegado'], 403);
        }
    }
}
