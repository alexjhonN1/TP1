<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $fillable = ['id_usuario'];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'carrito_productos', 'id_carrito', 'id_producto')
                    ->withPivot('cantidad', 'precio_unitario')
                    ->withTimestamps();
    }
}
