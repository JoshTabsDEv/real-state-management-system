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
        Schema::create('appointment_notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('appointment_id');
            $table->text('note');
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appoitment_notes');
    }
};
