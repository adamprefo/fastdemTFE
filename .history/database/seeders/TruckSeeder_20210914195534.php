<?php

namespace Database\Seeders;

use App\Models\Truck;
use Illuminate\Database\Seeder;

class TruckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Truck::create(['size' => 'Medium',
                        'size_truck' => 'Large',
                        'nb_workers' => '4',
                        'time_workers' => '6',
                        'price' => '210.00',
                        'truck_id'=>'3'

                        ]);
    }
}
