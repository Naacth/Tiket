@extends('layouts.app')

@section('title', $movie->title . ' - CinemaTix')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Movie Details -->
        <div class="lg:col-span-1">
            <img src="{{ $movie->poster }}" alt="{{ $movie->title }}" class="w-full rounded-lg shadow-lg mb-6">
            
            <div class="bg-white rounded-lg shadow-md p-6">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $movie->title }}</h1>
                
                <div class="space-y-3 mb-6">
                    <div class="flex items-center">
                        <span class="text-gray-600 w-20">Genre:</span>
                        <span class="font-semibold">{{ $movie->genre }}</span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-gray-600 w-20">Durasi:</span>
                        <span class="font-semibold">{{ $movie->duration }} menit</span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-gray-600 w-20">Sutradara:</span>
                        <span class="font-semibold">{{ $movie->director }}</span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-gray-600 w-20">Pemeran:</span>
                        <span class="font-semibold">{{ $movie->cast }}</span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-gray-600 w-20">Rating:</span>
                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-sm font-semibold">{{ $movie->rating }}</span>
                    </div>
                </div>
                
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Sinopsis</h3>
                    <p class="text-gray-600 leading-relaxed">{{ $movie->description }}</p>
                </div>
                
                @if($movie->trailer_url)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Trailer</h3>
                        <a href="{{ $movie->trailer_url }}" target="_blank" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-300">
                            <i class="fas fa-play mr-2"></i>Tonton Trailer
                        </a>
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Schedules -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Jadwal Tayang</h2>
                
                @if($schedules->isEmpty())
                    <div class="text-center py-12">
                        <i class="fas fa-calendar-times text-6xl text-gray-300 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Jadwal</h3>
                        <p class="text-gray-500">Jadwal tayang untuk film ini akan segera diumumkan.</p>
                    </div>
                @else
                    @foreach($schedules as $date => $dateSchedules)
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">
                                {{ \Carbon\Carbon::parse($date)->format('l, d F Y') }}
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach($dateSchedules as $schedule)
                                    <div class="border border-gray-200 rounded-lg p-4 hover:border-primary transition duration-300">
                                        <div class="flex items-center justify-between mb-3">
                                            <span class="text-lg font-semibold text-gray-800">
                                                {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}
                                            </span>
                                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-semibold">
                                                {{ $schedule->theater->type }}
                                            </span>
                                        </div>
                                        
                                        <div class="space-y-2 mb-4">
                                            <p class="text-sm text-gray-600">
                                                <i class="fas fa-building mr-2"></i>{{ $schedule->theater->cinema->name }}
                                            </p>
                                            <p class="text-sm text-gray-600">
                                                <i class="fas fa-chair mr-2"></i>{{ $schedule->theater->name }}
                                            </p>
                                            <p class="text-sm text-gray-600">
                                                <i class="fas fa-map-marker-alt mr-2"></i>{{ $schedule->theater->cinema->city }}
                                            </p>
                                        </div>
                                        
                                        <div class="flex items-center justify-between">
                                            <span class="text-lg font-bold text-primary">
                                                Rp {{ number_format($schedule->price, 0, ',', '.') }}
                                            </span>
                                            @auth
                                                <a href="{{ route('bookings.create', $schedule) }}" class="bg-primary text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
                                                    Pesan
                                                </a>
                                            @else
                                                <a href="{{ route('login') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-300">
                                                    Login
                                                </a>
                                            @endauth
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection 