<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenistas;
use App\Http\Requests\TenistasRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TenistasController extends Controller
{
    // funcion para mostrar el listado de tenistas
    public function index()
    {
        $tenistas=Tenistas::latest(column: 'id')->paginate(perPage:4);
        return view('components.index', ['tenistas'=>$tenistas]);
    }

    //funcion store
    public function store(TenistasRequest $request): RedirectResponse
    {
        // dd($request->validated());
        // dd($request->all());
        Tenistas::create($request->validated());
        return redirect(route('components.index'));
    }

    // funcion para crear tenistas
    public function create()
    {
        return view('components.create', [
            'tenista' => new Tenistas(),
            'method'=>'POST',
            'actionUrl'=> route('components.store'),
            'submitButtonText' => 'Crear'
        ]);
    }

    // funcion para editar tenistas
    public function edit(Tenistas $tenista): View
    {
        return view('components.edit', [
            'tenista' => $tenista,
            'method'=>'PUT',
            'actionUrl'=> route('components.update', $tenista),
            'submitButtonText' => 'Actualizar tenista'
        ]);
    }

     // funcion para actualizar tenistas
     public function update(TenistasRequest $request, Tenistas $tenista): RedirectResponse
     {
         $tenista->update($request->validated());
         return redirect()->route('components.index');
     }

     // funcion para eliminar tenistas
     public function destroy(Tenistas $tenista): RedirectResponse
     {
         $tenista->delete();
         return redirect()->route('components.index');
     }

}
