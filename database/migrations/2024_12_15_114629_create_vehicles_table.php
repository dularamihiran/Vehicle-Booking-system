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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();  // Creates an auto-incrementing 'id' column
            $table->string('name');
            $table->string('type');  // Type of vehicle, e.g., 'car', 'truck', etc.
            $table->string('image');  // Path to the vehicle's image
            $table->integer('available_count');  // Number of available vehicles of this type
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
