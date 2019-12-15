<?php

use Illuminate\Database\Seeder;

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
             ['name' => 'gluten'],
             ['name' => 'altramuces'],
             ['name' => 'moluscos'],
             ['name' => 'sulfitos'],
             ['name' => 'sesamo'],
             ['name' => 'mostaza'],
             ['name' => 'apio'],
             ['name' => 'frutos de cascara'],
             ['name' => 'leche y lactosa'],
             ['name' => 'soja'],
             ['name' => 'cacahuetes'],
             ['name' => 'pescado'],
             ['name' => 'huevos'],
             ['name' => 'crustaceos'],
             ]);
    }
}
