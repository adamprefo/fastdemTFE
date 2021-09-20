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
        'startDate' => $this->faker->dateTimeBetween('+0 days', '+2 years'),
        'starTime' => '110,00',
        'truck_id'=>'1'

        ]);
    }
}
