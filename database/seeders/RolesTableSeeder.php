<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use App\Models\Role;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run()
    {
        Role::truncate();

        Role::create(['name'=>'admin']);
        Role::create(['name'=>'manager']);
        Role::create(['name'=>'user']);
    }
}