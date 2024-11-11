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
        //Schema::table para actualizar la tabla
        //php artisan migrate:fresh para migrar todas las migraciones
        Schema::create('gymowner', function (Blueprint $table) {
            $table->id();
            $table->string('client_name',100);
            $table->string('client_lastname',150);
            $table->string('gym_name',100);
            $table->char('client_id', 6)->unique();
            $table->string('email',50)->unique();
            $table->string('password',150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gymowner');
    }
};
