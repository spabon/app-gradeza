<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->word), // Ucfirst():  Coloca la primera letra de una palabra en mayúscula
        'description'=>$faker->sentence(10)
    ];
});
