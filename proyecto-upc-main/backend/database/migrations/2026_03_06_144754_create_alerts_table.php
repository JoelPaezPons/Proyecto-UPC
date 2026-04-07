<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('satellite_id')
                  ->constrained('satellites')
                  ->cascadeOnDelete();
            $table->string('message');
            $table->enum('severity', ['RED', 'YELLOW'])->default('RED');
            $table->timestamp('detected_at')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alerts');
    }
};