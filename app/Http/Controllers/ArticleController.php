<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    // Mostrar todos los artículos
    public function index()
    {
        $articulos = Article::latest()->paginate(10);
        return view('articulos_index', compact('articulos'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('articulos_formulario');
    }

    // Guardar un nuevo artículo
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|max:2048'
        ]);

        $article = new Article();
        $article->title = $validated['title'];
        $article->body = $validated['body'];
        $article->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $article->image = $request->file('image')->store('articles', 'public');
        }

        $article->save();

        return redirect()->route('articulos_index')->with('success', 'Artículo creado correctamente.');
    }

    // Mostrar un artículo específico
    public function show($id)
{
    $articulo = Article::findOrFail($id);
    return view('articulo_detalle', compact('articulo'));
}

    // Eliminar un artículo
        // Eliminar un artículo
    public function destroy($id)
    {
        $articulo = Article::findOrFail($id);

        // Verificar si el usuario tiene permisos para eliminar
        if (Auth::id() !== $articulo->user_id) {
            return redirect()->route('articulos_index')->with('error', 'No puedes eliminar este artículo.');
        }

        $articulo->delete();

        return redirect()->route('articulos_index')->with('success', 'Artículo eliminado correctamente.');
    }
}
