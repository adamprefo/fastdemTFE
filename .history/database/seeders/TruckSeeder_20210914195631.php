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
                        'mCarrer' => '35',
                        
                        ]);

        Truck::create(['size' => 'Medium',
                        'mCarrer' => '35',
                        
                        ]);
        Truck::create(['size' => 'Large',
                        'mCarrer' => '45',
                        
                        ]);
    }
}
