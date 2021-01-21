<?php

use App\Models\Governorate;
use Illuminate\Database\Seeder;

class GovernoratesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Governorate::class,11)->create();
    }
}
