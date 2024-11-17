<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Importa la clase DB

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('id_pago');
            $table->foreignId('id_pedido')->constrained('pedidos')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('metodo_pago', ['Tarjeta Crédito', 'Tarjeta Débito', 'PayPal']);
            $table->decimal('monto', 10, 2);
            $table->timestamp('fecha')->default(DB::raw('CURRENT_TIMESTAMP')); // Aquí se usa DB
            $table->enum('estado', ['pendiente', 'completado'])->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
