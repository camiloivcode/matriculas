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
        Schema::create('archivos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('documento_identidad');
            $table->string('diploma_acta_bachiller');
            $table->string('certificado_eps');
            $table->string('icfes')->nullable();
            $table->string('compromiso_aprendiz');
            $table->string('tratamientos_datos')->nullable();
            $table->string('documento_acudiente')->nullable();
            $table->integer('aprendiz_id')->unsigned();
            $table->foreign('aprendiz_id')->references('id')->on('aprendizs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivos');
    }
};
