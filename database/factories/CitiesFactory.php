<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\City;
use App\Models\Governorate;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return 
    [
        'name'              => $this->faker->name,
        'governorate_id'    => function () 
        {
            return factory(Governorate::class)->create()->id;
        },
        'is_active'         => $this->faker->boolean,
    ];
});
