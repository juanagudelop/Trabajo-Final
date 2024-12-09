<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index(Request $request) {
        $categorias = Categoria::all();
        return view("categoria", compact("categorias"));
    }

    public function createCategory(Request $request) {
        $validate = $request->validate([
            "nombre" => "required|unique:categorias|max:255",
            "descripcion"=> "required",
        ]);
        Categoria::create($validate);
        return redirect()->route('categoria')->with('success', 'Categoría creada correctamente.');
    }

    public function showCategory($id_categoria) {
        $categoria = Categoria::find($id_categoria);
        return view("mostrar_categoria", compact("categoria"));
    }
    public function setCategory(Request $request, $id_categoria) {
        $category = $request->validate([
            "nombre" => "required|unique:categorias,nombre,{$id_categoria},id_categoria|max:255",
            "descripcion" => "required",
        ]);
    
        Categoria::where('id_categoria', $id_categoria)->update($category);
    
        return redirect()->route('categoria')->with('success', 'Categoría modificada correctamente.');
    }
    
    public function deleteCategory($id_categoria) {
        $categoria = Categoria::find($id_categoria);

    if ($categoria) {
        // Eliminar la categoría
        $categoria->delete();
        return redirect()->route('categoria')->with('success', 'Categoría eliminada correctamente.');
    }

    return redirect()->route('categoria')->with('error', 'Categoría no encontrada.');
    }
}