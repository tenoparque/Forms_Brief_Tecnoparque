<?php

use App\Http\Controllers\CiudadeController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\EstadosDeLasSolictudeController;
use App\Http\Controllers\NodoController;
use App\Http\Controllers\PoliticaController;
use App\Http\Controllers\TiposDeDatoController;
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
