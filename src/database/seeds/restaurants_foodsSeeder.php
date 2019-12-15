<?php

use Illuminate\Database\Seeder;

class restaurants_foodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values =array(
            array('restaurant_id'=>'1',
                  'food_id'=>'1'),
            array('restaurant_id'=>'1',
                  'food_id'=>'2')
        );
        foreach($values as $value){
        DB::table('restaurants_foods')->insert([$value
               ]);
        }
    }
}
