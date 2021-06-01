<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $primaryKey = "id_producto";

    protected $fillable = [
        'nombre',
        'precio',
        'stock',
    ];

    public function factura()
    {
        return $this->belongsTo(Factura::class);
    }

}
