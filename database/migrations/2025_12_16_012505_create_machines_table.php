<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     /**
     * Run the migrations.
     * Crea la tabla machines para el monitoreo de máquinas dispensadoras
     */
    public function up(): void
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->integer('numero_maquina'); // Número identificador de la máquina, facilita a los usuarios saber cual maquina es
            $table->string('ubicacion'); // Ubicación de la máquina dispensadora
            $table->string('estado_stock'); // Estado del stock (normal, bajo, critico)
            $table->timestamps(); // Fechas de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     * Elimina la tabla machines si se quiere revertir la migración
     */
    public function down(): void
    {
        Schema::dropIfExists('machines');
    }
};
