<?php

namespace App\Http\Middleware;

use App\Models\Profesional;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckProfesional
{
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }

        if ($user->pacientable_type !== Profesional::class) {
            return response()->json(['error' => 'Acceso denegado'], 403);
        }

        return $next($request);
    }
}
