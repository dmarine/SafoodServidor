<?php

use Illuminate\Database\Seeder;

class restaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('restaurants')->insert([
            ['name' => 'Mc Donald\'s'],
            ['name' => 'Burguer King'],
            ['name' => 'TheGoodBurger'],
            ['name'=>'Mr.Vegan'],
            ['name'=>'Sushi Ohayo'],
            ['name'=>'The Salad Time'],
            ['name'=>'100 Montaditos']
            ]);
    }
}
