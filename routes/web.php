<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Body;
use App\Http\Controllers\Entrada;
use App\Http\Controllers\ForoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RatingController;
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
    Route::get('/perfil', [PerfilController::class, 'mostrarPerfil'])->name('perfil');
    Route::post('/cerrar_sesion', [PerfilController::class, 'cerrarSesion'])->name('cerrar_sesion');
    Route::patch('/perfil/actualizar-nombre', [PerfilController::class, 'actualizarNombre'])->name('perfil_actualizar_nombre');
    Route::patch('/perfil/actualizar-email', [PerfilController::class, 'actualizarEmail'])->name('perfil_actualizar_email');
    Route::patch('/perfil/actualizar-password', [PerfilController::class, 'actualizarPassword'])->name('perfil_actualizar_password');
    Route::put('/perfil/actualizar-completo', [PerfilController::class, 'actualizarCompleto'])->name('perfil_actualizar_completo');
    Route::delete('/perfil/eliminar', [PerfilController::class, 'eliminar'])->name('perfil_eliminar');
});



// 📌 Foros
Route::middleware('auth')->group(function () {
    Route::get('foroC', [ForoController::class, 'mostrarFormulario'])->name('foroC'); // Formulario de creación de foro
    Route::post('foro1', [ForoController::class, 'guardarForo'])->name('foro1'); // Guardar foro en la base de datos
});
    Route::get('foros_ver', [ForoController::class, 'verForos'])->name('foros_ver'); // Ver los foros creados



// 📌 Hilos
Route::get('foros/{forum_id}', [ThreadController::class, 'mostrarHilos'])->name('ver_hilos');
Route::post('hilos/crear', [ThreadController::class, 'guardarHilo'])->name('guardar_hilo');



// 📌 Post
Route::post('/posts/guardar', [PostController::class, 'guardarPost'])->name('guardar_post');



// 📌 Ruta para el formulario de creación de artículos
Route::get('/articulos/nuevo', [ArticleController::class, 'create'])->name('articulos_formulario');
Route::post('/articulos', [ArticleController::class, 'store'])->name('articulos_guardar');
Route::get('/articulo/{id}', [ArticleController::class, 'show'])->name('articulo_detalle');
Route::get('/articulos', [ArticleController::class, 'index'])->name('articulos_index');
Route::delete('/articulo/{id}', [ArticleController::class, 'destroy'])->name('articulos_eliminar');



// 📌 Rutas de Comentarios
Route::post('/comentarios', [CommentController::class, 'store'])->name('comentarios_guardar');
Route::delete('/comentario/{id}', [CommentController::class, 'destroy'])->name('comentarios_eliminar');
Route::put('/comentario/{id}', [CommentController::class, 'update'])->name('comentarios_editar');


// 📌 Rutas de Valoraciones
Route::post('/valoracion', [RatingController::class, 'store'])->name('valoraciones_guardar');
Route::put('/valoracion/{id}', [RatingController::class, 'update'])->name('valoraciones_editar');
