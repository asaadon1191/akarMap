<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\City;
use App\Models\Company;
use App\Models\Project;
use App\Models\Governorate;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return 
    [
        'name'                  => $this->faker->name,
        'space'                 => $this->faker->numberBetween(80,300), 
        'total_units'           => $this->faker->numberBetween(30,100), 
        'adress'                => $this->faker->address, 
        'logo'                  => $this->faker->image('public/assets/admin/images',640,480, null, false), 
        'map_desigen'           => $this->faker->image('public/assets/admin/images',640,480, null, false), 
        'admin_id'              => 1,
        'governorate_id'        => function () 
        {
            return factory(Governorate::class)->create()->id;
        },
        'city_id'               => function () 
        {
            return factory(City::class)->create()->id;
        },
        'company_id'            => function () 
        {
            return factory(Company::class)->create()->id;
        },
        'is_active'             => $this->faker->boolean,
    ];
});
