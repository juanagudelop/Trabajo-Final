<?php

namespace App\Services;
use App\Models\Proveedor;

class ProveedorService{
    public function getProveedor(){
        $proveedor = Proveedor::all();
        return $proveedor;
    }
}