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
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();

            // User who saved the spot
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            // Spot saved in wishlist
            $table->foreignId('spot_id')
                ->constrained()
                ->onDelete('cascade');

            $table->timestamps();

            $table->unique(['user_id', 'spot_id']); // Prevent duplicate wishlist items
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};
