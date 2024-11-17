<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class HomeController extends Controller
{
    public function index()
    {
        $productos = Producto::all(); // Recupera todos los productos
        return view('home', compact('productos')); // Envía la variable $productos a la vista
    }
}
