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
        Schema::create('tipo_cliente', function (Blueprint $table) {
            $table->id();
            $table->string('tipo', 50);
            $table->decimal('costo', 10, 2);
            $table->timestamps();
        });

        Schema::create('cliente', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('apellido_p', 50);
            $table->string('apellido_m', 50);
            $table->char('ine', 13)->unique();
            $table->string('correo_e', 50)->unique();
            $table->string('telefono', 15);
            $table->char('matricula', 9)->unique();
            $table->unsignedBigInteger('id_tipo_cliente');
            $table->timestamps();

            $table->foreign('id_tipo_cliente')->references('id')->on('tipo_cliente')->onDelete('cascade');
        });

        Schema::create('cliente_trabajador', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_trabajador');
            $table->unsignedBigInteger('id_cliente');
            $table->timestamps();

            $table->foreign('id_trabajador')->references('id')->on('trabajador')->onDelete('cascade');
            $table->foreign('id_cliente')->references('id')->on('cliente')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_cliente');
        Schema::dropIfExists('cliente');
        Schema::dropIfExists('cliente_trabajador');
    }
};
