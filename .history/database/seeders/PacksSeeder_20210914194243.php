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
        Packs::factory()->times(3)->create();
    }
}
