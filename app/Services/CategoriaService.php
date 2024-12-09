<?php

namespace App\Services;
use App\Models\Categoria;

class CategoriaService {
    public function getCategoria() {
        $categorias = Categoria::all();
        return $categorias;
    }
}