<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CAN\EmpleadoController as CANEmpleadoController;
use App\Http\Controllers\enfermeria\AccidenteController;
use App\Http\Controllers\Enfermeria\AHeredofamiliarController;
use App\Http\Controllers\Enfermeria\APNPatologicoController;
use App\Http\Controllers\enfermeria\APPatologicoController;
use App\Http\Controllers\Enfermeria\ArchivoController;
use App\Http\Controllers\Enfermeria\CitaController;
use App\Http\Controllers\enfermeria\CalendarioController;
use App\Http\Controllers\enfermeria\CasoController;
use App\Http\Controllers\Enfermeria\CediController;
use App\Http\Controllers\Enfermeria\ConsultaController;
use App\Http\Controllers\enfermeria\DepartamentoController;
use App\Http\Controllers\enfermeria\DependienteController;
use App\Http\Controllers\enfermeria\DiagnosticoController;
use App\Http\Controllers\Enfermeria\EAntidopingController;
use App\Http\Controllers\Enfermeria\EEmbarazoController;
use App\Http\Controllers\Enfermeria\EFisicoController;
use App\Http\Controllers\enfermeria\EmpleadoController;
use App\Http\Controllers\Enfermeria\EmpresaController;
use App\Http\Controllers\Enfermeria\EnfermeriaController;
use App\Http\Controllers\Enfermeria\EstadisticaController;
use App\Http\Controllers\Enfermeria\EstadoController;
use App\Http\Controllers\Enfermeria\EVistaController;
use App\Http\Controllers\Enfermeria\ExamenController;
use App\Http\Controllers\enfermeria\ExternoController;
use App\Http\Controllers\Enfermeria\HistorialMedicoController;
use App\Http\Controllers\Enfermeria\HorarioController;
use App\Http\Controllers\Enfermeria\ImagenController;
use App\Http\Controllers\enfermeria\IncapacidadController;
use App\Http\Controllers\Enfermeria\InsumoController;
use App\Http\Controllers\enfermeria\InventarioController;
use App\Http\Controllers\Enfermeria\LoteController;
use App\Http\Controllers\enfermeria\MovimientoController;
use App\Http\Controllers\enfermeria\MovimientoTipoController;
use App\Http\Controllers\enfermeria\NomControlIncapacidadController;
use App\Http\Controllers\enfermeria\NomEstadoController;
use App\Http\Controllers\enfermeria\NomSecuelaController;
use App\Http\Controllers\enfermeria\NomTipoIncidenciaController;
use App\Http\Controllers\enfermeria\NomTipoPermisoController;
use App\Http\Controllers\enfermeria\NomTipoRiesgoController;
use App\Http\Controllers\Enfermeria\PendienteController;
use App\Http\Controllers\enfermeria\ProfesionalController;
use App\Http\Controllers\enfermeria\ReactivoController;
use App\Http\Controllers\enfermeria\RecetaController;
use App\Http\Controllers\Enfermeria\RequisicionController;
use App\Http\Controllers\enfermeria\ZonaAfectadaController;
use App\Http\Controllers\TemporalController;
use Illuminate\Support\Facades\Route;

// Route::middleware('profesional')->get('/ruta', 'Controlador@metodo');

Route::get('/salario-de-empleado/{id}', [EmpleadoController::class, 'getEmpleadoSalario']);

//CEDIS
Route::get('/cedis/profesional/{id}', [CediController::class, 'cedisPorProfesional']);
Route::get('/cedis/{cedi_id}/empleados/{numero}', [EmpleadoController::class, 'buscarEmpleado']);

//LOCALIDADES
Route::get('/estados', [EstadoController::class, 'index']);

//NO TOCAR - RUTAS TEMPORALES DE AYUDA
Route::get('/generar-usuarios', [TemporalController::class, 'generarUsuarios']);

Route::get('/traer-todos-los-empleados-de-rh', [EmpleadoController::class, 'traerTodosLosEmpleados']);
Route::get('/traer-todos-los-puestos-de-rh', [EmpleadoController::class, 'traerTodosLosPuestos']);

