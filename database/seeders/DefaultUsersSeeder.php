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
                'email' => 'kurtfuentes@domain.com',
                'password' => bcrypt('superAdmin2022$'),
            ],
        ];

        $idx = 0;

        foreach($users as $user)
        {
            $userRoleId = $idx + 1;
            User::create([
                'user_role_id' => $userRoleId,
                'first_name' => $user->first_name,
                'middle_name' => $user->middle_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'password' => $user->password,
            ]);
        }
    }
}
