@extends('layouts.app')

@section('title', 'Detail Pemesanan - ' . $booking->booking_code)

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Detail Pemesanan</h1>
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Booking Details -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Informasi Pemesanan</h2>
                
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Kode Pemesanan:</span>
                        <span class="font-semibold text-lg">{{ $booking->booking_code }}</span>
                    </div>
                    
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Status:</span>
                        <span class="px-3 py-1 rounded-full text-sm font-semibold 
                            {{ $booking->status === 'confirmed' ? 'bg-green-100 text-green-800' : 
                               ($booking->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                               'bg-red-100 text-red-800') }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </div>
                    
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Tanggal Pemesanan:</span>
                        <span class="font-semibold">{{ $booking->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Jumlah Kursi:</span>
                        <span class="font-semibold">{{ $booking->total_seats }} kursi</span>
                    </div>
                    
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Total Harga:</span>
                        <span class="font-bold text-xl text-primary">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</span>
                    </div>
                    
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Kursi:</span>
                        <div class="flex flex-wrap gap-1">
                            @foreach($booking->seats as $seat)
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm font-semibold">{{ $seat }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Movie Details -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Informasi Film</h2>
                
                <div class="flex items-start space-x-4 mb-6">
                    <img src="{{ $booking->schedule->movie->poster }}" alt="{{ $booking->schedule->movie->title }}" class="w-24 h-32 object-cover rounded">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $booking->schedule->movie->title }}</h3>
                        <p class="text-gray-600 text-sm mb-1">{{ $booking->schedule->movie->genre }}</p>
                        <p class="text-gray-600 text-sm">{{ $booking->schedule->movie->duration }} menit</p>
                    </div>
                </div>
                
                <div class="space-y-3">
                    <div class="flex items-center">
                        <i class="fas fa-calendar text-gray-500 w-5 mr-3"></i>
                        <span class="text-gray-600">{{ \Carbon\Carbon::parse($booking->schedule->date)->format('l, d F Y') }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-clock text-gray-500 w-5 mr-3"></i>
                        <span class="text-gray-600">{{ \Carbon\Carbon::parse($booking->schedule->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($booking->schedule->end_time)->format('H:i') }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-building text-gray-500 w-5 mr-3"></i>
                        <span class="text-gray-600">{{ $booking->schedule->theater->cinema->name }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-chair text-gray-500 w-5 mr-3"></i>
                        <span class="text-gray-600">{{ $booking->schedule->theater->name }} ({{ $booking->schedule->theater->type }})</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt text-gray-500 w-5 mr-3"></i>
                        <span class="text-gray-600">{{ $booking->schedule->theater->cinema->address }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Information -->
        @if($booking->payment)
            <div class="bg-white rounded-lg shadow-md p-6 mt-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Informasi Pembayaran</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Kode Pembayaran:</span>
                            <span class="font-semibold">{{ $booking->payment->payment_code }}</span>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Metode Pembayaran:</span>
                            <span class="font-semibold">{{ ucfirst($booking->payment->payment_method) }}</span>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Status Pembayaran:</span>
                            <span class="px-3 py-1 rounded-full text-sm font-semibold 
                                {{ $booking->payment->status === 'success' ? 'bg-green-100 text-green-800' : 
                                   ($booking->payment->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                   'bg-red-100 text-red-800') }}">
                                {{ ucfirst($booking->payment->status) }}
                            </span>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Jumlah Pembayaran:</span>
                            <span class="font-bold text-xl text-primary">Rp {{ number_format($booking->payment->amount, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Instruksi Pembayaran</h3>
                        <div class="space-y-2 text-sm text-gray-600">
                            <p>1. Transfer ke rekening berikut:</p>
                            <p class="font-semibold">Bank Central Asia (BCA)</p>
                            <p class="font-semibold">No. Rek: 1234567890</p>
                            <p class="font-semibold">a.n. CinemaTix</p>
                            <p>2. Jumlah transfer: <span class="font-semibold">Rp {{ number_format($booking->payment->amount, 0, ',', '.') }}</span></p>
                            <p>3. Berita: <span class="font-semibold">{{ $booking->payment->payment_code }}</span></p>
                            <p>4. Batas waktu pembayaran: <span class="font-semibold">{{ $booking->expired_at->format('d/m/Y H:i') }}</span></p>
                        </div>
                    </div>
                </div>
                
                @if($booking->payment->status === 'pending')
                    <div class="mt-6 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-triangle text-yellow-600 mr-3"></i>
                            <div>
                                <h4 class="font-semibold text-yellow-800">Pembayaran Pending</h4>
                                <p class="text-yellow-700 text-sm">Silakan lakukan pembayaran sebelum waktu yang ditentukan untuk mengkonfirmasi pemesanan Anda.</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endif

        <!-- Actions -->
        <div class="flex justify-center space-x-4 mt-8">
            <a href="{{ route('bookings.index') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition duration-300">
                Kembali ke Daftar Pemesanan
            </a>
            @if($booking->status === 'confirmed')
                <button onclick="window.print()" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                    <i class="fas fa-print mr-2"></i>Cetak Tiket
                </button>
            @endif
        </div>
    </div>
@endsection 
 