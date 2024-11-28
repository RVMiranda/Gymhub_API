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
        Schema::create('clase', function (Blueprint $table) {
            $table->id();
            $table->char('clave', 10)->unique();
            $table->string('nombre', 100);
            $table->string('descripcion', 255);
            $table->datetime('hora');
            $table->timestamps();
        });

        Schema::create('clases_con_clientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_entrenador_cliente');
            $table->unsignedBigInteger('id_clase');
            $table->timestamps();

            $table->foreign('id_entrenador_cliente')->references('id')->on('entrenador_cliente')->onDelete('cascade');
            $table->foreign('id_clase')->references('id')->on('clase')->onDelete('cascade');
        });

        Schema::create('clases_grupales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_entrenador');
            $table->unsignedBigInteger('id_clase');
            $table->string('dia', 10);
            $table->timestamps();

            $table->foreign('id_entrenador')->references('id')->on('entrenador')->onDelete('cascade');
            $table->foreign('id_clase')->references('id')->on('clase')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clase');
        Schema::dropIfExists('clases_con_clientes');
        Schema::dropIfExists('clases_grupales');
    }
};
