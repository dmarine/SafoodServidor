<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('foods', function($table)
        {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
        });

        Schema::table('foods_allergens', function($table)
        {
            $table->foreign('allergen_id')->references('id')->on('allergens');
            $table->foreign('food_id')->references('id')->on('foods');
        });
        
        Schema::table('restaurants_foods', function($table)
        {
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->foreign('food_id')->references('id')->on('foods');
        });
        
        Schema::table('users_allergens', function($table)
        {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('allergen_id')->references('id')->on('allergens');
        });

        Schema::table('cart', function($table)
        {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('orders', function($table)
        {
            $table->foreign('cart_id')->references('id')->on('cart');
            $table->foreign('food_id')->references('id')->on('foods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){}
}
