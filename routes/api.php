<?php

use App\Http\Controllers\enfermeria\APPatologicoController;
use App\Http\Controllers\Enfermeria\CitaController;
use App\Http\Controllers\enfermeria\CalendarioController;
use App\Http\Controllers\Enfermeria\ConsultaController;
use App\Http\Controllers\enfermeria\EmpleadoController;
use App\Http\Controllers\Enfermeria\EnfermeriaController;
use App\Http\Controllers\Enfermeria\EstadisticaController;
use App\Http\Controllers\enfermeria\ExternoController;
use App\Http\Controllers\Enfermeria\HistorialMedicoController;
use App\Http\Controllers\Enfermeria\InsumoMedicoController;
use App\Http\Controllers\Enfermeria\RequisicionController;
use Illuminate\Support\Facades\Route;

//CALENDARIO
Route::get('/calendario', [CalendarioController::class, 'index']);
Route::post('/citas', [CitaController::class, 'store']);
Route::put('/citas/edit/{Cita}', [CitaController::class, 'update']);
Route::delete('/citas/{Cita}',[ CitaController::class, 'destroy']);

//CONSULTAS
Route::get('/consultas', [ConsultaController::class, 'index']);

//EMPLEADOS
Route::get('/empleados', [EmpleadoController::class, 'index']);

//ESTADISTICAS
Route::get('/estadisticas', [EstadisticaController::class, 'index']);

//EXTERNOS
Route::get('/externos', [ExternoController::class, 'index']);

//HISTORIALES MEDICOS
Route::get('/historiales-medicos', [HistorialMedicoController::class, 'index']);
Route::get('/historiales-medicos/{HistorialMedico}', [HistorialMedicoController::class, 'show']);

Route::post('/antecendentes-personales-patologicos', [APPatologicoController::class, 'store']);

//INSUMOS MEDICOS
Route::get('/insumos-medicos', [InsumoMedicoController::class, 'index']);

//REQUISICIONES
Route::get('/requisiciones', [RequisicionController::class, 'index']);
