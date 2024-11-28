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
        //
        Schema::create('pago', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente');
            $table->decimal('cantidad', 10, 2);
            $table->date('fecha_pago');
            $table->date('fecha_corte');
            $table->date('fecha_vencimiento');
            $table->boolean('adeudo');
            $table->timestamps();

            $table->foreign('id_cliente')->references('id')->on('cliente')->onDelete('cascade');
        });

        Schema::create('contrato', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->boolean('estado');
            $table->timestamps();

            $table->foreign('id_cliente')->references('id')->on('cliente')->onDelete('cascade');
        });

        
        Schema::create('registro_asistencia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente');
            $table->timestamp('fecha_entrada')->useCurrent();
            $table->timestamps();

            $table->foreign('id_cliente')->references('id')->on('cliente')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('pago');
        Schema::dropIfExists('contrato');
        Schema::dropIfExists('registro_asistencia');
    }
};
