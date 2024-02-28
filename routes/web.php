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
use App\Http\Controllers\SolicitudeController;
use App\Http\Controllers\TiposDeDatoController;
use App\Http\Controllers\TiposDeSolicitudeController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('ciudades', CiudadeController::class);
Route::resource('estados', EstadoController::class);
Route::resource('politicas',PoliticaController ::class);
Route::resource('departamentos', DepartamentoController::class);
Route::resource('nodos', NodoController::class);
Route::resource('estados-de-las-solictudes', EstadosDeLasSolictudeController::class);
Route::resource('tipos-de-datos', TiposDeDatoController::class);
Route::resource('categorias-eventos-especiales', CategoriasEventosEspecialeController::class);
Route::resource('tipos-de-solicitudes', TiposDeSolicitudeController::class);
Route::resource('eventos-especiales-por-categorias', EventosEspecialesPorCategoriaController::class);
Route::resource('datos-unicos-por-solicitudes', DatosUnicosPorSolicitudeController::class);
Route::resource('personalizaciones', PersonalizacioneController::class);
Route::resource('solicitudes', SolicitudeController::class);
Route::resource('historial-de-modificaciones-por-solicitudes', HistorialDeModificacionesPorSolicitudeController::class);
