<?php

use Illuminate\Support\Facades\Route;
use App\Models\Tenistas;
use App\Models\Torneos;
use App\Models\Superficies;
use App\Http\Controllers\TenistasController;
use App\Http\Controllers\TorneosController;
use App\Http\Controllers\SuperficiesController;
use App\Http\Controllers\TitulosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
})->name('index');

// Prueba parte 1 para ver los datos con dd
// Route::get('/tenistas', function(){
//     $tenistas = Tenistas::all();
//     dd($tenistas);
// });

// Prueba parte 1 para ver los datos con dump
// Route::get('/tenistas', function(){
//     $tenistas = Tenistas::take(5)->get();
//     dump($tenistas);
// });

// Prueba de la view index
// Route::get('/layout', function(){
//     return view('index');
// });

// Rutas para el controlador TenistasController
// Ruta para mostrar la lista de tenistas
Route::get('/indexTenistas', [TenistasController::class,"index"])->name(name:'components.index_Tenistas');
// Ruta para mostrar la lista de titulos de un tenistas
Route::get('/indexTenistasTitulos{tenista_id}/titulos', [TenistasController::class,"titulosTenista"])->name(name:'components.Tenistas.index_Tenistas-Titulos');
// Rutas para el boton crear nuevo tenista y guardar en la base de datos
Route::get('/indexTenistas/create', [TenistasController::class,"create"])->name(name:'components.Tenistas.create_Tenistas');
Route::post('/indexTenistas', [TenistasController::class,"store"])->name(name:'components.store_Tenistas');
// Rutas para editar y actualizar en la base de datos
Route::get('/indexTenistas/{tenista}/edit', [TenistasController::class,"edit"])->name(name:'components.Tenistas.edit_Tenistas');
Route::put('/indexTenistas/{tenista}', [TenistasController::class,"update"])->name(name:'components.update_Tenistas');
//Ruta para eliminar
Route::delete('/indexTenistas/{tenista}', [TenistasController::class,"destroy"])->name(name:'components.Tenistas.destroy_Tenistas');

// Rutas para el controlador TorneosController
//Ruta para mostrar la lista de torneos
Route::get('/indexTorneos', [TorneosController::class,"index"])->name(name:'components.index_Torneos');
// Ruta para el boton crear nuevo torneo y guardar en la base de datos
Route::get('/indexTorneos/create', [TorneosController::class,"create"])->name(name:'components.Torneos.create_Torneos');
Route::post('/indexTorneos', [TorneosController::class,"store"])->name(name:'components.store_Torneos');
// Rutas para editar y actualizar en la base de datos
Route::get('/indexTorneos/{torneo}/edit', [TorneosController::class,"edit"])->name(name:'components.Torneos.edit_Torneos');
Route::put('/indexTorneos/{torneo}', [TorneosController::class,"update"])->name(name:'components.update_Torneos');
//Ruta para eliminar
Route::delete('/indexTorneos/{torneo}', [TorneosController::class,"destroy"])->name(name:'components.Torneos.destroy_Torneos');

// Rutas para el controlador SuperficiesController
//Ruta para mostrar la lista de superficies
Route::get('/indexSuperficies', [SuperficiesController::class,"index"])->name(name:'components.index_Superficies');
// Ruta para el boton crear nueva superficie y guardar en la base de datos
Route::get('/indexSuperficies/create', [SuperficiesController::class,"create"])->name(name:'components.Superficies.create_Superficies');
Route::post('/indexSuperficies', [SuperficiesController::class,"store"])->name(name:'components.store_Superficies');
//Ruta para eliminar
Route::delete('/indexSuperficies/{superficie}', [SuperficiesController::class,"destroy"])->name(name:'components.Superficies.destroy_Superficies');

// Rutas para el controlador TitulosController
//Ruta para mostrar la lista de titulos
Route::get('/indexTitulos', [TitulosController::class,"index"])->name(name:'components.index_Titulos');
// Ruta para el boton crear nuevo titulo y guardar en la base de datos
Route::get('/indexTitulos/create', [TitulosController ::class,"create"])->name(name:'components.Titulos.create_Titulos');
Route::post('/indexTitulos', [TitulosController::class,"store"])->name(name:'components.store_Titulos');
// Rutas para editar y actualizar en la base de datos
Route::get('/indexTitulos/{titulo}/edit', [TitulosController::class,"edit"])->name(name:'components.Titulos.edit_Titulos');
Route::put('/indexTitulos/{titulo}', [TitulosController::class,"update"])->name(name:'components.update_Titulos');
//Ruta para eliminar
Route::delete('/indexTitulos/{titulo}', [TitulosController::class,"destroy"])->name(name:'components.Titulos.destroy_Titulos');
