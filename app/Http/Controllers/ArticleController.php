<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function ver()
    {
        $articulos = Article::latest()->get();
        return view('articulos', compact('articulos'));
    }







    public function formulario()
{
    return view('crear_articulo'); // 📌 Aquí cargamos la vista del formulario
}










    public function detalle($id)
{
    $articulo = Article::findOrFail($id);
    return view('articulo_detalle', compact('articulo'));
}








    public function guardar(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('entrada')->with('error', 'Debes iniciar sesión para crear un artículo.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->hasFile('image') ? $request->file('image')->store('articulos', 'public') : null;

        Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $imagePath,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('articulos_ver')->with('success', 'Artículo creado correctamente.');
    }
}
