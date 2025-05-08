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

}



