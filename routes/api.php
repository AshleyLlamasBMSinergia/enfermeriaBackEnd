<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Enfermeria\AHeredofamiliarController;
use App\Http\Controllers\Enfermeria\APNPatologicoController;
use App\Http\Controllers\enfermeria\APPatologicoController;
use App\Http\Controllers\Enfermeria\ArchivoController;
use App\Http\Controllers\Enfermeria\CitaController;
use App\Http\Controllers\enfermeria\CalendarioController;
use App\Http\Controllers\Enfermeria\ConsultaController;
use App\Http\Controllers\enfermeria\Dependiente;
use App\Http\Controllers\enfermeria\DependienteController;
use App\Http\Controllers\Enfermeria\EAntidopingController;
use App\Http\Controllers\Enfermeria\EEmbarazoController;
use App\Http\Controllers\Enfermeria\EFisicoController;
use App\Http\Controllers\enfermeria\EmpleadoController;
use App\Http\Controllers\Enfermeria\EnfermeriaController;
use App\Http\Controllers\Enfermeria\EstadisticaController;
use App\Http\Controllers\Enfermeria\EVistaController;
use App\Http\Controllers\Enfermeria\ExamenController;
use App\Http\Controllers\enfermeria\ExternoController;
use App\Http\Controllers\Enfermeria\HistorialMedicoController;
use App\Http\Controllers\Enfermeria\HorarioController;
use App\Http\Controllers\Enfermeria\ImagenController;
use App\Http\Controllers\Enfermeria\InsumoController;
use App\Http\Controllers\enfermeria\InventarioController;
use App\Http\Controllers\Enfermeria\LoteController;
use App\Http\Controllers\enfermeria\MovimientoController;
use App\Http\Controllers\Enfermeria\PendienteController;
use App\Http\Controllers\enfermeria\RecetaController;
use App\Http\Controllers\Enfermeria\RequisicionController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/historiales-medicos/buscador', [HistorialMedicoController::class, 'buscador']);
Route::get('/insumos-medicos/buscador', [InsumoController::class, 'buscador']);
Route::get('/lotes/buscador', [LoteController::class, 'buscador']);

Route::get('/insumos-medicos/{id}', [InsumoController::class, 'show']);
Route::get('/consultas/{id}', [ConsultaController::class, 'show']);
Route::get('/historiales-medicos/{id}', [HistorialMedicoController::class, 'show']);

//INVENTARIOS
Route::get('/inventarios', [InventarioController::class, 'index']);

Route::get('/storage/private/{url}', [ImagenController::class, 'image']);


    //RECETAS
    Route::get('/recetas/{id}', [RecetaController::class, 'generica']);

    Route::get('/inventarios/profesional/{id}', [InventarioController::class, 'inventariosDelProfesional']);
    Route::get('/inventarios/{id}', [InventarioController::class, 'show']);

    Route::get('/lotes/{id}', [LoteController::class, 'show']);
    
