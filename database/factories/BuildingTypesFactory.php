<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\BuildingType;
use Faker\Generator as Faker;

$factory->define(BuildingType::class, function (Faker $faker) {
    return 
    [
        'name'                  => $this->faker->name,
        'is_active'             => $this->faker->boolean,
    ];
});
