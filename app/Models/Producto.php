<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $primaryKey = 'id_producto';
    protected $keyType= 'int';
    
    protected $fillable = [
        'nombre',
        'precio',
        'stock',
        'fk_id_categoria',
        'fk_id_proveedor',
    ];

    // Relación con la tabla Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'fk_id_categoria');
    }

    // Relación con la tabla Proveedor
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'fk_id_proveedor');
    }
}