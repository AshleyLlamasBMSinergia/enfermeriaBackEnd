<?php

use App\Http\Controllers\Enfermeria\ConsultaController;
use App\Http\Controllers\Enfermeria\EnfermeriaController;
use App\Http\Controllers\Enfermeria\EstadisticaController;
use App\Http\Controllers\Enfermeria\HistorialMedicoController;
use App\Http\Controllers\Enfermeria\InsumoMedicoController;
use App\Http\Controllers\Enfermeria\RequisicionController;
use Illuminate\Support\Facades\Route;

Route::get('enfermeria', [EnfermeriaController::class, 'index']);


//CONSULTAS
Route::get('/consultas', [ConsultaController::class, 'index']);

//ESTADISTICAS
Route::get('/estadisticas', [EstadisticaController::class, 'index']);

//HISTORIALES MEDICOS
Route::get('/historiales-medicos', [HistorialMedicoController::class, 'index']);

//INSUMOS MEDICOS
Route::get('/insumos-medicos', [InsumoMedicoController::class, 'index']);

//REQUISICIONES
Route::get('/requisiciones', [RequisicionController::class, 'index']);
