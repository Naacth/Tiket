@extends('layouts.app')

@section('title', 'Pesan Tiket - ' . $schedule->movie->title)

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Pesan Tiket</h1>
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <img src="{{ $schedule->movie->poster }}" alt="{{ $schedule->movie->title }}" class="w-full rounded-lg">
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $schedule->movie->title }}</h2>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <i class="fas fa-calendar text-gray-500 w-5 mr-3"></i>
                                <span class="text-gray-600">{{ \Carbon\Carbon::parse($schedule->date)->format('l, d F Y') }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-clock text-gray-500 w-5 mr-3"></i>
                                <span class="text-gray-600">{{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-building text-gray-500 w-5 mr-3"></i>
                                <span class="text-gray-600">{{ $schedule->theater->cinema->name }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-chair text-gray-500 w-5 mr-3"></i>
                                <span class="text-gray-600">{{ $schedule->theater->name }} ({{ $schedule->theater->type }})</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-tag text-gray-500 w-5 mr-3"></i>
                                <span class="text-xl font-bold text-primary">Rp {{ number_format($schedule->price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-6">Pilih Kursi</h3>
            
            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('bookings.store', $schedule) }}" method="POST" id="bookingForm">
                @csrf
                
                <!-- Screen -->
                <div class="text-center mb-8">
                    <div class="bg-gray-300 h-2 rounded-lg mb-4"></div>
                    <p class="text-gray-600 font-semibold">LAYAR</p>
                </div>

                <!-- Seat Selection -->
                <div class="grid grid-cols-10 gap-2 mb-8">
                    @php
                        $rows = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
                        $cols = range(1, 10);
                    @endphp
                    
                    @foreach($rows as $row)
                        @foreach($cols as $col)
                            @php
                                $seatNumber = $row . $col;
                                $isBooked = in_array($seatNumber, $bookedSeats);
                            @endphp
                            
                            <button type="button" 
                                class="seat-btn w-10 h-10 rounded text-sm font-semibold transition duration-300 {{ $isBooked ? 'bg-red-500 text-white cursor-not-allowed' : 'bg-gray-200 hover:bg-blue-200 text-gray-700' }}"
                                data-seat="{{ $seatNumber }}"
                                {{ $isBooked ? 'disabled' : '' }}>
                                {{ $seatNumber }}
                            </button>
                        @endforeach
                    @endforeach
                </div>

                <!-- Legend -->
                <div class="flex justify-center space-x-6 mb-6">
                    <div class="flex items-center">
                        <div class="w-6 h-6 bg-gray-200 rounded mr-2"></div>
                        <span class="text-sm text-gray-600">Tersedia</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-6 h-6 bg-blue-500 rounded mr-2"></div>
                        <span class="text-sm text-gray-600">Dipilih</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-6 h-6 bg-red-500 rounded mr-2"></div>
                        <span class="text-sm text-gray-600">Sudah Dipesan</span>
                    </div>
                </div>

                <!-- Selected Seats -->
                <div class="mb-6">
                    <h4 class="text-lg font-semibold text-gray-800 mb-3">Kursi yang Dipilih:</h4>
                    <div id="selectedSeats" class="flex flex-wrap gap-2 min-h-10 p-3 border border-gray-300 rounded-lg">
                        <span class="text-gray-500">Belum ada kursi yang dipilih</span>
                    </div>
                </div>

                <!-- Total -->
                <div class="bg-gray-50 rounded-lg p-4 mb-6">
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-semibold text-gray-800">Total Harga:</span>
                        <span class="text-2xl font-bold text-primary" id="totalPrice">Rp 0</span>
                    </div>
                </div>

                <!-- Hidden inputs for selected seats -->
                <div id="seatInputs"></div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('movies.show', $schedule->movie) }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition duration-300">
                        Batal
                    </a>
                    <button type="submit" id="submitBtn" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300" disabled>
                        Lanjutkan ke Pembayaran
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let selectedSeats = [];
        const pricePerSeat = {{ $schedule->price }};

        document.querySelectorAll('.seat-btn:not([disabled])').forEach(btn => {
            btn.addEventListener('click', function() {
                const seat = this.dataset.seat;
                
                if (selectedSeats.includes(seat)) {
                    // Remove seat
                    selectedSeats = selectedSeats.filter(s => s !== seat);
                    this.classList.remove('bg-blue-500', 'text-white');
                    this.classList.add('bg-gray-200', 'text-gray-700');
                } else {
                    // Add seat
                    selectedSeats.push(seat);
                    this.classList.remove('bg-gray-200', 'text-gray-700');
                    this.classList.add('bg-blue-500', 'text-white');
                }
                
                updateSelectedSeats();
                updateTotalPrice();
                updateSubmitButton();
            });
        });

        function updateSelectedSeats() {
            const container = document.getElementById('selectedSeats');
            const inputsContainer = document.getElementById('seatInputs');
            
            if (selectedSeats.length === 0) {
                container.innerHTML = '<span class="text-gray-500">Belum ada kursi yang dipilih</span>';
                inputsContainer.innerHTML = '';
            } else {
                container.innerHTML = selectedSeats.map(seat => 
                    `<span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">${seat}</span>`
                ).join('');
                
                inputsContainer.innerHTML = selectedSeats.map(seat => 
                    `<input type="hidden" name="seats[]" value="${seat}">`
                ).join('');
            }
        }

        function updateTotalPrice() {
            const total = selectedSeats.length * pricePerSeat;
            document.getElementById('totalPrice').textContent = `Rp ${total.toLocaleString('id-ID')}`;
        }

        function updateSubmitButton() {
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = selectedSeats.length === 0;
        }
    </script>
@endsection 