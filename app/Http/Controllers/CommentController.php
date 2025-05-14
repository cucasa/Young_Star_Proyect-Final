<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Guardar un nuevo comentario
    public function store(Request $request)
    {
        $validated = $request->validate([
            'article_id' => 'required|integer|exists:articles,id',
            'comentario' => 'required|string|max:500'
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'article_id' => $validated['article_id'],
            'comentario' => $validated['comentario']
        ]);

        return redirect()->back()->with('success', 'Comentario publicado.');
    }

    // Eliminar un comentario
    public function destroy($id)
    {
        $comentario = Comment::findOrFail($id);

        // Verificar si el usuario tiene permisos para eliminar
        if (Auth::id() !== $comentario->user_id) {
            return redirect()->back()->with('error', 'No puedes eliminar este comentario.');
        }

        $comentario->delete();

        return redirect()->back()->with('success', 'Comentario eliminado correctamente.');
    }


    // Editar un comentario
    public function update(Request $request, $id)
    {
        $comentario = Comment::findOrFail($id);

        // Verificar si el usuario tiene permisos para editar
        if (Auth::id() !== $comentario->user_id) {
            return redirect()->back()->with('error', 'No puedes editar este comentario.');
        }

        $comentario->comentario = $request->input('comentario');
        $comentario->save();

        return redirect()->back()->with('success', 'Comentario actualizado correctamente.');
    }
}
