<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create(
            [
                'name'      => 'mazen',
                'email'     => 'mazen@gmail.com',
                'password'  => bcrypt('ahmed1191'),
                'role_id'   => 1,
                'phone'     => 12345678,
                'status'    => 1
            ]);

            //  //   SAVE PRODUCT_CATEGORY
            //  $admin->admins()->attach(1);

            

                $role = Role::create(
                    [
                        'name' => 'suberAdmin',
                        'permmsions' =>  \json_encode(config('global.permissions'))                    
                    ]);
               
    }
}
