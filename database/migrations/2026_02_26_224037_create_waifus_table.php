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
        Schema::create('waifus', function (Blueprint $table) {
            $table->id();                                   // ID automatico
            $table->string('nombre');                       // texto corto
            $table->string('anime');                        // texto corto
            $table->string('habilidad');                    // texto corto
            $table->boolean('estatus')->default(true);      // valor por defecto
            $table->date('fecha_ingreso')->nullable();      // solo fecha
            $table->text('notas')->nullable();              // texto largo
            $table->timestamps();                           // created_at + updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waifus');
    }
};
