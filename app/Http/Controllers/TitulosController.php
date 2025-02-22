<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Titulos;
use App\Models\Torneos;
use App\Models\Tenistas;

class TitulosController extends Controller
{
    // funcion para mostrar el listado de titulos
    public function index()
    {
        $titulos=Titulos::oldest(column: 'anno')->paginate(perPage:10);
        return view('components.index_Titulos', ['titulos'=>$titulos]);
    }
}
