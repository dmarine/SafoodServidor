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
                'email' => 'danielmarinegea@gmail.com',
                'password' => '$2y$10$JEMs9vS62ZXIkwnprOgWnei77Ea3lcEhQLjYnrCvbAL1eX.mki0kW'
            ]
        ]);
    }
}
