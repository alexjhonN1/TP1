<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    // Permitir la asignación masiva para los campos 'nombre' y 'descripcion'
    protected $fillable = [
        'nombre',
        'descripcion', // Asegúrate de tener todos los campos que quieres que sean asignables
    ];

    /**
     * Relación: Una categoría puede tener muchos productos.
     */
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_categoria');
    }
}
