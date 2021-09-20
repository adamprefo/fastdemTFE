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
        'nb_workers' => '2',
        'time_workers' => '2',
        'price' => '110,00',
        'truck_id'=>'1'

        ]);
    }
}
