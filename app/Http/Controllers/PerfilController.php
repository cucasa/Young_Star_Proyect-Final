<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    // ✅ Mostrar el perfil del usuario autenticado
    public function mostrarPerfil()
    {
        return view('perfil', ['user' => Auth::user()]);
    }

    // ✅ Cerrar sesión del usuario
    public function cerrarSesion(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/youngstar')->with('success', 'Sesión cerrada correctamente.');
    }



    // ✅ Eliminar la cuenta del usuario autenticado
public function eliminar()
{
    if (!Auth::check()) {
        return redirect('/')->with('error', 'Debes iniciar sesión.');
    }

    try {
        $usuario = User::where('id', Auth::id())->first();
        Auth::logout(); // ✅ Cierra la sesión antes de eliminar el usuario
        session()->flush(); // 🔥 Vacía la sesión para evitar que Laravel redirija al login

        if ($usuario) {
            $usuario->delete(); // ✅ Eliminación segura
        }

        return redirect('/youngstar')->with('success', 'Cuenta eliminada correctamente.'); // 🔄 Redirige al inicio
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error al eliminar la cuenta.');
    }
}





// ✅ Actualizar solo el nombre
public function actualizarNombre(Request $request)
{
    if (!Auth::check()) {
        return redirect('/')->with('error', 'Debes iniciar sesión.');
    }

    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    User::where('id', Auth::id())->update(['name' => $request->name]);

    return redirect()->back()->with('success', 'Nombre actualizado correctamente.');
}

// ✅ Actualizar solo el correo electrónico
public function actualizarEmail(Request $request)
{
    if (!Auth::check()) {
        return redirect('/')->with('error', 'Debes iniciar sesión.');
    }

    $request->validate([
        'email' => 'required|email|unique:users,email,' . Auth::id(),
    ]);

    User::where('id', Auth::id())->update(['email' => $request->email]);

    return redirect()->back()->with('success', 'Correo electrónico actualizado correctamente.');
}

// ✅ Actualizar solo la contraseña
public function actualizarPassword(Request $request)
{
    if (!Auth::check()) {
        return redirect('/')->with('error', 'Debes iniciar sesión.');
    }

    $request->validate([
        'password' => 'required|min:8',
    ]);

    User::where('id', Auth::id())->update(['password' => Hash::make($request->password)]);

    return redirect()->back()->with('success', 'Contraseña actualizada correctamente.');
}







public function actualizarCompleto(Request $request)
{
    if (!Auth::check()) {
        return redirect('/')->with('error', 'Debes iniciar sesión.');
    }

    $request->validate([
        'name' => 'required|string|max:255', // ✅ Cambiado de 'nombre' a 'name'
        'email' => 'required|email|unique:users,email,' . Auth::id(),
        'password' => 'required|min:8',
    ]);

    User::where('id', Auth::id())->update([
        'name' => $request->name, // ✅ Cambiado de 'nombre' a 'name'
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->back()->with('success', 'Perfil actualizado completamente.');
}





}
