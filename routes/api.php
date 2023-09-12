<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Enfermeria\AHeredofamiliarController;
use App\Http\Controllers\Enfermeria\APNPatologicoController;
use App\Http\Controllers\enfermeria\APPatologicoController;
use App\Http\Controllers\Enfermeria\CitaController;
use App\Http\Controllers\enfermeria\CalendarioController;
use App\Http\Controllers\Enfermeria\ConsultaController;
use App\Http\Controllers\enfermeria\EmpleadoController;
use App\Http\Controllers\Enfermeria\EnfermeriaController;
use App\Http\Controllers\Enfermeria\EstadisticaController;
use App\Http\Controllers\enfermeria\ExternoController;
use App\Http\Controllers\Enfermeria\HistorialMedicoController;
use App\Http\Controllers\Enfermeria\ImagenController;
use App\Http\Controllers\Enfermeria\InsumoMedicoController;
use App\Http\Controllers\Enfermeria\PendienteController;
use App\Http\Controllers\Enfermeria\RequisicionController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/historiales-medicos', [HistorialMedicoController::class, 'store']);


Route::get('/historiales-medicos/buscador', [HistorialMedicoController::class, 'buscador']);

//IMAGENES
Route::get('/storage/private/{url}', [ImagenController::class, 'image']);

Route::middleware('auth:sanctum')->group(function () {

    //LOGOUNT
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //ENFERMERIA - INICIO
    Route::get('/inicio/citas-de-hoy', [EnfermeriaController::class, 'getCitasHoy']);

        //PENDIENTES
        Route::get('/pendientes', [PendienteController::class, 'index']);
        Route::put('/pendientes/update-estatus/{id}', [PendienteController::class, 'updateEstatus']);
        Route::put('/pendientes/update-titulo/{id}', [PendienteController::class, 'updateTitulo']);
        Route::post('/pendientes', [PendienteController::class, 'store']);
        Route::delete('/pendientes/{id}',[ PendienteController::class, 'destroy']);
        

    //CALENDARIO - CITAS
    Route::get('/calendario', [CalendarioController::class, 'index']);
    Route::post('/citas', [CitaController::class, 'store']);
    Route::put('/citas/edit/{id}', [CitaController::class, 'update']);
    Route::delete('/citas/{id}',[ CitaController::class, 'destroy']);
    Route::get('/citas/{id}', [CitaController::class, 'show']);

    //CONSULTAS
    Route::get('/consultas', [ConsultaController::class, 'index']);
    Route::post('/consultas', [ConsultaController::class, 'store']);
    Route::get('/consultas/{id}', [ConsultaController::class, 'show']);
    Route::delete('/consultas/{id}',[ ConsultaController::class, 'destroy']);

    //EMPLEADOS
    Route::get('/empleados', [EmpleadoController::class, 'index']);
    Route::get('/empleados/{id}', [EmpleadoController::class, 'show']);

    //ESTADISTICAS
    Route::get('/estadisticas', [EstadisticaController::class, 'index']);

    //EXTERNOS
    Route::get('/externos', [ExternoController::class, 'index']);
    Route::get('/externos/{id}', [ExternoController::class, 'show']);

    //HISTORIALES MEDICOS
    Route::get('/historiales-medicos', [HistorialMedicoController::class, 'index']);
    Route::get('/historiales-medicos/{id}', [HistorialMedicoController::class, 'show']);
 

    Route::post('/antecendentes-personales-patologicos', [APPatologicoController::class, 'store']);
    Route::put('/antecendentes-personales-patologicos/edit/{id}', [APPatologicoController::class, 'update']);

    Route::post('/antecendentes-personales-no-patologicos', [APNPatologicoController::class, 'store']);
    Route::put('/antecendentes-personales-no-patologicos/edit/{id}', [APNPatologicoController::class, 'update']);

    Route::post('/antecendentes-heredofamiliares', [AHeredofamiliarController::class, 'store']);
    Route::put('/antecendentes-heredofamiliares/edit/{id}', [AHeredofamiliarController::class, 'update']);

    //INSUMOS MEDICOS
    Route::get('/insumos-medicos', [InsumoMedicoController::class, 'index']);

    //REQUISICIONES
    Route::get('/requisiciones', [RequisicionController::class, 'index']);
});