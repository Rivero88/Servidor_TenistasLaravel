<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenistas;
use App\Http\Requests\TenistasRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class TenistasController extends Controller
{
    // funcion para mostrar el listado de tenistas
    public function index()
    {
        $tenistas=Tenistas::oldest(column: 'id')->paginate(perPage:8);
        return view('components.index_Tenistas', ['tenistas'=>$tenistas]);
    }

    // funcion para crear tenistas
    public function create()
    {
        return view('components.Tenistas.create_Tenistas', [
            'tenista' => new Tenistas(),
            'method'=>'POST',
            'actionUrl'=> route('components.store_Tenistas'),
            'submitButtonText' => 'Crear'
        ]);
    }

    //funcion store para guardar tenistas nuevos
    public function store(TenistasRequest $request): RedirectResponse
    {
        // dd($request->validated());
        // dd($request->all());
        Tenistas::create($request->validated());
        return redirect(route('components.index_Tenistas'));
    }

     // public function edit(Tenistas $tenista): View
    // {
    //     dd($tenista); // Muestra el contenido del modelo
    // }
    
    // funcion para editar tenistas
    public function edit(Tenistas $tenista): View
    {
        // Para ver el log de la edición. Cuando se le da al botón editar se crear un log en storage/logs/laravel.log
        // Log::info('Editando tenista', ['tenista' => $tenista]);
        return view('components.Tenistas.edit_Tenistas', [
            'tenista' => $tenista,
            'method'=>'PUT',
            'actionUrl'=> route('components.update_Tenistas', $tenista),
            'submitButtonText' => 'Actualizar tenista'
        ]);
    }

     // funcion para actualizar tenistas
     public function update(TenistasRequest $request, Tenistas $tenista): RedirectResponse
     {
         $tenista->update($request->validated());
         return redirect()->route('components.index_Tenistas');
     }

     // funcion para eliminar tenistas
     public function destroy(Tenistas $tenista): RedirectResponse
     {
         $tenista->delete();
         return redirect()->route('components.index_Tenistas');
     }

     // funcion para mostrat los titulos de un tenista
     public function titulosTenista($tenista_id)
    {
        // Obtener el tenista por ID
        $tenista = Tenistas::findOrFail($tenista_id);

        // Obtener solo los títulos del tenista
        $titulos = $tenista->titulos()->get();

        return view('components.Tenistas.index_Tenistas-Titulos', compact('tenista', 'titulos'));
    }


}
