@extends('layouts.app')

@section('title', 'CinemaTix - Pemesanan Tiket Bioskop')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-blue-900 to-red-900 text-white py-20 rounded-2xl mb-12">
        <div class="absolute inset-0 bg-black opacity-50 rounded-2xl"></div>
        <div class="relative z-10 text-center">
            <h1 class="text-5xl font-bold mb-4">Selamat Datang di CinemaTix</h1>
            <p class="text-xl mb-8">Nikmati pengalaman menonton film terbaik dengan pemesanan tiket yang mudah dan cepat</p>
            <a href="{{ route('movies.index') }}" class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-lg text-lg font-semibold transition duration-300">
                Lihat Film Sekarang
            </a>
        </div>
    </div>

    <!-- Now Showing Section -->
    <section class="mb-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Sedang Tayang</h2>
            <a href="{{ route('movies.index') }}" class="text-primary hover:text-blue-700 font-semibold">Lihat Semua</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($nowShowing as $movie)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <img src="{{ $movie->poster }}" alt="{{ $movie->title }}" class="w-full h-80 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $movie->title }}</h3>
                        <p class="text-gray-600 text-sm mb-2">{{ $movie->genre }} • {{ $movie->duration }} menit</p>
                        <p class="text-gray-500 text-sm mb-3">{{ Str::limit($movie->description, 100) }}</p>
                        <div class="flex justify-between items-center">
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs font-semibold">{{ $movie->rating }}</span>
                            <a href="{{ route('movies.show', $movie) }}" class="bg-primary text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
                                Pesan Tiket
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Coming Soon Section -->
    <section class="mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Segera Hadir</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($comingSoon as $movie)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <img src="{{ $movie->poster }}" alt="{{ $movie->title }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $movie->title }}</h3>
                        <p class="text-gray-600 text-sm mb-2">{{ $movie->genre }}</p>
                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs font-semibold">Segera Hadir</span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Cinemas Section -->
    <section class="mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Bioskop Kami</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($cinemas as $cinema)
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-building text-2xl text-primary mr-3"></i>
                        <h3 class="text-xl font-semibold text-gray-800">{{ $cinema->name }}</h3>
                    </div>
                    <p class="text-gray-600 mb-2">{{ $cinema->address }}</p>
                    <p class="text-gray-500 text-sm mb-3">{{ $cinema->city }}</p>
                    <div class="flex items-center text-sm text-gray-500">
                        <i class="fas fa-phone mr-2"></i>
                        <span>{{ $cinema->phone }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-white rounded-lg shadow-md p-8">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-8">Mengapa Memilih CinemaTix?</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-ticket-alt text-2xl text-primary"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Pemesanan Mudah</h3>
                <p class="text-gray-600">Pesan tiket film favorit Anda dengan mudah dan cepat dalam beberapa langkah sederhana.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-alt text-2xl text-green-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Pembayaran Aman</h3>
                <p class="text-gray-600">Sistem pembayaran yang aman dan terpercaya dengan berbagai metode pembayaran.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-mobile-alt text-2xl text-purple-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Akses Mobile</h3>
                <p class="text-gray-600">Akses website kami dari perangkat mobile manapun untuk pemesanan yang lebih fleksibel.</p>
            </div>
        </div>
    </section>
@endsection 