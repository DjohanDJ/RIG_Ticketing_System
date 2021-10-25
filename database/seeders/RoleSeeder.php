<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'roleName' => 'Network Administration'
        ]);

        Role::create([
            'roleName' => 'Supervisor'
        ]);

        Role::create([
            'roleName' => 'Subject Coordinator'
        ]);
    }
}
