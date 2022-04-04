<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_type');
            $table->string('brand');
            $table->string('fuel');
            $table->string('color');
            $table->string('location');
            $table->string('image_path');
            $table->string('model');
            $table->string('mileage');
            $table->string('doors');
            $table->string('number_of_seats');
            $table->string('price');
            $table->string('gearbox');
            $table->string('year');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
