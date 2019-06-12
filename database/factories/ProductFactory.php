<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
            'name' => substr($faker->sentence(3), 0, -1),//Se crea una oración de 3 palabras sin el punto fina, gracias a la función                                 //substr  
            'description' => $faker->sentence(10),
            'long_description' => $faker->text,
            'price' => $faker->randomFloat(2, 5, 150),

            //Catalogando productos dentro de una categoría
            'category_id' => $faker->numberBetween(1, 5)
    ];
});
 