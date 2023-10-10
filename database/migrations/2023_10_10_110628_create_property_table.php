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
        Schema::create('property', function (Blueprint $table) {
            $table->id();
            $table->string('image_url'); 
            $table->string('property_name');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('addresses_id');
            $table->decimal('price_per_month', 10, 2); 
            $table->decimal('total_contract_price', 10, 2); 
            $table->decimal('lot_area', 8, 2); 
            $table->decimal('floor_area', 8, 2); 
            $table->enum('listing_status', ['available', 'sold'])->default('available');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('addresses_id')->references('id')->on('addresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property');
    }
};