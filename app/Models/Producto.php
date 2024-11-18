<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    // Especificar la columna de la clave primaria
    protected $primaryKey = 'id_producto'; // Asegúrate de que se usa 'id_producto' como clave primaria

    // Campos que se pueden llenar de forma masiva
    protected $fillable = ['nombre', 'descripcion', 'precio', 'imagen_url', 'id_categoria', 'stock'];

    /**
     * Relación: Un producto pertenece a una categoría.
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    /**
     * Relación: Un producto puede estar en varios carritos (muchos a muchos).
     */
    public function carritos()
    {
        return $this->belongsToMany(Carrito::class, 'carrito_productos', 'id_producto', 'id_carrito')
                    ->withPivot('cantidad', 'precio_unitario')
                    ->withTimestamps();
    }
}
