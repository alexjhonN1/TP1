<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');             // Nombre explícito del ID
            $table->string('nombre');              // Nombre del producto
            $table->text('descripcion')->nullable(); // Descripción opcional
            $table->decimal('precio', 10, 2);      // Precio con 2 decimales
            $table->integer('stock')->default(0);  // Stock por defecto 0
            $table->string('imagen_url')->nullable(); // URL de la imagen opcional
            $table->unsignedBigInteger('id_categoria')->nullable(); // Relación explícita con `categorias`
            $table->foreign('id_categoria')                         // Crear clave foránea manualmente
                  ->references('id_categoria')                      // Referencia explícita
                  ->on('categorias')
                  ->nullOnDelete()
                  ->cascadeOnUpdate();
            $table->timestamps();                 // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
