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
Route::resource('ciudades', CiudadeController::class); // Ciudades Route
Route::get('/searchCiudad', [CiudadeController::class, 'search']); // Ciudades Searching Route

Route::get('/searchDatoUnico', [DatosUnicosPorSolicitudeController::class, 'search']); // datos unicos por solicitudes Searching Route

Route::resource('estados', EstadoController::class);

Route::resource('politicas',PoliticaController ::class);

// Departamentos
Route::resource('departamentos', DepartamentoController::class); // Departamentos Route
Route::get('/searchDepartamento', [DepartamentoController::class, 'search']); // Ciudades Searching Route

// Nodos
Route::resource('nodos', NodoController::class); // Nodos Route
Route::get('/searchNodo', [NodoController::class, 'search']); // Nodos Searching Route

// Roles
Route::resource('roles', RoleController::class); // Roles Route
Route::get('/searchRol', [RoleController::class, 'search']); // Roles Searching Route

// Estados de las solicitudes
Route::resource('estados-de-las-solictudes', EstadosDeLasSolictudeController::class); // Estados de las solicitudes
Route::get('/searchEstadoSolicitud', [EstadosDeLasSolictudeController::class, 'search']); // Estados de las solicitudes Searching Route

// Tipos de Datos
Route::resource('tipos-de-datos', TiposDeDatoController::class);

// Categorias de Eventos Especiales
Route::resource('categorias-eventos-especiales', CategoriasEventosEspecialeController::class); // Categorias de Eventos Especiales
Route::get('/searchCategoriaEvento', [CategoriasEventosEspecialeController::class, 'search']); // Categorias de Eventos Especiales Searching Route

// Tipos de Solicitudes
Route::resource('tipos-de-solicitudes', TiposDeSolicitudeController::class); // Tipos de Solicitudes
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

Route::resource('historial-de-modificaciones', HistorialDeModificacionesPorSolicitudeController::class);

Route::resource('servicios-por-tipos-de-solicitudes', ServiciosPorTiposDeSolicitudeController::class)->parameters([
    'servicios-por-tipos-de-solicitudes' => 'id']);

Route::post('/solicitude/process-selected-id', [SolicitudeController::class, 'processSelectedId'])->name('solicitude.processSelectedId');

// Users
Route::resource('users', UserController::class);
Route::get('/searchUser', [UserController::class, 'search']);