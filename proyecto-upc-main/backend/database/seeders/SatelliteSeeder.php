<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Satellite;

class SatelliteSeeder extends Seeder
{
    public function run()
    {
        Satellite::factory()->count(9)->create();
    }
}