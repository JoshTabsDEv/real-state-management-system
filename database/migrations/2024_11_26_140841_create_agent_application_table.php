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
        Schema::create('agent_application', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to the users table
            $table->string('agency_name')->nullable(); // Name of the agency (if applicable)
            $table->string('license_number')->nullable(); // License number (if applicable)
            $table->text('experience')->nullable(); // Experience details or any additional information
            $table->boolean('is_approved')->default(false); // Approval status, default is false (not approved)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_application');
    }
};
