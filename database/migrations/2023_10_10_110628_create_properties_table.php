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
            $table->string('image_url');
            $table->string('property_name');
            $table->foreignId('users_id')->constrained();
            $table->string('country');
            $table->string('province');
            $table->string('city');
            $table->string('barangay');
            $table->string('street_name');
            $table->string('block_number');
            $table->string('lot_number');
            $table->decimal('price_per_month', 10, 2);
            $table->decimal('total_contract_price', 10, 2);
            $table->decimal('lot_area', 8, 2);
            $table->enum('listing_status', ['available', 'sold'])->default('available');
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