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
        Schema::create('exam_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->constrained()->restrictOnDelete();
            $table->foreignId('user_id')->constrained()->restrictOnDelete();
            $table->float('score', 5, 2)->nullable();
            $table->smallInteger('time_minutes')->nullable();
            $table->enum('status', ['opened', 'closed'])->default('closed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_user');
    }
};
