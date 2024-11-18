<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Carrito;

class CarritoController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user(); // Obtiene el usuario autenticado

        // Busca el carrito del usuario autenticado
        $carrito = Carrito::where('id_usuario', $user->id)->first();

        // Si no existe un carrito, lo crea
        if (!$carrito) {
            $carrito = Carrito::create(['id_usuario' => $user->id]);
        }

        return view('carrito.index', ['productos' => $carrito->productos]);
    }

    public function add(Request $request, $id_producto)
    {
        $user = $request->user();  // Obtiene el usuario autenticado

        // Busca o crea el carrito para el usuario autenticado
        $carrito = Carrito::firstOrCreate(['id_usuario' => $user->id]);

        // Asegúrate de que el carrito tiene un id válido
        if (!$carrito->id) {
            return redirect()->route('home')->with('error', 'No se pudo encontrar o crear un carrito.');
        }

        $producto = Producto::findOrFail($id_producto); // Encuentra el producto por ID

        // Añadir el producto al carrito sin eliminar los demás productos
        $carrito->productos()->syncWithoutDetaching([
            $producto->id_producto => [
                'cantidad' => $request->input('cantidad', 1),
                'precio_unitario' => $producto->precio,
            ],
        ]);

        return redirect()->route('carrito.index')->with('success', 'Producto añadido al carrito');
    }

    public function update(Request $request, $id_producto)
    {
        $user = $request->user();  // Obtiene el usuario autenticado

        // Encuentra el carrito del usuario
        $carrito = Carrito::where('id_usuario', $user->id)->firstOrFail();

        // Actualiza la cantidad del producto en el carrito
        $carrito->productos()->updateExistingPivot($id_producto, [
            'cantidad' => $request->input('cantidad'),
        ]);

        return redirect()->route('carrito.index')->with('success', 'Cantidad actualizada');
    }

    public function remove(Request $request, $id_producto)
    {
        $user = $request->user();  // Obtiene el usuario autenticado

        // Encuentra el carrito del usuario
        $carrito = Carrito::where('id_usuario', $user->id)->firstOrFail();

        // Elimina el producto del carrito
        $carrito->productos()->detach($id_producto);

        return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito');
    }
}
