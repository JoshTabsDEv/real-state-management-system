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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('price');
            $table->text('description');
            $table->enum('type', ['house','apartment','land','commercial']);
            $table->enum('status', ['available','sold','rented']);
            $table->integer('bedroom');
            $table->integer('bathrooms');
            $table->string('street', 255); // Street address, required, max 255 characters
            $table->string('city', 255); // City, required, max 255 characters
            $table->string('state', 255)->nullable(); // State, nullable, max 255 characters
            $table->string('postal_code', 20)->nullable(); // Postal code, nullable, max 20 characters
            $table->string('country', 255); // Country, required, max 255 characters
            $table->decimal('size');
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('agent_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
