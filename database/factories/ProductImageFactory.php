<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\ProductImage;

$factory->define(ProductImage::class, function (Faker $faker) {
    return [
        'image'=>$faker->imageUrl(250, 250), // imageUrl(250, 250) Se pasa imagen con ancho y alto
        'product_id' => $faker->numberBetween(1, 100)
    ];
});
