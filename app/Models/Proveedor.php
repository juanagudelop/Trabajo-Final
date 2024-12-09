<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $primaryKey = 'id_proveedor';
    protected $fillable = ["id_proveedor", "nombre", "direccion", "telefono", "email", "contacto", "descripcion"];
}
