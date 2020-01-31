<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(categoriesSeeder::class);
        $this->call(restaurantsSeeder::class);
        $this->call(allergensSeeder::class);
        $this->call(carouselSeeder::class);
        $this->call(foodsSeeder::class);
        $this->call(usersSeeder::class);
        $this->call(cartSeeder::class);
        $this->call(restaurants_foodsSeeder::class);
        $this->call(foods_allergensSeeder::class);
        $this->call(users_allergensSeeder::class);
    }
}
