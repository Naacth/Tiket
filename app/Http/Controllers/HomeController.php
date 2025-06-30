<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Cinema;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $nowShowing = Movie::active()
            ->whereHas('schedules', function ($query) {
                $query->active()->upcoming();
            })
            ->latest()
            ->take(6)
            ->get();

        $comingSoon = Movie::active()
            ->whereDoesntHave('schedules', function ($query) {
                $query->active()->upcoming();
            })
            ->latest()
            ->take(4)
            ->get();

        $cinemas = Cinema::active()->take(3)->get();

        return view('home', compact('nowShowing', 'comingSoon', 'cinemas'));
    }
} 