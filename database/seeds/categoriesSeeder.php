<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->insert([
            ['name' => 'Ensaladas'],
            ['name' => 'Hamburgesas'],
            ['name' => 'Pescados'],
            ['name'=>'Postres']
            ]);
    }
}
