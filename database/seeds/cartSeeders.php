<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('cart')->insert([
            [
                'user_id' => 1,
                'date' => new \DateTime()
            ]
        ]);
    }
}
