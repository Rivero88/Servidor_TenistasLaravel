<?php

namespace App\Http\Controllers;
use App\Models\Superficies;
use App\Http\Requests\SuperficiesRequest;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class SuperficiesController extends Controller
{
    // funcion para mostrar el listado de superficies
    public function index()
    {
        $superficies=Superficies::oldest(column: 'id')->paginate(perPage:4);
        return view('components.index_Superficies', ['superficies'=>$superficies]);
    }

    // funcion para crear superficie
    public function create()
    {
        return view('components.Superficies.create_Superficies', [
            'superficie' => new Superficies(),
            'method'=>'POST',
            'actionUrl'=> route('components.store_Superficies'),
            'submitButtonText' => 'Crear'
        ]);
    }

    //funcion store para guardar nueva superficie
    public function store(SuperficiesRequest $request): RedirectResponse
    {
        Superficies::create($request->validated());
        return redirect(route('components.index_Superficies'));
    }

    // funcion para eliminar superficies
    public function destroy(Superficies $superficie): RedirectResponse
    {
        $superficie->delete();
        return redirect()->route('components.index_Superficies');
    }
    
}
