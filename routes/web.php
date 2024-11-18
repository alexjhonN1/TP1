<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarritoController;

// Ruta principal
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas para el carrito
Route::middleware('auth')->group(function () {
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index'); // Vista del carrito
    Route::post('/carrito/{producto_id}/add', [CarritoController::class, 'add'])->name('carrito.add'); // Añadir al carrito
    Route::put('/carrito/{producto_id}/update', [CarritoController::class, 'update'])->name('carrito.update'); // Actualizar carrito
    Route::delete('/carrito/{producto_id}/remove', [CarritoController::class, 'remove'])->name('carrito.remove'); // Eliminar del carrito
});

// Ruta del dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rutas protegidas con autenticación
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Recursos protegidos
    Route::resource('categorias', CategoriaController::class);
    Route::resource('productos', ProductoController::class);
});

require __DIR__ . '/auth.php';
