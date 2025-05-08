<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Forum;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    public function mostrarHilos($forum_id)
    {
        $forum = Forum::with('threads')->findOrFail($forum_id);
        return view('hilos_ver', compact('forum'));
    }

    public function guardarHilo(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'body' => 'required|string|max:2000',
            'forum_id' => 'required|exists:forums,id',
        ]);

        Thread::create([
            'titulo' => $request->titulo,
            'body' => $request->body,
            'forum_id' => $request->forum_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Hilo creado correctamente.');
    }
}

