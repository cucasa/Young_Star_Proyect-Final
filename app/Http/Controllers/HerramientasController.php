<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HerramientasController extends Controller
{
    public function index()
    {
        // Aquí puedes preparar cualquier dato necesario y luego retornar la vista
        return view('heramienta');
    }
}
