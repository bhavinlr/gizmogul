<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Admin',
                'slug' => 'admin'
            ],
            [
                'name' => 'Vendor',
                'slug' => 'vendor'
            ],
            [
                'name' => 'User',
                'slug' => 'user'
            ]
        ];

        Role::insert($roles);
    }
}
