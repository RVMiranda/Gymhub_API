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
        Schema::create('trabajador', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('apellido_p', 30);
            $table->string('apellido_m', 30);
            $table->char('ine', 13)->unique();
            $table->string('telefono', 15);
            $table->string('correo_e', 40);
            $table->char('matricula', 9)->unique();
            $table->boolean('activo');
            $table->date('fecha_contratacion');
            $table->timestamps();

        });

        Schema::create('tipo_acceso', function (Blueprint $table) {
            $table->id();
            $table->char('nivel_acceso', 1);
            $table->timestamps();
        });

        Schema::create('acceso_trabajador', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_trabajador');
            $table->unsignedBigInteger('id_tipo_acceso');
            $table->string('usuario', 50)->unique();
            $table->string('password', 250);
            $table->timestamps();

            $table->foreign('id_trabajador')->references('id')->on('trabajador')->onDelete('cascade');
            $table->foreign('id_tipo_acceso')->references('id')->on('tipo_acceso')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajador');
    }
};
