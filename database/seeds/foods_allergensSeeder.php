<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class foods_allergensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values =array(
            array(
                  'food_id'=>'1',
                  'allergen_id'=>'12'
                ),
            array(
                  'food_id'=>'2',
                  'allergen_id'=>'13',
            ),
            array(
                'food_id'=>'2',
                'allergen_id'=>'1'
            ),
            array(
                'food_id'=>'2',
                'allergen_id'=>'9'
            ),
            array(
                'food_id'=>'3',
                'allergen_id'=>'1'
            ),
            array(
                'food_id'=>'3',
                'allergen_id'=>'9'
            ),
            array(
                'food_id'=>'3',
                'allergen_id'=>'12'
            ),
            array(
                'food_id'=>'3',
                'allergen_id'=>'13'
            ),
            array(
                'food_id'=>'3',
                'allergen_id'=>'11'
            ),
            array(
                'food_id'=>'4',
                'allergen_id'=>'1'
            ),
            array(
                'food_id'=>'4',
                'allergen_id'=>'9'
            ),
            array(
                'food_id'=>'4',
                'allergen_id'=>'10'
            ),
            array(
                'food_id'=>'4',
                'allergen_id'=>'5'
            ),
            array(
                'food_id'=>'5',
                'allergen_id'=>'1'
            ),
            array(
                'food_id'=>'5',
                'allergen_id'=>'5'
            ),
            array(
                'food_id'=>'5',
                'allergen_id'=>'6'
            ),
            array(
                'food_id'=>'5',
                'allergen_id'=>'9'
            ),
            array(
                'food_id'=>'5',
                'allergen_id'=>'12'
            ),
            array(
                'food_id'=>'5',
                'allergen_id'=>'13'
            ),
        );
        foreach($values as $value){
        DB::table('foods_allergens')->insert([$value]);
        }
    }
}
