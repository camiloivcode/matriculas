<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Los documentos de identidad pueden superar el rango de INT (2.147.483.647).
     */
    public function up(): void
    {
        Schema::table('aprendizs', function (Blueprint $table) {
            $table->string('numero_documento', 20)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aprendizs', function (Blueprint $table) {
            $table->integer('numero_documento')->change();
        });
    }
};
