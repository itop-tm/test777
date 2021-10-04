<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Domain\Clients\Models\Client;

class ClientsSeeder extends Seeder
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
                'type'      => 'site',
                'name'      => 'post_12',
                'token'     => '000000000000000000000000000',
            ]
        ];

        foreach ($data as $key => $user) {
            Client::create($user);
        }
    }
}
