<?php

use App\Http\Controllers\CategoriasEventosEspecialeController;
use App\Http\Controllers\CiudadeController;
use App\Http\Controllers\DatosUnicosPorSolicitudeController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\EstadosDeLasSolictudeController;
use App\Http\Controllers\EventosEspecialesPorCategoriaController;
use App\Http\Controllers\HistorialDeModificacionesPorSolicitudeController;
use App\Http\Controllers\NodoController;
use App\Http\Controllers\PersonalizacioneController;
use App\Http\Controllers\PoliticaController;
use App\Http\Controllers\ServiciosPorTiposDeSolicitudeController;
use App\Http\Controllers\SolicitudeController;
use App\Http\Controllers\TiposDeDatoController;
use App\Http\Controllers\TiposDeSolicitudeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\DatosUnicosPorSolicitude;
use App\Models\Solicitude;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login'); // Changing the default route to redirect to the login view instead of welcome
});

Auth::routes(); 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Ciudades
Route::resource('ciudades', CiudadeController::class)->middleware('permission:ciudades.index'); // Ciudades Route with permission
Route::get('/searchCiudad', [CiudadeController::class, 'search']); // Ciudades Searching Route

Route::get('/searchDatoUnico', [DatosUnicosPorSolicitudeController::class, 'search']); // datos unicos por solicitudes Searching Route

// Estados
Route::resource('estados', EstadoController::class)->middleware('permission:estados.index'); // Estados route with permission

// Politicas
Route::resource('politicas',PoliticaController ::class)->middleware('permission:politicas.index'); // Politicas Route with permission

// Departamentos
Route::resource('departamentos', DepartamentoController::class)->middleware('permission:departamentos.index'); // Departamentos Route with permission
Route::get('/searchDepartamento', [DepartamentoController::class, 'search']); // Departamento Searching Route

// Nodos
Route::resource('nodos', NodoController::class)->middleware('permission:nodos.index'); // Nodos Route with permission
Route::get('/searchNodo', [NodoController::class, 'search']); // Nodos Searching Route

// Roles
Route::resource('roles', RoleController::class)->middleware('permission:roles.index'); // Roles Route with permission
Route::get('/searchRol', [RoleController::class, 'search']); // Roles Searching Route

// Estados de las solicitudes
Route::get('/estados-de-las-solictudes/editar-orden', [EstadosDeLasSolictudeController::class, 'editarOrden'])->name('estados-de-las-solictudes.editar-orden'); // Route to go to the editar-orden view
Route::put('/estados-de-las-solictudes/actualizar-orden', [EstadosDeLasSolictudeController::class, 'actualizarOrden'])->name('estados-de-las-solictudes.actualizar-orden'); // Route for the method actualizar-orden to update the orden_mostrado
Route::resource('estados-de-las-solictudes', EstadosDeLasSolictudeController::class)->middleware('permission:estadosSolicitudes.index'); // Estados de las solicitudes Route with permission
Route::get('/searchEstadoSolicitud', [EstadosDeLasSolictudeController::class, 'search']); // Estados de las solicitudes Searching Route

// Tipos de Datos
Route::resource('tipos-de-datos', TiposDeDatoController::class)->middleware('permission:tiposDeDato.index'); // Tipos de Dato Route with permission

// Categorias de Eventos Especiales
Route::resource('categorias-eventos-especiales', CategoriasEventosEspecialeController::class)->middleware('permission:categoriasEventosEspeciales.index'); // Categorias de Eventos Especiales Route with permission
Route::get('/searchCategoriaEvento', [CategoriasEventosEspecialeController::class, 'search']); // Categorias de Eventos Especiales Searching Route

// Tipos de Solicitudes
Route::resource('tipos-de-solicitudes', TiposDeSolicitudeController::class)->middleware('permission:tiposSolicitudes.index'); // Tipos de Solicitudes Route with permission
Route::get('/searchTipoSolicitud', [TiposDeSolicitudeController::class, 'search']); // Tipos de Solicitudes Searching Route

//Estados
Route::get('/searchEstados', [EstadoController::class, 'search']); // Estados Searching Route

//Eventos especiales por categorias
Route::get('/searchEventosEspeciales', [EventosEspecialesPorCategoriaController::class, 'search']); // Eventos especiales por categorias Searching Route
Route::resource('eventos-especiales-por-categorias', EventosEspecialesPorCategoriaController::class);


//Personalizaciones
Route::get('/searchPersonalizaciones', [PersonalizacioneController::class, 'search']); // Tipos de Solicitudes Searching Route


//Politicas
Route::get('/searchPoliticas', [PoliticaController::class, 'search']); // politicas Searching Route

//Tipos de datos 
Route::get('/searchTiposDato', [TiposDeDatoController::class, 'search']); // politicas Searching Route



Route::resource('datos-unicos-por-solicitudes', DatosUnicosPorSolicitudeController::class);

Route::resource('personalizaciones', PersonalizacioneController::class);

Route::resource('solicitudes', SolicitudeController::class);
Route::get('/searchSolicitude', [SolicitudeController::class, 'search']); // solicitudes Searching Route

Route::resource('historial-de-modificaciones', HistorialDeModificacionesPorSolicitudeController::class);

// servicios-por-tipos-de-solicitudes
Route::resource('servicios-por-tipos-de-solicitudes', ServiciosPorTiposDeSolicitudeController::class)->parameters([
    'servicios-por-tipos-de-solicitudes' => 'id']);
// search
Route::get('/searchServiciosPorTiposDeSolicitude', [ServiciosPorTiposDeSolicitudeController::class, 'search']); // Nodos Searching Route

Route::post('/solicitude/process-selected-id', [SolicitudeController::class, 'processSelectedId'])->name('solicitude.processSelectedId');

// Users
Route::resource('users', UserController::class);
Route::get('/searchUser', [UserController::class, 'search']);

Route::post('/solicitudes/eventos', [SolicitudeController::class, 'eventos'])->name('solicitudes.eventos');

Route::post('/solicitudes/prueba', [SolicitudeController::class, 'prueba'])->name('solicitudes.prueba');

Route::get('solicitudes/duplicar/{id}', [SolicitudeController::class, 'duplicarFormulario'])->name('solicitudes.duplicarFormulario');

Route::put('solicitudes/solicitudes/{solicitude}/actualizar-estado', [SolicitudeController::class, 'Actualizar_estado'])->name('solicitudes.actualizar_estado');



Route::post('/solicitudes/asignar', [SolicitudeController::class, 'asignarSolicitud'])->name('solicitudes.asignar');



// Esta es la ruta que comunica la solicitud desde la vista index de solicitudes con el metodo en el controlador que lo que hace es retornar la totalidad
// de solicitudes e historial de solicitudes que se llevan en el momento
Route::get('/procesarValor', [SolicitudeController::class, 'procesarValor'])->name('solicitudes.procesarValor');







