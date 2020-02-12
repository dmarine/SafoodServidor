<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class allergensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('allergens')->insert([
            ['name' => 'Gluten'],
            ['name' => 'Altramuces'],
            ['name' => 'Moluscos'],
            ['name' => 'Sulfitos'],
            ['name' => 'Sesamo'],
            ['name' => 'Mostaza'],
            ['name' => 'Apio'],
            ['name' => 'Frutos de cascara'],
            ['name' => 'Lactosa'],
            ['name' => 'Soja'],
            ['name' => 'Cacahuetes'],
            ['name' => 'Pescado'],
            ['name' => 'Huevos'],
            ['name' => 'Crustaceos'],
        ]);
    }
}
