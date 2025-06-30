<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::latest()->paginate(10);
        return view('admin.movies.index', compact('movies'));
    }

    public function create()
    {
        return view('admin.movies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'genre' => 'required',
            'duration' => 'required|integer',
            'director' => 'required',
            'cast' => 'required',
            'poster' => 'required|url',
            'trailer_url' => 'nullable|url',
            'rating' => 'required|in:G,PG,PG-13,R,NC-17',
            'is_active' => 'boolean',
        ]);
        Movie::create($request->all());
        return redirect()->route('admin.movies.index')->with('success', 'Film berhasil ditambahkan!');
    }

    public function edit(Movie $movie)
    {
        return view('admin.movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'genre' => 'required',
            'duration' => 'required|integer',
            'director' => 'required',
            'cast' => 'required',
            'poster' => 'required|url',
            'trailer_url' => 'nullable|url',
            'rating' => 'required|in:G,PG,PG-13,R,NC-17',
            'is_active' => 'boolean',
        ]);
        $movie->update($request->all());
        return redirect()->route('admin.movies.index')->with('success', 'Film berhasil diupdate!');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('admin.movies.index')->with('success', 'Film berhasil dihapus!');
    }
} 