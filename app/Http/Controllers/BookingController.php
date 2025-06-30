<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Schedule;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function create(Schedule $schedule)
    {
        $schedule->load(['movie', 'theater.cinema']);
        
        // Get booked seats for this schedule
        $bookedSeats = Booking::where('schedule_id', $schedule->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->pluck('seats')
            ->flatten()
            ->toArray();

        return view('bookings.create', compact('schedule', 'bookedSeats'));
    }

    public function store(Request $request, Schedule $schedule)
    {
        $request->validate([
            'seats' => 'required|array|min:1',
            'seats.*' => 'string'
        ]);

        $seats = $request->seats;
        $totalSeats = count($seats);
        $totalPrice = $schedule->price * $totalSeats;

        // Check if seats are available
        $bookedSeats = Booking::where('schedule_id', $schedule->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->pluck('seats')
            ->flatten()
            ->toArray();

        foreach ($seats as $seat) {
            if (in_array($seat, $bookedSeats)) {
                return back()->withErrors(['seats' => "Kursi $seat sudah dipesan"]);
            }
        }

        // Create booking
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'schedule_id' => $schedule->id,
            'booking_code' => 'BK' . strtoupper(Str::random(8)),
            'total_seats' => $totalSeats,
            'total_price' => $totalPrice,
            'status' => 'pending',
            'seats' => $seats,
            'expired_at' => Carbon::now()->addMinutes(15)
        ]);

        // Create payment
        Payment::create([
            'booking_id' => $booking->id,
            'payment_method' => 'transfer',
            'payment_code' => 'PAY' . strtoupper(Str::random(8)),
            'amount' => $totalPrice,
            'status' => 'pending'
        ]);

        return redirect()->route('bookings.show', $booking)
            ->with('success', 'Pemesanan berhasil dibuat! Silakan lakukan pembayaran dalam 15 menit.');
    }

    public function show(Booking $booking)
    {
        $booking->load(['schedule.movie', 'schedule.theater.cinema', 'payment']);
        return view('bookings.show', compact('booking'));
    }

    public function index()
    {
        $bookings = auth()->user()->bookings()
            ->with(['schedule.movie', 'schedule.theater.cinema'])
            ->latest()
            ->paginate(10);

        return view('bookings.index', compact('bookings'));
    }
} 