//ESTADISTICAS
Route::get('/estadisticas/historiales-medicos/pacientes-con-mas-consultas', [EstadisticaController::class, 'pacientesConMasConsultas']);

Route::get('/estadisticas/inventario/{inventario_id}/insumos-con-mas-desechos', [EstadisticaController::class, 'insumosConMasDesechos']);
Route::get('/estadisticas/inventario/{inventario_id}/insumos-con-mas-despachos-por-receta', [EstadisticaController::class, 'insumosConMasDespachosPorReceta']);

Route::get('/estadisticas/inventario/{inventario_id}/movimientos-del-insumo/{insumo_id}', [EstadisticaController::class, 'salidaDeMovimientosDelInsumo']);
Route::get('/tabla/inventario/{inventario_id}/gastos-del-insumo/{insumo_id}', [EstadisticaController::class, 'salidaDeMovimientosDelInsumoTabla']);


Route::post('/login', [AuthController::class, 'login'])->name('login');

//BUSCADORES
Route::get('/historiales-medicos/buscador', [HistorialMedicoController::class, 'buscador']);
Route::get('/insumos-medicos/buscador', [InsumoController::class, 'buscador']);
Route::get('/lotes/buscador', [LoteController::class, 'buscador']);
    
Route::middleware('auth:sanctum')->group(function () {

    //LOGOUNT
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //IMAGENES
    Route::get('/storage/private/{url}', [ImagenController::class, 'image']);

    //ENFERMERIA - INICIO
    Route::get('/inicio/citas-de-hoy/{id}', [EnfermeriaController::class, 'getCitasHoy']);

    Route::get('/citas/{id}', [CitaController::class, 'show']);

        //PENDIENTES
        Route::get('/pendientes', [PendienteController::class, 'index'])->can('pendientes.index');
        Route::put('/pendientes/update-estatus/{id}', [PendienteController::class, 'updateEstatus'])->can('pendientes.edit');
        Route::put('/pendientes/update-titulo/{id}', [PendienteController::class, 'updateTitulo'])->can('pendientes.edit');
        Route::post('/pendientes', [PendienteController::class, 'store'])->can('pendientes.create');
        Route::delete('/pendientes/{id}',[ PendienteController::class, 'destroy'])->can('pendientes.destroy');     

    //CALENDARIO - CITAS
    Route::get('/horarios/{profesional_id}/{fecha}/horas-disponibles', [HorarioController::class, 'horasDisponibles']);

    Route::get('/calendario', [CalendarioController::class, 'index'])->can('citas.index');
    Route::get('/calendario/profesional/{profesional_id}', [CalendarioController::class, 'citasPorProfesional']);
    Route::get('/citas/{id}', [CitaController::class, 'show']);
    Route::post('/citas', [CitaController::class, 'store']);
    Route::put('/citas/edit/{id}', [CitaController::class, 'update']);
    Route::delete('/citas/{id}',[ CitaController::class, 'destroy']);

    //HORARIOS
    Route::get('/horarios', [HorarioController::class, 'index']);
    Route::post('/horarios', [HorarioController::class, 'store']);
    Route::put('/horarios/edit/{id}', [HorarioController::class, 'update']);
    Route::delete('/horarios/{id}', [HorarioController::class, 'destroy']);

    //EMPRESAS
    Route::get('/empresas', [EmpresaController::class, 'index']);

    //CONSULTAS
    Route::get('/consultas', [ConsultaController::class, 'index'])->can('consultas.index');
    Route::get('/consultas/profesional/{profesional_id}', [ConsultaController::class, 'consultasPorProfesional']);
    Route::post('/consultas', [ConsultaController::class, 'store'])->can('consultas.create');
    Route::delete('/consultas/{id}',[ ConsultaController::class, 'destroy'])->can('consultas.destroy');
    Route::get('/consultas/{id}', [ConsultaController::class, 'show'])->can('consultas.show');


    //EMPLEADOS
    Route::get('/empleados', [EmpleadoController::class, 'index']);
    Route::get('/empleados/{id}', [EmpleadoController::class, 'show']);

    //ESTADISTICAS
    Route::get('/estadisticas', [EstadisticaController::class, 'index']);

    //EXTERNOS
    Route::get('/externos', [ExternoController::class, 'index']);
    Route::get('/externos/{id}', [ExternoController::class, 'show']);

    //HISTORIALES MEDICOS
    Route::get('/historiales-medicos', [HistorialMedicoController::class, 'index'])->can('historialesMedicos.index');
    Route::post('/historiales-medicos', [HistorialMedicoController::class, 'store'])->can('historialesMedicos.create');
    Route::put('/historiales-medicos/edit/{id}', [HistorialMedicoController::class, 'update'])->can('historialesMedicos.edit');
    Route::delete('/historiales-medicos/{id}', [HistorialMedicoController::class, 'destroy'])->can('historialesMedicos.destroy');
    Route::get('/historiales-medicos/{id}', [HistorialMedicoController::class, 'show'])->can('historialesMedicos.show');
    Route::get('/historiales-medicos/empleado/{id}', [HistorialMedicoController::class, 'historialMedicoEmpleado']);
    Route::get('/historiales-medicos/externo/{id}', [HistorialMedicoController::class, 'historialMedicoExterno']);
    Route::get('/historiales-medicos/dependiente/{id}', [HistorialMedicoController::class, 'historialMedicoDependiente']);
    
    //DEPENDIENTE
    Route::post('/dependientes', [DependienteController::class, 'store']);
    Route::put('/dependientes/edit/{id}', [DependienteController::class, 'update']);
    Route::get('/dependientes', [DependienteController::class, 'index']);
    Route::get('/dependientes/{empleado_id}', [DependienteController::class, 'dependientesDelEmpleado']);

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
    Route::get('/insumos/no-inventario/{id}', [InsumoController::class, 'insumosQueNoTieneInventario']);
    Route::post('/insumos-medicos', [InsumoController::class, 'store']);
    Route::get('/insumos-medicos/{id}', [InsumoController::class, 'show']);
    Route::delete('/insumos-medicos/{id}',[ InsumoController::class, 'destroy']);
    Route::get('/insumos-medicos', [InsumoController::class, 'index']);

    //REQUISICIONES
    Route::get('/requisiciones', [RequisicionController::class, 'index']);

    //LOTES
    // Route::get('/lotes', [LoteController::class, 'index']);
    Route::delete('/lotes/{id}',[ LoteController::class, 'destroy']);
    Route::post('/lotes', [LoteController::class, 'store']);
    Route::get('/lotes/{id}', [LoteController::class, 'show']);

    //MOVIMIENTOS
    Route::post('/movimientos', [MovimientoController::class, 'store']);
    Route::post('/movimientos/pdfs', [MovimientoController::class, 'pdfs']);

    //ARCHIVOS
    Route::get('/storage/private/archivo/{url}', [ArchivoController::class, 'archivo']);
    Route::post('/archivos', [ArchivoController::class, 'create']);

    //REACTIVOS
    Route::get('/reactivos', [ReactivoController::class, 'index']);

    //DIAGNOSTICOS
    Route::get('/diagnosticos', [DiagnosticoController::class, 'index']);

    //MOVIMIENTOS
    Route::get('/movimientos/inventarios/{inventario_id}', [MovimientoController::class, 'movimientosPorInventario']);
    Route::get('/movimientos/{id}', [MovimientoController::class, 'show']);
    
    //MOVIMEINTO TIPO
        Route::get('/tipos-de-movimientos', [MovimientoTipoController::class, 'mandarMovimientosParaLote']);

    //PROFESIONALES
    Route::get('/profesionales', [ProfesionalController::class, 'index']);

    //INVENTARIOS
    Route::get('/inventarios', [InventarioController::class, 'index'])->can('inventarios.index');
    Route::get('/inventarios/profesional/{id}', [InventarioController::class, 'inventariosDelProfesional'])->can('inventarios.index');
    Route::get('/inventarios/consulta/profesional/{id}', [InventarioController::class, 'inventariosDelProfesionalParaConsulta']); //TODO Obtener todos los inventarios con sus insumos y lotes que no esten caducos y que esten en existencia para la consulta
    Route::get('/inventarios/{id}', [InventarioController::class, 'show'])->can('inventarios.show');
    Route::post('/inventarios/add-insumos', [InventarioController::class, 'addInsumos'])->can('inventarios.create');
    Route::get('/inventarios/{inventario_id}/insumos/{insumo_id}', [InventarioController::class, 'insumoPorInventario'])->can('inventarios.show');
    Route::get('/inventarios/{inventario_id}/lotes/{lote_id}', [InventarioController::class, 'lotePorInventario'])->can('inventarios.show');

    //PDF HISTORIAL MEDICO
    Route::get('/historial-medico/pdf/{id}/{fecha}', [HistorialMedicoController::class, 'pdf']);

    //RECETAS
    Route::get('/recetas/{id}', [RecetaController::class, 'receta']);

    //INCAPACIDADES
    Route::get('/incapacidades', [IncapacidadController::class, 'index'])->can('incapacidades.index');
    Route::post('/incapacidades', [IncapacidadController::class, 'store'])->can('incapacidades.create');
    Route::put('/incapacidades/edit/{id}', [IncapacidadController::class, 'update']);
    Route::get('/incapacidades/{id}', [IncapacidadController::class, 'show'])->can('incapacidades.show');

    //CASOS
    Route::get('/casos', [CasoController::class, 'index']);
    Route::post('/casos', [CasoController::class, 'store']);
    Route::get('/casos/{id}', [CasoController::class, 'show']);
    Route::put('/casos/edit/{id}', [CasoController::class, 'edit']);
    Route::post('/casos/archivos', [ArchivoController::class, 'create']);
    

    //NOM CONTROL INCAPACIDAD
    Route::get('/control-incapacidades', [NomControlIncapacidadController::class, 'index'])->can('incapacidades.index');

    //NOM SECUELA
    Route::get('/secuelas', [NomSecuelaController::class, 'index']);

    //NOM TIPO PERMISO
    Route::get('/tipos-de-permisos', [NomTipoPermisoController::class, 'index']);

    //NOM TIPO RIESGO
    Route::get('/tipos-de-riesgos', [NomTipoRiesgoController::class, 'index']);

    //NOM TIPO PERMISO
    Route::get('/tipos-de-insidencias', [NomTipoIncidenciaController::class, 'index']);

    //NOM INCIDENCIAS
    Route::get('/incidencias/nomIncidencias/{empleado}/{fecha}', [IncapacidadController::class, 'nomIncidencias']);
    Route::post('/incidencias/importar/rh/incidencias/{id}', [IncapacidadController::class, 'importarRH']);

    //ZONAS AFECTADAS
    Route::get('/zonas-afectadas', [ZonaAfectadaController::class, 'index']);

    //DEPARTAMENTOS
    Route::get('/departamentos', [DepartamentoController::class, 'index']);
    
    //ACCIDENTES
    Route::post('/accidentes', [AccidenteController::class, 'store'])->can('incapacidades.create');
    Route::put('/accidentes/edit/{id}', [AccidenteController::class, 'update']);
    Route::delete('/accidentes/{id}',[ AccidenteController::class, 'destroy']);    

    //ESTADOS
    Route::get('/estados', [NomEstadoController::class, 'index']);

    //CAN
    Route::get('/can/empleados/{id}', [CANEmpleadoController::class, 'buscar']);

    //EXCEL
    // Route::get('/excel-assistances/{date}', [AssistanceController::class, 'excel'])->name('admin.assistances.export');
    Route::post('/citas/excel', [CitaController::class, 'excel']);
});