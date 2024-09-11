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
         
        Schema::create('jewelleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('product_id')->unique();
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('gross_weight')->nullable();
            $table->string('size')->nullable(); 
            $table->string('gender', 50)->nullable(); 
            
            $table->string('occasion')->nullable();
            $table->string('material_color')->nullable();
            $table->string('jewellery_type')->nullable();
            $table->string('diamond_clarity')->nullable();
            $table->string('diamond_color')->nullable();
            $table->string('diamond_weight')->nullable();
            $table->integer('no_of_diamonds')->nullable();
            $table->string('diamond_shape')->nullable();
            $table->string('diamond_setting')->nullable();
            $table->decimal('diamond_price', 10, 2)->nullable();
            $table->string('metal')->nullable();
            $table->string('gold_purity')->nullable();
            $table->decimal('gold_price_per_gram', 10, 2)->nullable();
            $table->decimal('gold_weight_in_gm', 10, 2)->nullable();
            $table->decimal('making_charge', 10, 2)->nullable();
            $table->decimal('gst', 10, 2)->nullable(); 
            $table->string('product_type')->nullable(); 
            $table->string('pendant_width')->nullable(); 
            $table->string('pendant_height')->nullable(); 
            $table->string('earring_width')->nullable(); 
            $table->string('earring_height')->nullable(); 
            $table->string('nothing_extra')->nullable(); 
            $table->string('watch_width')->nullable(); 
            $table->string('watch_height')->nullable();   
            $table->timestamps(); 
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    
        Schema::dropIfExists('jewelleries');
       
    }
};
