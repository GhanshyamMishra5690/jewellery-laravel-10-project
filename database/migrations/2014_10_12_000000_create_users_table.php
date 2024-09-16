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
        
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique(); 
            $table->string('avatar')->nullable();
            $table->string('document')->nullable();
            $table->string('phone')->nullable();
            $table->string('dob')->nullable();
            $table->string('password');
            $table->enum('status', ['0', '1'])->default('0')->comment('0: Inactive, 1: Active');
            $table->enum('userType', ['admin', 'user','wholesaler'])->default('user');
            $table->rememberToken();
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('users');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};
