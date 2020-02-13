<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class users_allergensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users_allergens')->insert([
            [
                'user_id' => 1,
                'allergen_id' => 1
            ],
            [
                'user_id' => 1,
                'allergen_id' => 7
            ]
        ]);
    }
}