<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Theater;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $movies = Movie::all();
        $theaters = Theater::all();
        
        // Generate schedules for next 7 days
        for ($day = 0; $day < 7; $day++) {
            $date = Carbon::now()->addDays($day);
            
            foreach ($movies as $movie) {
                // Create 2-3 schedules per movie per day
                $schedulesCount = rand(2, 3);
                
                for ($i = 0; $i < $schedulesCount; $i++) {
                    $theater = $theaters->random();
                    $startHour = rand(10, 21); // Between 10 AM and 9 PM
                    $startTime = Carbon::createFromTime($startHour, 0, 0);
                    $endTime = $startTime->copy()->addMinutes($movie->duration + 30); // Add 30 minutes for ads
                    
                    // Set different prices based on theater type
                    $basePrice = 35000;
                    switch ($theater->type) {
                        case 'Dolby Atmos':
                            $price = $basePrice + 15000;
                            break;
                        case 'IMAX':
                            $price = $basePrice + 25000;
                            break;
                        case '4DX':
                            $price = $basePrice + 35000;
                            break;
                        case 'Gold Class':
                            $price = $basePrice + 50000;
                            break;
                        default:
                            $price = $basePrice;
                    }
                    
                    Schedule::create([
                        'movie_id' => $movie->id,
                        'theater_id' => $theater->id,
                        'date' => $date->toDateString(),
                        'start_time' => $startTime->format('H:i:s'),
                        'end_time' => $endTime->format('H:i:s'),
                        'price' => $price,
                        'is_active' => true,
                    ]);
                }
            }
        }
    }
} 