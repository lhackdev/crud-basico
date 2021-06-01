<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $primaryKey = "id_cliente";

    protected $fillable = [
        'nombre',
        'apellido',
        'direccion',
        'fecha_nacimiento',
        'telefono',
        'email',
        'categoria',
    ];
}
