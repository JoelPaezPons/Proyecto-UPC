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
    Schema::create('satellites', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('norad_id')->unique(); // ID único internacional
        $table->integer('altitude'); // en km
        $table->integer('velocity'); // en km/h
        $table->integer('battery')->default(100); // % de batería (0-100)
        $table->string('status')->default('Operativo'); // Operativo, Alerta, Destruido
        $table->string('mode')->default('Standby'); // Standby, Científico, Maniobra
        $table->integer('anomalies_count')->default(0); // Para la Tarea 4
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satellites');
    }
};
