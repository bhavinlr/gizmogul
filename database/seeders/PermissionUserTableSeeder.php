<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class PermissionUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::findOrFail(1)->permissions()->attach(1);
        User::findOrFail(2)->permissions()->attach(1);
        User::findOrFail(3)->permissions()->attach(1);
    }
}
