<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function guardar(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Debes iniciar sesión para valorar.');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'article_id' => 'required|exists:articles,id',
        ]);

        Rating::create([
            'rating' => $request->rating,
            'user_id' => Auth::id(),
            'article_id' => $request->article_id,
        ]);

        return redirect()->back()->with('success', 'Valoración guardada correctamente.');
    }
}

