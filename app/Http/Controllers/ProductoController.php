<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Producto::query()->with('categoria');

    // Filtrar por nombre
    if ($request->filled('nombre')) {
        $query->where('nombre', 'like', '%' . $request->nombre . '%');
    }

    // Filtrar por categoría
    if ($request->filled('categoria')) {
        $query->where('id_categoria', $request->categoria);
    }

    // Filtrar por rango de precios
    if ($request->filled('precio_min')) {
        $query->where('precio', '>=', $request->precio_min);
    }
    if ($request->filled('precio_max')) {
        $query->where('precio', '<=', $request->precio_max);
    }

    $productos = $query->get();
    $categorias = Categoria::all();

    return view('productos.index', compact('productos', 'categorias'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
        {
            $categorias = Categoria::all(); // Cargar categorías para un dropdown
            return view('productos.create', compact('categorias'));
        }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'descripcion' => 'nullable|string',
                'precio' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'imagen_url' => 'nullable|url',
                'id_categoria' => 'nullable|exists:categorias,id_categoria',
            ]);

            Producto::create($request->all());
            return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
        }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
        {
            $producto = Producto::findOrFail($id);
            $categorias = Categoria::all();
            return view('productos.edit', compact('producto', 'categorias'));
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
        {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'descripcion' => 'nullable|string',
                'precio' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'imagen_url' => 'nullable|url',
                'id_categoria' => 'nullable|exists:categorias,id_categoria',
            ]);
        
            $producto = Producto::findOrFail($id);
            $producto->update($request->all());
            return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
        }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
        {
            $producto = Producto::findOrFail($id);
            $producto->delete();
            return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
        }


}
