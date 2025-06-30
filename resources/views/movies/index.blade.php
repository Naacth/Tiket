@extends('layouts.app')

@section('title', 'Daftar Film - CinemaTix')

@section('content')
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Daftar Film</h1>
        <p class="text-gray-600">Temukan film terbaik untuk ditonton di bioskop favorit Anda</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($movies as $movie)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <img src="{{ $movie->poster }}" alt="{{ $movie->title }}" class="w-full h-80 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $movie->title }}</h3>
                    <p class="text-gray-600 text-sm mb-2">{{ $movie->genre }} • {{ $movie->duration }} menit</p>
                    <p class="text-gray-500 text-sm mb-3">{{ Str::limit($movie->description, 100) }}</p>
                    
                    <div class="flex items-center justify-between mb-3">
                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs font-semibold">{{ $movie->rating }}</span>
                        <span class="text-sm text-gray-500">{{ $movie->director }}</span>
                    </div>
                    
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">{{ $movie->cast }}</span>
                        <a href="{{ route('movies.show', $movie) }}" class="bg-primary text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
                            Detail
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if($movies->isEmpty())
        <div class="text-center py-12">
            <i class="fas fa-film text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Film</h3>
            <p class="text-gray-500">Film akan segera ditambahkan ke dalam sistem.</p>
        </div>
    @endif
@endsection 