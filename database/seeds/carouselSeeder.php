<?php

use Illuminate\Database\Seeder;

class carouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carousel')->insert([
            ['name' => 'images/1.jpg'],
            ['name' => 'images/2.jpg'],
            ['name' => 'images/3.jpg',],
            ]);
    }
}
