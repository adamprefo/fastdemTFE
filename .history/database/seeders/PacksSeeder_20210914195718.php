<?php

namespace Database\Seeders;

use App\Models\Packs;
use Illuminate\Database\Seeder;

class PacksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Packs::create(['name' => 'Economique',
                        'size_truck' => 'Medium',
                        'nb_workers' => '2',
                        'time_workers' => '2',
                        'price' => '110,00',
                        'truck_id'=>'1'

                        ]);

                        Packs::create(['name' => 'Standard',
                        'size_truck' => 'Medium',
                        'nb_workers' => '2',
                        'time_workers' => '4',
                        'price' => '180,00',
                        'truck_id'=>'2'

                        ]);

           Packs::create(['name' => 'VIP',
                        'size_truck' => 'Large',
                        'nb_workers' => '4',
                        'time_workers' => '6',
                        'price' => '210,00',
                        'truck_id'=>'3'

                        ]);
        
    }
}
