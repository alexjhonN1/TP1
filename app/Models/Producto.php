<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function productos()
        {
            return $this->hasMany(Producto::class, 'id_categoria');
        }

    public function carritos()
        {
            return $this->belongsToMany(Carrito::class, 'carrito_productos', 'id_producto', 'id_carrito')
                        ->withPivot('cantidad', 'precio_unitario')
                        ->withTimestamps();
        }


}
