<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuíasyTutorialesController extends Controller
{
    public function index()
    {
        return view('tutoria');
    }
}
