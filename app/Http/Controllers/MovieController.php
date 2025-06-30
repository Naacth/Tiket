<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::active()->latest()->get();
        return view('movies.index', compact('movies'));
    }

    public function show(Movie $movie)
    {
        $schedules = $movie->schedules()
            ->with(['theater.cinema'])
            ->active()
            ->upcoming()
            ->orderBy('date')
            ->orderBy('start_time')
            ->get()
            ->groupBy('date');

        return view('movies.show', compact('movie', 'schedules'));
    }
} 