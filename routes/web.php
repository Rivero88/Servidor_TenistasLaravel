<?php

use Illuminate\Support\Facades\Route;
use App\Models\Tenistas;
use App\Http\Controllers\TenistasController;

Route::get('/', function () {
    return view('welcome');
});

// Prueba parte 1 para ver los datos con dd
// Route::get('/tenistas', function(){
//     $tenistas = Tenistas::all();
//     dd($tenistas);
// });

// Prueba parte 1 para ver los datos con dump
Route::get('/tenistas', function(){
    $tenistas = Tenistas::take(5)->get();
    dump($tenistas);
});

// Prueba de la view index
// Route::get('/layout', function(){
//     return view('index');
// });

//Ruta para mostrar la lista de tenistas con la tabla paginada
Route::get('/indexTenistas', [TenistasController::class,"index"])->name(name:'components.index');
// Ruta para el boton crear nuevo tenista
Route::get('/indexTenistas/create', [TenistasController::class,"create"])->name(name:'components.create');
// Ruta para ver la directiva @csrf
Route::post('/indexTenistas', [TenistasController::class,"store"])->name(name:'components.store');

// Rutas para editar
Route::get('/indexTenistas/{tenista}/edit', [TenistasController::class,"edit"])->name(name:'components.edit');
Route::put('/indexTenistas/{tenista}', [TenistasController::class,"update"])->name(name:'components.update');