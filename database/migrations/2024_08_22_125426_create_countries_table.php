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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->char('country_code', 2)->unique();  // ISO 3166-1 alpha-2 code
            $table->string('country_name');
            $table->timestamps();
        });

        DB::table('countries')->insert([
            ['country_code' => 'US', 'country_name' => 'United States'],
            ['country_code' => 'CA', 'country_name' => 'Canada'],
            ['country_code' => 'GB', 'country_name' => 'United Kingdom'],
            ['country_code' => 'FR', 'country_name' => 'France'],
            ['country_code' => 'DE', 'country_name' => 'Germany'],
            ['country_code' => 'IN', 'country_name' => 'India'],
            ['country_code' => 'CN', 'country_name' => 'China'],
            ['country_code' => 'JP', 'country_name' => 'Japan'],
            ['country_code' => 'AU', 'country_name' => 'Australia'],
            ['country_code' => 'BR', 'country_name' => 'Brazil']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
