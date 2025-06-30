<?php

namespace Database\Seeders;

use App\Models\Cinema;
use App\Models\Theater;
use Illuminate\Database\Seeder;

class CinemaSeeder extends Seeder
{
    public function run(): void
    {
        $cinemas = [
            [
                'name' => 'CinemaTix Mall Taman Anggrek',
                'address' => 'Jl. Letjen S. Parman Kav. 21, Jakarta Barat',
                'city' => 'Jakarta',
                'phone' => '021-1234567',
                'email' => 'tamananggrek@cinematix.com',
                'facilities' => 'Dolby Atmos, IMAX, 4DX, Gold Class, Food & Beverage',
                'is_active' => true,
                'theaters' => [
                    ['name' => 'Studio 1', 'capacity' => 120, 'type' => 'Regular'],
                    ['name' => 'Studio 2', 'capacity' => 100, 'type' => 'Dolby Atmos'],
                    ['name' => 'Studio 3', 'capacity' => 80, 'type' => 'IMAX'],
                    ['name' => 'Studio 4', 'capacity' => 60, 'type' => '4DX'],
                    ['name' => 'Studio 5', 'capacity' => 40, 'type' => 'Gold Class'],
                ]
            ],
            [
                'name' => 'CinemaTix Central Park',
                'address' => 'Jl. Letjen S. Parman, Jakarta Barat',
                'city' => 'Jakarta',
                'phone' => '021-2345678',
                'email' => 'centralpark@cinematix.com',
                'facilities' => 'Dolby Atmos, IMAX, Food & Beverage, VIP Lounge',
                'is_active' => true,
                'theaters' => [
                    ['name' => 'Studio 1', 'capacity' => 150, 'type' => 'Regular'],
                    ['name' => 'Studio 2', 'capacity' => 120, 'type' => 'Dolby Atmos'],
                    ['name' => 'Studio 3', 'capacity' => 100, 'type' => 'IMAX'],
                    ['name' => 'Studio 4', 'capacity' => 80, 'type' => 'Regular'],
                    ['name' => 'Studio 5', 'capacity' => 60, 'type' => 'Gold Class'],
                ]
            ],
            [
                'name' => 'CinemaTix Grand Indonesia',
                'address' => 'Jl. M.H. Thamrin No.1, Jakarta Pusat',
                'city' => 'Jakarta',
                'phone' => '021-3456789',
                'email' => 'grandindonesia@cinematix.com',
                'facilities' => 'Dolby Atmos, IMAX, 4DX, Gold Class, Premium Food',
                'is_active' => true,
                'theaters' => [
                    ['name' => 'Studio 1', 'capacity' => 140, 'type' => 'Regular'],
                    ['name' => 'Studio 2', 'capacity' => 110, 'type' => 'Dolby Atmos'],
                    ['name' => 'Studio 3', 'capacity' => 90, 'type' => 'IMAX'],
                    ['name' => 'Studio 4', 'capacity' => 70, 'type' => '4DX'],
                    ['name' => 'Studio 5', 'capacity' => 50, 'type' => 'Gold Class'],
                ]
            ],
        ];

        foreach ($cinemas as $cinemaData) {
            $theaters = $cinemaData['theaters'];
            unset($cinemaData['theaters']);
            
            $cinema = Cinema::create($cinemaData);
            
            foreach ($theaters as $theater) {
                $theater['cinema_id'] = $cinema->id;
                Theater::create($theater);
            }
        }
    }
} 