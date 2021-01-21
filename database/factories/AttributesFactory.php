<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Attribute;
use Faker\Generator as Faker;

$factory->define(Attribute::class, function (Faker $faker) {
    return 
    [
        'name'             => $this->faker->name,
    ];
});
