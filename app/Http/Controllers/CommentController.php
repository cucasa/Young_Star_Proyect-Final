<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function guardar(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Debes iniciar sesión para comentar.');
        }

        $request->validate([
            'comentario' => 'required|string|max:500',
            'article_id' => 'required|exists:articles,id',
        ]);

        Comment::create([
            'comentario' => $request->comentario,
            'user_id' => Auth::id(),
            'article_id' => $request->article_id,
        ]);

        return redirect()->back()->with('success', 'Comentario publicado correctamente.');
    }
}
