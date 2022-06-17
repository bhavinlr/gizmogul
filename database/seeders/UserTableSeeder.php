<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Models\User');
        $user = [
            [
                'name' => 'Mayur',
                'email' => 'mayur@logicrays.com',
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'city' => $faker->city,
                'state' => $faker->state,
                'zip' => $faker->postcode,
                'password' => bcrypt('Mayur@1998'),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => \Str::random(10),
                'active' => '1',
            ],
            [
                'name' => 'Angela Gill',
                'email' => 'tese@mailinator.com',
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'city' => $faker->city,
                'state' => $faker->state,
                'zip' => $faker->postcode,
                'password' => bcrypt('Test@123'),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => \Str::random(10),
                'active' => '1',
            ],
            [
                'name' => 'Keegan Turner',
                'email' => 'senocog@mailinator.com',
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'city' => $faker->city,
                'state' => $faker->state,
                'zip' => $faker->postcode,
                'password' => bcrypt('Test@123'),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => \Str::random(10),
                'active' => '1',
            ]
        ];

        User::insert($user);
    }
}
