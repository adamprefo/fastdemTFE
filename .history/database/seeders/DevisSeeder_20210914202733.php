<?php

namespace Database\Seeders;

use App\Models\Devis;
use Illuminate\Database\Seeder;

class DevisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Devis::create(['user_id' => '1',
        'startAddress' => '45 Rue de la Pompe',
        'finishAddress' => '55 Rue de la Loie',
        'startDate' => $this->faker->dateTimeBetween('+0 days', '+1 years'),
        'starTime' => $this->faker->time($format = 'H:i:s', $max = '18:00:00'),
        'price'=>'455,00',
        'status'=>'attente',
        'price'=>'455,00'


        ]);
    }
}
