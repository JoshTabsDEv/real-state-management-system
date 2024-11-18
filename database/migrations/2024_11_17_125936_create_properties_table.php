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
            $table->text('description');
            $table->enum('type', ['house','apartment','land','commercial']);
            $table->enum('status', ['available','sold','rented']);
            $table->integer('bedroom');
            $table->integer('bathrooms');
            $table->decimal('size');
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('agent_id');
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('agent_id')->references('id')->on('users')->onDelete('restrict');
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
