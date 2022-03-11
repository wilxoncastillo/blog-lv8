<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Wilson Castillo',
            'email' => 'desarrollo@gmail.com',
            'password' => bcrypt('password')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Roxana Castillo',
            'email' => 'roxana@gmail.com',
            'password' => bcrypt('password')
        ])->assignRole('Blogger');

        User::create([
            'name' => 'Vanessa Castillo',
            'email' => 'vanessa@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::factory(99)->create();
    }
}
