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
        Schema::table('posts', function (Blueprint $table) 
        {
            if (!Schema::hasColumn('posts', 'categoria_id')) {
                $table->foreignId('categoria_id')->constrained('categorias');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            if (Schema::hasColumn('posts', 'categoria_id')) {
                $table->dropForeign(['categoria_id']);
                $table->dropColumn('categoria_id');
            }
        });
    }
};
