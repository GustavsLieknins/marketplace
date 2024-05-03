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

        Schema::create('engine_volumes', function (Blueprint $table) {
            $table->id();
            $table->string('engine_volume');
        });

        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('location');
        });

        Schema::create('fuels', function (Blueprint $table) {
            $table->id();
            $table->string('fuel');
        });


        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
        });

        Schema::create('transmissions', function (Blueprint $table) {
            $table->id();
            $table->string('transmission');
        });


        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->date('manufacture_date');
            $table->integer('mileage');
            $table->string('color');
            $table->date('teh_apskate')->nullable();;
            $table->string('image_path');
            $table->integer('price');
            $table->string('num_plate')->unique();
            $table->string('vin')->unique();
            $table->string('model');
            
            $table->foreignId('engine_volume_id')->constrained('engine_volumes');
            $table->foreignId('location_id')->constrained('locations');
            $table->foreignId('fuel_id')->constrained('fuels');
            $table->foreignId('transmission_id')->constrained('transmissions');
            $table->foreignId('brand_id')->constrained('brands');
            $table->foreignId('created_by')->constrained('users');
            $table->rememberToken();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
        Schema::dropIfExists('brands');
        Schema::dropIfExists('engine_volumes');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('fuels');
    }
};



