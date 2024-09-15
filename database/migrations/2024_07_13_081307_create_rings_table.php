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
        Schema::create('rings', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();                      
            $table->string('slug')->unique();
            $table->string('shape')->nullable();
            $table->string('metal_type')->nullable();
            $table->string('setting_style')->nullable();
            $table->string('band_type')->nullable();
            $table->string('setting_profile')->nullable();
            $table->string('setting_image')->nullable();
            $table->text('setting_description')->nullable();  
            $table->decimal('setting_user_price', 15, 2)->nullable(); 
            $table->decimal('setting_wholesaler_price', 15, 2)->nullable();
            $table->string('stoneType')->nullable();
            $table->string('stone_shape_type')->nullable();
            $table->string('stone_carat')->nullable();  // Assuming carat value could be a decimal
            $table->decimal('stone_price', 15, 2)->nullable();
            $table->string('stone_color')->nullable();
            $table->string('stone_cut')->nullable();
            $table->string('stone_clarity')->nullable();
            $table->string('stone_depth')->nullable();  // Assuming depth value could be a decimal
            $table->string('stone_table')->nullable();  // Assuming table value could be a decimal
            $table->string('stone_ratio')->nullable();  // Assuming ratio value could be a decimal
            $table->string('stone_image')->nullable();
            $table->decimal('stone_user_price', 15, 2)->nullable();
            $table->decimal('stone_wholesaler_price', 15, 2)->nullable(); 
            $table->timestamps();
           
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rings');
    }
};
