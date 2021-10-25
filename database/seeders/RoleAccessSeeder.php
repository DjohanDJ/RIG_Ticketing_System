<?php

namespace Database\Seeders;

use App\Models\RoleAccess;
use Illuminate\Database\Seeder;

class RoleAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleAccess::create([
            'roleId' => 1,
            'categoryId' => 2
        ]);

        RoleAccess::create([
            'roleId' => 2,
            'categoryId' => 1
        ]);

        RoleAccess::create([
            'roleId' => 2,
            'categoryId' => 2
        ]);
    }
}
