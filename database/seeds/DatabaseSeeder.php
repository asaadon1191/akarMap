<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);               
        // $this->call(GovernoratesSeeder::class);               
        // $this->call(CitiesSeeder::class);               
        // $this->call(CompaniesSeeder::class);               
        // $this->call(ProjectsSeeder::class);               
        // $this->call(Project_imagesSeeder::class);               
        // $this->call(AttributesSeeder::class);               
        // $this->call(BuildingTypesSeeder::class);               
        $this->call(BuildingsSeeder::class); 
        // $this->call(AdminCompanySeeder::class); 



    }
}
