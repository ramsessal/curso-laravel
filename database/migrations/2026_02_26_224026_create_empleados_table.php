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
        Schema::create('empleados', function (Blueprint $table) {
    $table->id();                                  // ID automatico
    $table->string('nombre');                      // texto corto
    $table->string('puesto');                      // texto corto
    $table->string('departamento');                // texto corto
    $table->string('email')->nullable();           // nullable = opcional
    $table->string('telefono')->nullable();
    $table->string('estatus')->default('activo');  // valor por defecto
    $table->date('fecha_ingreso')->nullable(); 
    $table->text('notas')->nullable();     // solo fecha
    $table->timestamps();                          // created_at + updated_at
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
