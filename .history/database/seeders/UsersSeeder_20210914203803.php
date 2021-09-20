<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->times(5)->create();

        //admin seeder
        User::create([ 'name' =>'Adam',
            'lastname' => 'De Boeck',
            'email' => 'adam.dbk@live.fr',
            'email_verified_at' => now(),
            'password' => '0472512882', // password
            'phone' => '+32488831753',
            'admin' => '1',

        ]);
    }
}
