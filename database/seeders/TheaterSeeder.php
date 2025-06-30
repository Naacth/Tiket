<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Theater;
use App\Models\Cinema;

class TheaterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cinemas = Cinema::all();

        foreach ($cinemas as $cinema) {
            // Studio 1 - Regular
            Theater::create([
                'cinema_id' => $cinema->id,
                'name' => 'Studio 1',
                'capacity' => 120,
                'description' => 'Studio regular dengan kualitas audio dan visual standar',
                'type' => 'Regular',
                'is_active' => true,
            ]);

            // Studio 2 - Dolby Atmos
            Theater::create([
                'cinema_id' => $cinema->id,
                'name' => 'Studio 2',
                'capacity' => 100,
                'description' => 'Studio dengan teknologi Dolby Atmos',
                'type' => 'Dolby Atmos',
                'is_active' => true,
            ]);

            // Studio 3 - IMAX
            Theater::create([
                'cinema_id' => $cinema->id,
                'name' => 'Studio 3',
                'capacity' => 80,
                'description' => 'Studio IMAX dengan layar besar',
                'type' => 'IMAX',
                'is_active' => true,
            ]);

            // Studio 4 - 4DX
            Theater::create([
                'cinema_id' => $cinema->id,
                'name' => 'Studio 4',
                'capacity' => 60,
                'description' => 'Studio 4DX dengan efek gerakan dan sensasi yang mendalam',
                'type' => '4DX',
                'is_active' => true,
            ]);

            // Studio 5 - Gold Class
            Theater::create([
                'cinema_id' => $cinema->id,
                'name' => 'Studio 5',
                'capacity' => 40,
                'description' => 'Studio premium dengan kursi recliner dan layanan VIP',
                'type' => 'Gold Class',
                'is_active' => true,
            ]);
        }
    }
}
