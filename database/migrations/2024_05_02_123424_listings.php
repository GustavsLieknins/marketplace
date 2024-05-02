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

        Schema::create('engine_volume', function (Blueprint $table) {
            $table->id();
            $table->string('engine_volume');
        });

        Schema::create('location', function (Blueprint $table) {
            $table->id();
            $table->string('location');
        });

        Schema::create('fuel', function (Blueprint $table) {
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
            $table->string('extras')->nullable();
            $table->integer('price');
            $table->string('num_plate')->unique();
            $table->string('vin')->unique();
            $table->string('model');
            
            $table->foreignId('engine_volume')->constrained('engine_volume');
            $table->foreignId('location')->constrained('location');
            $table->foreignId('fuel')->constrained('fuel');
            $table->foreignId('transmission')->constrained('transmissions');
            $table->foreignId('brand')->constrained('brands');
            $table->foreignId('phone_number')->constrained('users');
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
    }
};
