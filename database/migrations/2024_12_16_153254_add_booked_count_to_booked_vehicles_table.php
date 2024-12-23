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
        Schema::table('booked_vehicles', function (Blueprint $table) {
            $table->integer('booked_count')->default(1); // Defaults to 1 booked vehicle
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booked_vehicles', function (Blueprint $table) {
            $table->dropColumn('booked_count'); // Drops the booked_count column
        });
    }
};
