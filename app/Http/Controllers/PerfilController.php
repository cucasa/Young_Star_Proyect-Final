<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function mostrarPerfil()
    {
        return view('perfil', ['user' => Auth::user()]);
    }

    public function cerrarSesion(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    return redirect('/youngstar')->with('success', 'Sesión cerrada correctamente.');
}

}
