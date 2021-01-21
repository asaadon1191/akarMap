<?php

use App\Models\BuildingType;
use Illuminate\Database\Seeder;

class BuildingTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(BuildingType::class,11)->create();

    }
}
