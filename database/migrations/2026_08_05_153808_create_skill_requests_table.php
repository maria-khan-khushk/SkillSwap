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
        Schema::create('skill_requests', function (Blueprint $table) {
            $table->id();

            // User who sends the request
            $table->foreignId('sender_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Owner of the skill
            $table->foreignId('receiver_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Requested skill
            $table->foreignId('skill_id')
                ->constrained()
                ->cascadeOnDelete();

            // Optional message
            $table->text('message')->nullable();

            // Request status
            $table->enum('status', [
                'pending',
                'accepted',
                'rejected'
            ])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skill_requests');
    }
};