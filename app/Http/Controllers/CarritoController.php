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
        $user = $request->user();

        $carrito = Carrito::firstOrCreate(['id_usuario' => $user->id]);

        $producto = Producto::findOrFail($id_producto);

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
        $user = $request->user();

        $carrito = Carrito::where('id_usuario', $user->id)->firstOrFail();

        $carrito->productos()->updateExistingPivot($id_producto, [
            'cantidad' => $request->input('cantidad'),
        ]);

        return redirect()->route('carrito.index')->with('success', 'Cantidad actualizada');
    }

    public function remove(Request $request, $id_producto)
    {
        $user = $request->user();

        $carrito = Carrito::where('id_usuario', $user->id)->firstOrFail();

        $carrito->productos()->detach($id_producto);

        return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito');
    }
}
