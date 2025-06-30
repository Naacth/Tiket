@extends('layouts.app')

@section('title', 'Pemesanan Saya - CinemaTix')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Pemesanan Saya</h1>
        <p class="text-gray-600">Kelola semua pemesanan tiket Anda di sini</p>
    </div>

    @if($bookings->isEmpty())
        <div class="text-center py-12">
            <i class="fas fa-ticket-alt text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Pemesanan</h3>
            <p class="text-gray-500 mb-6">Anda belum memiliki pemesanan tiket. Mulai pesan tiket film favorit Anda sekarang!</p>
            <a href="{{ route('movies.index') }}" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                Lihat Film
            </a>
        </div>
    @else
        <div class="space-y-6">
            @foreach($bookings as $booking)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-start space-x-4">
                                <img src="{{ $booking->schedule->movie->poster }}" alt="{{ $booking->schedule->movie->title }}" class="w-20 h-28 object-cover rounded">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $booking->schedule->movie->title }}</h3>
                                    <p class="text-gray-600 text-sm mb-1">{{ $booking->schedule->movie->genre }}</p>
                                    <p class="text-gray-600 text-sm mb-3">{{ $booking->schedule->movie->duration }} menit</p>
                                    
                                    <div class="space-y-1 text-sm text-gray-600">
                                        <div class="flex items-center">
                                            <i class="fas fa-calendar text-gray-500 w-4 mr-2"></i>
                                            <span>{{ \Carbon\Carbon::parse($booking->schedule->date)->format('d/m/Y') }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-clock text-gray-500 w-4 mr-2"></i>
                                            <span>{{ \Carbon\Carbon::parse($booking->schedule->start_time)->format('H:i') }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-building text-gray-500 w-4 mr-2"></i>
                                            <span>{{ $booking->schedule->theater->cinema->name }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-chair text-gray-500 w-4 mr-2"></i>
                                            <span>{{ $booking->schedule->theater->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-right">
                                <div class="mb-2">
                                    <span class="px-3 py-1 rounded-full text-sm font-semibold 
                                        {{ $booking->status === 'confirmed' ? 'bg-green-100 text-green-800' : 
                                           ($booking->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                           'bg-red-100 text-red-800') }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </div>
                                <p class="text-sm text-gray-600">Kode: {{ $booking->booking_code }}</p>
                                <p class="text-lg font-bold text-primary">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center">
                                    <i class="fas fa-ticket-alt text-gray-500 mr-2"></i>
                                    <span class="text-sm text-gray-600">{{ $booking->total_seats }} kursi</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt text-gray-500 mr-2"></i>
                                    <span class="text-sm text-gray-600">{{ $booking->schedule->theater->cinema->city }}</span>
                                </div>
                                <div class="flex flex-wrap gap-1">
                                    @foreach($booking->seats as $seat)
                                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-semibold">{{ $seat }}</span>
                                    @endforeach
                                </div>
                            </div>
                            
                            <div class="flex space-x-2">
                                <a href="{{ route('bookings.show', $booking) }}" class="bg-primary text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
                                    Detail
                                </a>
                                @if($booking->status === 'confirmed')
                                    <button onclick="window.print()" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition duration-300">
                                        <i class="fas fa-print mr-1"></i>Cetak
                                    </button>
                                @endif
                            </div>
                        </div>
                        
                        @if($booking->payment && $booking->payment->status === 'pending')
                            <div class="mt-4 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                                <div class="flex items-center">
                                    <i class="fas fa-exclamation-triangle text-yellow-600 mr-2"></i>
                                    <span class="text-sm text-yellow-800">Pembayaran pending. Batas waktu: {{ $booking->expired_at->format('d/m/Y H:i') }}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        @if($bookings->hasPages())
            <div class="mt-8">
                {{ $bookings->links() }}
            </div>
        @endif
    @endif
@endsection 