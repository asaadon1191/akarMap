<?php

use App\Models\Admin;
use App\Models\Company;
use Illuminate\Database\Seeder;

class AdminCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Admin::class, 10)->create()->each(function($admin)
        {
            // With dummy questions
            $admin->companies()->saveMany(factory(Company::class, 10)->make()->each(function($company)
            {
                // With dummy tags
                $company->admins()->sync(factory(Admin::class, 5)->make());
            }));
        });
    }
}
