<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Services\CategoriaService;
use App\Services\ProductoService;
use App\Services\ProveedorService;
use App\Models\Categoria;
use App\Models\Proveedor;

class ProductoController extends Controller
{
    public function index(Request $request, ProductoService $producto, CategoriaService $categoriaService, ProveedorService $proveedorService) {
        $productos = $producto->getProducto();
        $categorias = $categoriaService->getCategoria();
        $proveedores = $proveedorService->getProveedor();
        
        return view('home', compact('productos', 'categorias', 'proveedores'));
        
    }

    public function createProducto(Request $request) {
        $producto = $request->validate([
            "nombre" => "required|unique:productos|max:255",
            "precio" => "required|numeric",
            "stock" => "required|numeric",
            "fk_id_categoria" => "required|numeric",
            "fk_id_proveedor" => "required|numeric",
        ]);
        Producto::create($producto);
        return redirect()->route('home')->with('success', 'Producto agregado correctamente');
    }

    public function showProducto($id)
    {
    // Obtener el producto por su ID
    $producto = Producto::findOrFail($id);

    $categorias = Categoria::all();
    $proveedores = Proveedor::all();

    // Pasar los datos a la vista
    return view('mostrar_producto', compact('producto', 'categorias', 'proveedores'));
    }

    
    public function updateProducto(Request $request, $id_producto) {
        $validate = $request->validate([
            "nombre" => "required|unique:productos,nombre,{$id_producto},id_producto|max:255",
            "precio" => "required|numeric",
            "stock" => "required|numeric",
            "fk_id_categoria" => "required|numeric",
            "fk_id_proveedor" => "required|numeric",
        ]);
        Producto::where('id_producto', $id_producto)->update($validate);
        
        return redirect()->route('home')->with('success', 'Producto actualizado correctamente');
    }

    public function deleteProducto($id_producto) {
        Producto::destroy($id_producto);
        return redirect()->route('home')->with('success', 'Producto eliminado correctamente');
    }
    
}
