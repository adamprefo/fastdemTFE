<?php

namespace Database\Seeders;

use App\Models\Truck;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TruckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('trucks')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1'); 
        
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
