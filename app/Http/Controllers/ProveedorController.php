<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    public function index(Request $request) {
        $proveedores = Proveedor::all();
        return view('proveedor', compact('proveedores'));
    }

    public function createProveedor(Request $request) {
        $validate = $request->validate([
            "nombre"=> "required|unique:proveedors|max:255",
            "direccion"=> "required",
            "telefono"=> "required|numeric|digits_between:1,15",
            "email"=> "required|email",
            "contacto"=> "required",
            "descripcion"=> "required",
        ]);
        Proveedor::create($validate);
        return redirect()->route('proveedor')->with('success', 'Proveedor agregado correctamente.');
    }

    public function showProveedor($id_proveedor) {
        $proveedor = Proveedor::find($id_proveedor);
        return view('mostrar_proveedor', compact('proveedor'));
    }

    public function updateProveedor(Request $request, $id_proveedor) {
        // Validación de los datos del formulario
        $validate = $request->validate([
            "nombre" => "required|unique:proveedors,nombre,{$id_proveedor},id_proveedor|max:255",
            "direccion" => "required",
            "telefono" => "required|numeric|digits_between:1,15",
            "email" => "required|email",
            "contacto" => "required",
            "descripcion" => "required",
        ]);
        
        // Actualizar los datos del proveedor directamente
        Proveedor::where('id_proveedor', $id_proveedor)->update($validate);
        
        // Redirigir con mensaje de éxito
        return redirect()->route('proveedor')->with('success', 'Proveedor modificado correctamente.');
    }
    

    public function deleteProveedor($id_proveedor) {
        $proveedor = Proveedor::find($id_proveedor);

    if ($proveedor) {
        $proveedor->delete();
        return redirect()->route('proveedor')->with('success', 'Proveedor eliminado correctamente.');
    }

    return redirect()->route('proveedor')->with('error', 'Proveedor no encontrado.');
    }
}
