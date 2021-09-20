<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Reservation::create([
        'devis_id' => '1',
        'truck_id  ' => '1',                   
        'start_time' => '15:00:00',
        'finish_time' => '18:00:00',
        'startDate' => '20-03-2021',
        'packs_id '=> '1'

        ]);
        Reservation::create([
            'devis_id' => '2',
            'truck_id  ' => '2',                   
            'start_time' => '15:00:00',
            'finish_time' => '18:00:00',
            'startDate' => '10-08-2021',
            'packs_id '=> '1'
    
            ]);
            Reservation::create([
                'devis_id' => '3',
                'truck_id  ' => '2',                   
                'start_time' => '15:00:00',
                'finish_time' => '18:00:00',
                'startDate' => '05-08-2021',
                'packs_id '=> '2'
        
                ]);
                Reservation::create([
                    'devis_id' => '2',
                    'truck_id  ' => '3',                   
                    'start_time' => '15:00:00',
                    'finish_time' => '18:00:00',
                    'startDate' => '04-04-2021',
                    'packs_id '=> '3'
            
                    ]);
                    Reservation::create([
                        'devis_id' => '1',
                        'truck_id  ' => '1',                   
                        'start_time' => '15:00:00',
                        'finish_time' => '18:00:00',
                        'startDate' => '20-03-2021',
                        'packs_id '=> '1'
                
                        ]);
                        Reservation::create([
                            'devis_id' => '1',
                            'truck_id  ' => '1',                   
                            'start_time' => '15:00:00',
                            'finish_time' => '18:00:00',
                            'startDate' => '20-03-2021',
                            'packs_id '=> '1'
                    
                            ]);
    }
}
