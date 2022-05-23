<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Users\UserRole;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'superadmin',
            'admin',
            'resident'
        ];

        foreach($roles as $role)
        {
            UserRole::create([
                'name' => $role
            ]);
        }
    }
}
