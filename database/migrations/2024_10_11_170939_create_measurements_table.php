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
        Schema::create('measurements', function (Blueprint $table) {
            $table->id();
            $table->string('measurementable_type'); // Polymorphic relation
            $table->unsignedBigInteger('measurementable_id');
            $table->float('value'); // Nilai pengukuran
            $table->string('unit'); // Satuan pengukuran (misal: cm, kg)
            $table->timestamp('measured_at')->nullable(); // Waktu pengukuran
            $table->timestamps();

            $table->index(['measurementable_type', 'measurementable_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('measurements');
    }
};
