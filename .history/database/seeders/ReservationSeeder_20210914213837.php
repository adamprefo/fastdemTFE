<?php

namespace Database\Seeders;

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
        ReservationSeeder::factory()->times(5)->create();

          /*Reservation::create([
        'devis_id' => '1',
        'truck_id  ' => '1',                   
        'start_time' => '15:00:00',
        'finish_time' => '18:00:00',
        'startDate' => '20-03-2021',
        'packs_id '=> '1'

        ]);*/
    }
}
