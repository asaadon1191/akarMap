<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return 
    [
        'name'                  => $this->faker->name,
        'adress'                => $this->faker->address, 
        'phone'                 => $this->faker->phoneNumber, 
        'phone2'                => $this->faker->phoneNumber, 
        'logo'                  => $this->faker->image('public/assets/admin/images',640,480, null, false), 
        'is_active'             => $this->faker->boolean,
    ];
});
