<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaterialEducativoController extends Controller
{
    public function index()
    {
        return view('materia');
    }
}
