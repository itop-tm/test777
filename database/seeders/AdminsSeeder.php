<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Domain\Users\Models\User;

class AdminsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'role'         => 'admin',
                'firstname'    => 'Mohamed',
                'lastname'     => 'Hojaev',
                'email'        => 'admin1@turkmenpost.com',
                'password'     => \Hash::make(123123),
            ],
            [
                'role'         => 'admin',
                'firstname'    => 'Kerim',
                'lastname'     => 'Jumaev',
                'email'        => 'admin2@turkmenpost.com',
                'password'     => \Hash::make(123123),
            ]
        ];

        foreach ($data as $key => $user) {
            User::create($user);
        }
    }
}
