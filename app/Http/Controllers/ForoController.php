<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ForoController extends Controller
{



    public function mostrarFormulario()
    {
        $categories = Category::all(); // Obtener todas las categorías
        return view('foros', compact('categories')); // Pasar categorías a la vista
    }




    public function guardarForo(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'category_id' => 'required|exists:categories,id',
        ]);

        Forum::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('foroC')->with('success', 'Foro guardado en Foros correctamente.');
    }





    public function verForos()
    {
        $foros = Forum::with('category')->orderBy('created_at', 'desc')->get(); // Obtener los foros creados
        return view('foros_ver', compact('foros')); // Pasar los foros a la vista
    }



public function destroy($id)
{
    $forum = Forum::findOrFail($id);

    if (Auth::id() !== $forum->user_id) {
        return redirect()->back()->with('error', 'No puedes eliminar este foro.');
    }

    $forum->delete();
    return redirect()->route('foros_index')->with('success', 'Foro eliminado correctamente.');
}







}
