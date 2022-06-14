<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run()
    {
        User::create(
            [
                'id_profile' => null,
                'username' => 'super admin',
                'password' => Hash::make('NYz=%t*x7ac5#_Z4'),
            ]
        );
    }
}
