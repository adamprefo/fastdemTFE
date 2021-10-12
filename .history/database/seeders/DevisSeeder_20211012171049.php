<?php

namespace Database\Seeders;

use App\Models\Devis;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('packs')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1'); 
        
        Devis::factory()->times(5)->create();
    }
}
