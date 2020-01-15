<?php

use Illuminate\Database\Seeder;

class foodsSeeder extends Seeder
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
                        'name' => 'Mediterranean Tuna',
                        'category_id'=>'1',
                        'restaurant_id'=>'1',
                        'image'=>'mediterraneantuna.png',
                        'description'=>'Disfruta de esta deliciosa ensalada de atún con la mejor variedad de pimientos y crujientes croutons.',
                        'price'=>'1.5'
                    ),
                     array(
                        'name' => 'Chicken Apple Cesar',
                        'category_id'=>'1',
                        'restaurant_id'=>'1',
                        'image'=>'chickenapplecesarcrispy.png',
                        'description'=>'Base de ensalada acompañada de pollo crispy, manzana fresca, queso en láminas y croutons.',
                        'price'=>'1.5'
                    ),
                    array(
                        'name' => 'Carbonara con Trufa',
                        'category_id'=>'2',
                        'restaurant_id'=>'1',
                        'image'=>'carbonara.png',
                        'description'=>'Deleita tu paladar con la nueva receta seleccionada por el chef Dani García, con crujientes tiras de bacon, carne 100% vacuno español, queso gouda, lechuga Batavia y su producto estrella: salsa con trufa. ¡No podrás resistirte!',
                        'price'=>'1.5'
                    ),
                    array(
                        'name' => 'Smokehouse',
                        'category_id'=>'2',
                        'restaurant_id'=>'1',
                        'image'=>'smokehouse.png',
                        'description'=>'Disfruta de sus 150g de carne 100% vacuno español, acompañada de queso Cheddar Mature, irresistible bacon a la plancha, cebolla asada, lechuga Batavia y sabrosa salsa bourbon BBQ. ¡Amor al primer bocado!',
                        'price'=>'1.5'
                    ),
                    array(
                        'name' => 'Filete de pescado',
                        'category_id'=>'3',
                        'restaurant_id'=>'1',
                        'image'=>'filetepescado.png',
                        'description'=>'Exquisito filete de bacalao rebozado, con queso fundido tipo Cheddar. ',
                        'price'=>'1.5'
                    ),
                    array(
                        'name' => 'Ensalada del chef',
                        'category_id'=>'1',
                        'restaurant_id'=>'2',
                        'image'=>'ensaladadelchef.png',
                        'description'=>'Deliciosa combinación de lechugas y vegetales frescos con una combinación de salsas de la casa. ¡Vas a querer felicitar al chef! ',
                        'price'=>'1.5'
                    ),


        );
    foreach($values as $value)
         DB::table('foods')->insert([$value
                ]);
    }
}
