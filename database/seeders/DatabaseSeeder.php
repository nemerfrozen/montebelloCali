<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // create locations
        Location::create(['name' => 'Montebello']);
        Location::create(['name' => 'Campoalegre']);
        Location::create(['name' => 'Las palmas']);
        Location::create(['name' => 'Golondrinas']);

        // create categories
        Category::create(['name' => 'Electronico', 'description' => 'Electronic devices']);
        Category::create(['name' => 'Empleos', 'description' => 'Job offers']);
        Category::create(['name' => 'Alquiler', 'description' => 'Real estate']);
        Category::create(['name' => 'Vehiculos', 'description' => 'Vehicles']);
        // muebles
        Category::create(['name' => 'Muebles', 'description' => 'Furniture']);
        // servicios
        Category::create(['name' => 'Servicios', 'description' => 'Services']);
        // deportes

    }
}
