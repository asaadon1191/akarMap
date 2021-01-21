<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Project;
use App\Models\Building;
use App\Models\Attribute;
use App\Models\BuildingType;
use Faker\Generator as Faker;

$factory->define(Building::class, function (Faker $faker) {
    return 
    [
        'name'                  => $this->faker->name,
        'space'                 => $this->faker->numberBetween(80,300), 
        'total_units'           => $this->faker->numberBetween(30,100), 
        'price_meter'           => $this->faker->numberBetween(1000,5000), 
        'total_price'           =>  $this->faker->numberBetween(10000,50000), 
        'bed_Room_Number'       =>  $this->faker->numberBetween(1,10), 
        'bath_Room_Number'      => $this->faker->numberBetween(1,3), 
        'aviliable_unites'      => $this->faker->numberBetween(0,100), 
        'sold_unites'           => $this->faker->numberBetween(0,100), 
        'project_id'            => function () 
        {
            return factory(Project::class)->create()->id;
        },
        'building_type_id'      => function () 
        {
            return factory(BuildingType::class)->create()->id;
        },
        'attribute_id'            => function () 
        {
            return factory(Attribute::class)->create()->id;
        },
        'is_active'             => $this->faker->boolean,
    ];
});
