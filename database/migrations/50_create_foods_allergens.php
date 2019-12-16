<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsAllergens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods_allergens', function (Blueprint $table) {
            $table->bigIncrements('id');
           $table->bigInteger('food_id')->unsigned();
            $table->bigInteger('allergen_id')->unsigned();
            $table->foreign('allergen_id')->references('id')->on('allergens');
            $table->foreign('food_id')->references('id')->on('foods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods_allergens');
    }
}
