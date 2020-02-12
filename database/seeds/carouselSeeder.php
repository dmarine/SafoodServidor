<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ['name' => 'slider1.jpg'],
            ['name' => 'slider2.jpg'],
            ['name' => 'slider3.jpg',],
        ]);
    }
}
