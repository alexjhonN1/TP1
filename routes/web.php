<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\AuthenticatedSessionController;

// Ruta principal
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas para el carrito, protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index'); // Vista del carrito
    Route::post('/carrito/{producto_id}/add', [CarritoController::class, 'add'])->name('carrito.add'); // Añadir al carrito
    Route::put('/carrito/{producto_id}/update', [CarritoController::class, 'update'])->name('carrito.update'); // Actualizar carrito
    Route::delete('/carrito/{producto_id}/remove', [CarritoController::class, 'remove'])->name('carrito.remove'); // Eliminar del carrito

    // Ruta del dashboard, protegida por autenticación
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); // Vista principal del dashboard

    // Gestión de categorías
    Route::resource('categorias', CategoriaController::class);

    // Gestión de productos
    Route::resource('productos', ProductoController::class);
    
    // Ruta para crear un nuevo producto
    Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create'); // Formulario para agregar producto
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store'); // Almacenar producto
    
    // Perfil del usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Cerrar sesión
    // Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

require __DIR__ . '/auth.php';
