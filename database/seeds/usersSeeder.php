<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            [
                'name' => 'Dani',
                'role' => true,
                'email' => 'danielmarinegea@gmail.com',
                'password' => '$2y$10$JEMs9vS62ZXIkwnprOgWnei77Ea3lcEhQLjYnrCvbAL1eX.mki0kW',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Admin',
                'role' => true,
                'email' => 'admin@safood.es',
                'password' => '$2y$10$yc3.D3rnR330vCIl11CUgOFlBBs/LTQvfmQEYrKnq2uxV8q54Ye6a',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ]);
    }
}