<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function guardarPost(Request $request)
    {
        $request->validate([
            'body' => 'required|string|max:2000',
            'thread_id' => 'required|exists:threads,id',
        ]);

        Post::create([
            'body' => $request->body,
            'thread_id' => $request->thread_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Post creado correctamente.');
    }

public function update(Request $request, Post $post)
    {
        // Verificamos que el usuario autenticado es el creador del post
        if (Auth::id() !== $post->user_id) {
            return redirect()->back()->with('error', 'No tienes permiso para editar este post.');
        }

        // Validar la entrada
        $request->validate([
            'body' => 'required|string'
        ]);

        // Actualizar el contenido del post y guardar
        $post->body = $request->body;
        $post->save();

        return redirect()->back()->with('success', 'Post actualizado correctamente.');
    }

public function destroy(Post $post)
    {
        // Verificar que el usuario autenticado es el creador del post
        if (Auth::id() !== $post->user_id) {
            return redirect()->back()->with('error', 'No tienes permiso para eliminar este post.');
        }

        $post->delete();

        return redirect()->back()->with('success', 'Post eliminado correctamente.');
    }


}



