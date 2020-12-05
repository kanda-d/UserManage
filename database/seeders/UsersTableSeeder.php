<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    // @return void


    public function run()
    {
        
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name','admin')->first();
        $managerRole = Role::where('name','manager')->first();
        $userRole = Role::where('name','user')->first();


        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('1234')
        ]);

        $manager = User::create([
            'name' => 'Manager User',
            'email' => 'manager@auther.com',
            'password' => Hash::make('1234')
        ]);


        $user = User::create([
            'name' => 'Genric User',
            'email' => 'genric@user.com',
            'password' => Hash::make('1234')
        ]);



        $admin->roles()->attach($adminRole);
        $manager->roles()->attach($managerRole);
        $user->roles()->attach($userRole);

    }


}
