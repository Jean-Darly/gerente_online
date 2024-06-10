<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EtiquetaController extends Controller
{
    public function index()
    {
        return view('etiqueta.index');
    }
}
