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
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone' => $this->faker->e164PhoneNumber(),
            'remember_token' => Str::random(10),

        ]);
    }
}
