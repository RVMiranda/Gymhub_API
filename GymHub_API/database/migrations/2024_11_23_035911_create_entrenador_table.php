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
        Schema::create('entrenador', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_trabajador');
            $table->time('hora');
            $table->timestamps();

            $table->foreign('id_trabajador')->references('id')->on('trabajador')->onDelete('cascade');
        });

        Schema::create('entrenador_cliente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_entrenador');
            $table->unsignedBigInteger('id_cliente');
            $table->timestamps();

            $table->foreign('id_entrenador')->references('id')->on('entrenador')->onDelete('cascade');
            $table->foreign('id_cliente')->references('id')->on('cliente')->onDelete('cascade');
        });

        Schema::create('entrenador_agenda', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_entrenador_cliente');
            $table->datetime('fecha_hora');
            $table->boolean('estado');
            $table->timestamps();

            $table->foreign('id_entrenador_cliente')->references('id')->on('entrenador_cliente')->onDelete('cascade');
        });

        Schema::create('tipos_ejercicio', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('descripcion', 255);
            $table->timestamps();
        });

        Schema::create('entrenador_tipo_ejercicio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_entrenador');
            $table->unsignedBigInteger('id_tipo_ejercicio');
            $table->timestamps();

            $table->foreign('id_entrenador')->references('id')->on('entrenador')->onDelete('cascade');
            $table->foreign('id_tipo_ejercicio')->references('id')->on('tipos_ejercicio')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrenador_tipo_ejercicio');
        Schema::dropIfExists('tipos_ejercicio');
        Schema::dropIfExists('entrenador_agenda');
        Schema::dropIfExists('entrenador_cliente');
        Schema::dropIfExists('entrenador');
    }
};
