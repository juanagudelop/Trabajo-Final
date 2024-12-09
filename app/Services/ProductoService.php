<?php

namespace App\Services;
use App\Models\Producto;

class ProductoService {
    public function getProducto() {
        // Cargar productos con sus relaciones de categoria y proveedor
        $productos = Producto::with(['categoria', 'proveedor'])->get();
        return $productos;
    }
}
