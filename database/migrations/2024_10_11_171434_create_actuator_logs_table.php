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
        Schema::create('actuator_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('actuator_id')->constrained()->onDelete('cascade');
            $table->enum('action', ['on', 'off']); // Status aksi yang dilakukan (on/off)
            $table->timestamp('action_time'); // Waktu ketika aksi dilakukan
            $table->text('description')->nullable(); // Deskripsi dari tindakan (misal: kenapa diaktifkan)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actuator_logs');
    }
};
