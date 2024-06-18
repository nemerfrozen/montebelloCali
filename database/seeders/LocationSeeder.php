<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;

class locationSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create locations
        Location::create(['name' => 'Montebello']);
        Location::create(['name' => 'Campoalegre']);
        Location::create(['name' => 'Las palmas']);
        Location::create(['name' => 'Golondrinas']);
        
    }
}
