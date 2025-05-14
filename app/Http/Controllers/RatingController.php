<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    // Guardar una nueva valoración
    public function store(Request $request)
    {
        $validated = $request->validate([
            'rateable_id' => 'required|integer',
            'rateable_type' => 'required|string|in:App\\Models\\Article,App\\Models\\Forum,App\\Models\\Thread,App\\Models\\Post',
            'rating' => 'required|integer|min:1|max:5'
        ]);

        // Verificar si el usuario ya valoró este contenido
        $exists = Rating::where([
            ['user_id', Auth::id()],
            ['rateable_id', $validated['rateable_id']],
            ['rateable_type', $validated['rateable_type']]
        ])->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Ya has valorado este contenido.');
        }

        // Guardar la valoración
        Rating::create([
            'user_id' => Auth::id(),
            'rateable_id' => $validated['rateable_id'],
            'rateable_type' => $validated['rateable_type'],
            'rating' => $validated['rating']
        ]);

        return redirect()->back()->with('success', 'Valoración guardada correctamente.');
    }
}
