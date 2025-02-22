<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Torneos;
use App\Http\Requests\TorneosRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Superficies;
use Illuminate\View\View;

class TorneosController extends Controller
{
    // funcion para mostrar el listado de tenistas
    public function index()
    {
        $torneos=Torneos::oldest(column: 'id')->paginate(perPage:4);
        return view('components.index_Torneos', ['torneos'=>$torneos]);
    }

    // funcion para crear torneos
    public function create()
    {
        // Obtener todas las superficies desde la base de datos
        $superficies = Superficies::all();
        return view('components.Torneos.create_Torneos', [
            'torneo' => new Torneos(),
            'method'=>'POST',
            'actionUrl'=> route('components.store_Torneos'),
            'submitButtonText' => 'Crear',
            'superficies' => $superficies  // Pasamos las superficies a la vista
        ]);
    }

    // funcion store ko --> Torneos::create($request->validated()); crea el torneo pero no lo guarda en una variable.
    // Luego al intentar acceder a $torneo->superficie_id, $torneo es null.
    // public function store(TorneosRequest $request): RedirectResponse
    // {
    //     Torneos::create($request->validated());
    //     $torneo->superficie_id = $request->superficie_id;
    //     $torneo->save();
    //     return redirect(route('components.index_Torneos'));
    // }

    // funcion store ok --> El resultado de Torneos::create se guarda en  $torneo.
    // Se usa + ['superficie_id' => $request->superficie_id] para incluir superficie_id en la creación.
    public function store(TorneosRequest $request): RedirectResponse
    {
            // Crear el torneo con los datos validados, incluyendo superficie_id
            $torneo = Torneos::create($request->validated() + ['superficie_id' => $request->superficie_id]);
            return redirect(route('components.index_Torneos'));
    }

    // funcion para editar torneo
    public function edit(Torneos $torneo): View
    {
        // Obtener todas las superficies para mostrarlas en el formulario
        $superficies = Superficies::all();
        return view('components.Torneos.edit_Torneos', [
            'torneo' => $torneo,
            'superficies' => $superficies, // Pasar superficies a la vista
            'method'=>'PUT',
            'actionUrl'=> route('components.update_Torneos', $torneo),
            'submitButtonText' => 'Actualizar torneo'
        ]);
    }

     // funcion para actualizar torneo
    public function update(TorneosRequest $request, Torneos $torneo): RedirectResponse
    {
         $torneo->update($request->validated() + ['superficie_id' => $request->superficie_id]);
         return redirect()->route('components.index_Torneos');
    }

    // funcion para eliminar torneo
    public function destroy(Torneos $torneo): RedirectResponse
    {
        $torneo->delete();
        return redirect()->route('components.index_Torneos');
    }

    
}
