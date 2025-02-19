<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenistas;
use App\Http\Requests\TenistasRequest;
use Illuminate\Http\RedirectResponse;

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
            'actionUrl'=> route('components.store'),
            'submitButtonText' => 'Crear'
        ]);
    }

}
