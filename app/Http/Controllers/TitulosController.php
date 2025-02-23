<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Titulos;
use App\Models\Torneos;
use App\Models\Tenistas;
use App\Http\Requests\TitulosRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class TitulosController extends Controller
{
    // funcion para mostrar el listado de titulos
    public function index()
    {
        $titulos=Titulos::latest(column: 'id')->paginate(perPage:10);
        return view('components.index_Titulos', ['titulos'=>$titulos]);
    }

    // funcion para crear titulos
    public function create()
    {
        // Obtener todos los torneos y tenistas desde la base de datos
        $torneos = Torneos::all();
        $tenistas = Tenistas::all();
        return view('components.Titulos.create_Titulos', [
            'titulo' => new Titulos(),
            'method'=>'POST',
            'actionUrl' => route('components.store_Titulos'),
            'submitButtonText' => 'Crear',
            'torneos' => $torneos,  // Pasamos los torneos a la vista
            'tenistas' => $tenistas,  // Pasamos los tenistas a la vista
        ]);
    }

    // funcion store para guardar el titulo en la bbdd
    public function store(TitulosRequest $request): RedirectResponse
    {
        // Crear el titulo con los datos validados, incluyendo torneo_id y tenista_id
        $titulo = Titulos::create($request->validated() + ['tenista_id' => $request->tenista_id] + ['torneo_id' => $request->torneo_id]);
        return redirect(route('components.index_Titulos'));
    }
    
    // funcion para editar titulo
    public function edit(Titulos $titulo): View
    {
        // Obtener todas los torneos y tenistas para mostrarlas en el formulario
        $torneos = Torneos::all();
        $tenistas = Tenistas::all();
        // Para ver el log de la edición. Cuando se le da al botón editar se crear un log en storage/logs/laravel.log
        Log::info('Editando titulo', ['titulo' => $titulo]);
        return view('components.Titulos.edit_Titulos', [
            'titulo' => $titulo,
            'torneos' => $torneos, // Pasar torneos a la vista
            'tenistas' => $tenistas, // Pasar tenistas a la vista
            'method'=>'PUT',
            'actionUrl'=> route('components.update_Titulos', $titulo),
            'submitButtonText' => 'Actualizar título'
        ]);
    }

     // funcion para actualizar titulo
    public function update(TitulosRequest $request, Titulos $titulo): RedirectResponse
    {
        $titulo->update($request->validated() + ['tenista_id' => $request->tenista_id] + ['torneo_id' => $request->torneo_id]);
        // Para ver el log de la actualización. Cuando se le da al botón editar se crear un log en storage/logs/laravel.log
        Log::info('Titulo actualizado', ['titulo' => $titulo]);
        return redirect()->route('components.index_Titulos');
    }

    // funcion para eliminar titulo
    public function destroy(Titulos $titulo): RedirectResponse
    {
        $titulo->delete();
        return redirect()->route('components.index_Titulos');
    }
}
