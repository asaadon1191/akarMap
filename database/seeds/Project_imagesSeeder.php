<?php

use App\Models\ProjectImage;
use Illuminate\Database\Seeder;

class Project_imagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProjectImage::class,11)->create();
    }
}
