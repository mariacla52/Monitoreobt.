<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Se creó una migración para modificar la tabla users, agregando los campos celular y tipo_usuario, 
     * necesarios para el sistema de monitoreo.
     * Con el método up añadimos nuevas columnas
     */ 
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
              $table->string('celular')->nullable();
              $table->string('tipo_usuario')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     * Con el método down podemos revertir los cambios eliminando los campos que agreamos.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn(['celular', 'tipo_usuario']);
        });
    }
};
