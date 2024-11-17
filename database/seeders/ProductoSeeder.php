<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        Producto::create([
            'nombre' => 'Producto Ejemplo',
            'descripcion' => 'Descripción del producto',
            'precio' => 99.99,
            'imagen_url' => 'https://via.placeholder.com/150',
            'stock' => 10,
            'id_categoria' => 1,
        ]);
    }
}
