<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Body;
use App\Http\Controllers\Entrada;
use App\Http\Controllers\ForoController;
use App\Http\Controllers\PerfilController;
use Faker\ORM\Propel2\EntityPopulator;




// 📌 Página principal
Route::get('youngstar', [Body::class, 'create'])->name('home');



// 📌 Registro de usuario
Route::get('registro', [Entrada::class, 'create1'])->name('registro'); // Mostrar el formulario de registro
Route::post('register', [Entrada::class, 'store'])->name('register.store'); // Manejar el registro



// 📌 Inicio de sesión
Route::get('entrada', [Entrada::class, 'create2'])->name('entrada'); // Mostrar el formulario de login
Route::post('login', [Entrada::class, 'store2'])->name('login.store'); // Manejar el inicio de sesión




// 📌 Perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('perfil', [PerfilController::class, 'mostrarPerfil'])->name('perfil');
    Route::post('cerrar_sesion', [PerfilController::class, 'cerrarSesion'])->name('cerrar_sesion');
});





// 📌 Foros
Route::middleware('auth')->group(function () {
    Route::get('foroC', [ForoController::class, 'mostrarFormulario'])->name('foroC'); // Formulario de creación de foro
    Route::post('foro1', [ForoController::class, 'guardarForo'])->name('foro1'); // Guardar foro en la base de datos
});
    Route::get('foros_ver', [ForoController::class, 'verForos'])->name('foros_ver'); // Ver los foros creados



