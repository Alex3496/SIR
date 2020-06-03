<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Tariff::class, function (Faker $faker) {

    return [
    	'user_id' => rand(4,30),
        'type_tariff' => $faker->randomElement(['TRUCK','TRAIN','MARITIME','AERIAL']),
        'origin' => $faker->city,
        'destiny' => $faker->city,
        'min_weight' => rand(1,50),
        'max_weight' => rand(51,1000),
        'type_weight' => $faker->randomElement(['kg','lb']),
        'distance' => rand(150,2000),
        'type_equipment' => $faker->randomElement(['Dry Box 48 ft','Dry Box 53 ft','Refrigerated Box 53 ft','Plataform 53 ft']),
        'rate' => rand(100,5000),
    ];
});
