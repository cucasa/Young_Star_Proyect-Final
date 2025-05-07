<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Entrada extends Controller
{

    // Método para mostrar el formulario de registro
    // Este método se encarga de redirigir a la vista de registro
    // donde el usuario puede ingresar su información
    // y crear una cuenta en la aplicación
    public function create1()
    {
        return view('registro');
    }



    // Método para mostrar el formulario de inicio de sesión
    // Método para manejar el registro de usuarios
    // Este método se encarga de validar los datos del formulario
    // y crear un nuevo usuario en la base de datos
    public function create2()
    {
        return view('entrada');
    }



    // Método para mostrar el formulario de inicio de sesión
    // Método para manejar el registro de usuarios
    // Este método se encarga de validar los datos del formulario
    // y crear un nuevo usuario en la base de datos
    // Si el registro es exitoso, se redirige a la página de inicio
    // Si hay errores de validación, se redirige de nuevo al formulario de registro
    public function create()
    {
        return view('registro');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return to_route('entrada')->with('success', 'Usuario registrado exitosamente.');
    }




    // Método para manejar el inicio de sesión
    // Este método se encarga de autenticar al usuario
    // y redirigirlo a su perfil si las credenciales son correctas
    // Si las credenciales son incorrectas, se redirige de nuevo al formulario de inicio de sesión
    public function store2(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return to_route('perfil'); // Redirigir al perfil del usuario
        }

        return back()->withErrors(['email' => 'Las credenciales no son correctas.']);
    }


}
