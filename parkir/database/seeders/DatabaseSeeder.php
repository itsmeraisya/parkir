<?php

namespace Database\Seeders;

use App\Models\location;
use App\Models\vehicle_types;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $location = location::create([
            'location_name' => 'Central Parking',
            'max_motorcycle' => 20,
            'max_car' => 30,
            'max_other' => 10,
        ]);

        vehicle_types::create([
            'jenis' => 'motorcycle',
            'perjam_pertama' => 2000,
            'perjam_berikutnya' => 1500,
            'max_perhari' => 20000,
        ]);
    }
}
