<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class DefaultUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            (object) [
                'first_name' => 'John',
                'middle_name' => '',
                'last_name' => 'Doe',
                'email' => 'johndoe@domain.com',
                'password' => bcrypt('superAdmin2022$'),
            ],
            (object) [
                'first_name' => 'Brian',
                'middle_name' => '',
                'last_name' => 'Dawson',
                'email' => 'briandawson@domain.com',
                'password' => bcrypt('admin2022$'),
            ],
            (object) [
                'first_name' => 'Kurt',
                'middle_name' => '',
                'last_name' => 'Fuentes',
                'email' => 'johndoe@domain.com',
                'password' => bcrypt('superAdmin2022$'),
            ],
        ];

        foreach($users as $user)
        {

        }
    }
}