Route::middleware('auth:sanctum')->group(function () {

    //LOGOUNT
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //IMAGENES
    // Route::get('/storage/private/{url}', [ImagenController::class, 'image']);

    //ARCHIVOS
    Route::get('/storage/private/archivo/{url}', [ArchivoController::class, 'archivo']);

    //ARCHIVOS
    // Route::get('/storage/private/archivo/{url}', [ArchivoController::class, 'archivo']);

    //ENFERMERIA - INICIO
    Route::get('/inicio/citas-de-hoy', [EnfermeriaController::class, 'getCitasHoy']);

    Route::get('/citas/{id}', [CitaController::class, 'show']);

        //PENDIENTES
        Route::get('/pendientes', [PendienteController::class, 'index']);
        Route::put('/pendientes/update-estatus/{id}', [PendienteController::class, 'updateEstatus']);
        Route::put('/pendientes/update-titulo/{id}', [PendienteController::class, 'updateTitulo']);
        Route::post('/pendientes', [PendienteController::class, 'store']);
        Route::delete('/pendientes/{id}',[ PendienteController::class, 'destroy']);        

    //CALENDARIO - CITAS
    Route::get('/horarios/{profesional_id}/{fecha}/horas-disponibles', [HorarioController::class, 'horasDisponibles']);

    Route::get('/calendario', [CalendarioController::class, 'index']);
    Route::get('/citas/{id}', [CitaController::class, 'show']);
    Route::post('/citas', [CitaController::class, 'store']);
    Route::put('/citas/edit/{id}', [CitaController::class, 'update']);
    Route::delete('/citas/{id}',[ CitaController::class, 'destroy']);

    //CALENDARIO
    Route::get('/horarios', [HorarioController::class, 'index']);
    Route::post('/horarios', [HorarioController::class, 'store']);
    Route::put('/horarios/edit/{id}', [HorarioController::class, 'update']);
    Route::delete('/horarios/{id}', [HorarioController::class, 'destroy']);

    //CONSULTAS
    Route::get('/consultas', [ConsultaController::class, 'index']);
    Route::post('/consultas', [ConsultaController::class, 'store']);
    // Route::get('/consultas/{id}', [ConsultaController::class, 'show']);
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
    // Route::get('/historiales-medicos/{id}', [HistorialMedicoController::class, 'show']);
    Route::post('/historiales-medicos', [HistorialMedicoController::class, 'store']);
    Route::put('/historiales-medicos/edit/{id}', [HistorialMedicoController::class, 'update']);
    Route::delete('/historiales-medicos/{id}', [HistorialMedicoController::class, 'destroy']);
    
    //DEPENDIENTE
    Route::post('/dependientes', [DependienteController::class, 'store']);
    Route::put('/dependientes/edit/{id}', [DependienteController::class, 'update']);
    Route::get('/dependientes', [DependienteController::class, 'index']);

    Route::post('/antecendentes-personales-patologicos', [APPatologicoController::class, 'store']);
    Route::put('/antecendentes-personales-patologicos/edit/{id}', [APPatologicoController::class, 'update']);

    Route::post('/antecendentes-personales-no-patologicos', [APNPatologicoController::class, 'store']);
    Route::put('/antecendentes-personales-no-patologicos/edit/{id}', [APNPatologicoController::class, 'update']);

    Route::post('/antecendentes-heredofamiliares', [AHeredofamiliarController::class, 'store']);
    Route::put('/antecendentes-heredofamiliares/edit/{id}', [AHeredofamiliarController::class, 'update']);

    Route::post('/examenes-fisicos', [EFisicoController::class, 'store']);
    Route::delete('/examenes-fisicos/{id}',[ EFisicoController::class, 'destroy']);

    Route::post('/examen-antidoping', [EAntidopingController::class, 'store']);
    Route::delete('/examen-antidoping/{id}',[ EAntidopingController::class, 'destroy']);

    Route::post('/examen-embarazo', [EEmbarazoController::class, 'store']);
    Route::delete('/examen-embarazo/{id}',[ EEmbarazoController::class, 'destroy']);

    Route::post('/examen-vista', [EVistaController::class, 'store']);
    Route::delete('/examen-vista/{id}',[ EVistaController::class, 'destroy']);

    Route::post('/examen', [ExamenController::class, 'store']);
    Route::delete('/examen/{id}', [ExamenController::class, 'destroy']);

    //INSUMOS MEDICOS
    Route::get('/insumos-medicos', [InsumoController::class, 'index']);
    Route::post('/insumos-medicos', [InsumoController::class, 'store']);

    //REQUISICIONES
    Route::get('/requisiciones', [RequisicionController::class, 'index']);

    //INSUMOS
    Route::get('/insumos-medicos', [InsumoController::class, 'index']);
    
    Route::delete('/insumos-medicos/{id}',[ InsumoController::class, 'destroy']);

    // Route::get('/insumos-medicos/{id}', [InsumoController::class, 'show']);

    //LOTES
    // Route::get('/lotes', [LoteController::class, 'index']);
    Route::delete('/lotes/{id}',[ LoteController::class, 'destroy']);
    Route::post('/lotes', [LoteController::class, 'store']);

    //MOVIMIENTOS
    Route::post('/movimientos', [MovimientoController::class, 'store']);
});