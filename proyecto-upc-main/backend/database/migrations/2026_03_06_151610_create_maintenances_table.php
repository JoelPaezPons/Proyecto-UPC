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
        Schema::create('maintenances', function (Blueprint $table) {
    $table->id();
    $table->foreignId('satellite_id')
          ->constrained('satellites')
          ->cascadeOnDelete();
    $table->string('reason');
    $table->enum('status', ['Pendiente', 'En curso', 'Completado'])->default('Pendiente');
    $table->timestamp('scheduled_at');
    $table->timestamp('completed_at')->nullable();
    $table->text('notes')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
