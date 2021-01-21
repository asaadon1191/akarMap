<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Project;
use App\Models\ProjectImage;
use Faker\Generator as Faker;

$factory->define(ProjectImage::class, function (Faker $faker) {
    return 
    [
        'photos'                  => $this->faker->image('public/assets/admin/images',640,480, null, false),
        'project_id'            => function () 
        {
            return factory(Project::class)->create()->id;
        },
    ];
});
