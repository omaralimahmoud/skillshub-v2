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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('value')->nullable();
            // $table->string('email');
            // $table->string('phone',30);
            // $table->string('Facebook')->nullable();
            // $table->string('instagram')->nullable();
            // $table->string('x')->nullable();
            // $table->string('youtube')->nullable();
            // $table->string('linkedin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
