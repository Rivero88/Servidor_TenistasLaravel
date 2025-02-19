<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenistas;

class TenistasController extends Controller
{
    // funcion para mostrar el listado de tenistas
    public function index()
    {
        $tenistas=Tenistas::paginate(perPage:2);
        return view('components.index', ['tenistas'=>$tenistas]);
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
