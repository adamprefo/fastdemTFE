<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1'); 
        
        User::factory()->times(5)->create();

        //admin seeder
        User::create([ 'name' =>'Adam',
            'lastname' => 'De Boeck',
            'email' => 'adam.dbk@live.fr',
            'email_verified_at' => now(),
            'password' => Hash::make('0472512882'), // password
            'phone' => '+32488831753',
            'admin' => '1',

        ]);
    }
}
