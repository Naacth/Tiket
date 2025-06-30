<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Theater;
use App\Models\Cinema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TheaterController extends Controller
{
    public function index()
    {
        $theaters = Theater::with('cinema')->latest()->paginate(10);
        return view('admin.theaters.index', compact('theaters'));
    }

    public function create()
    {
        $cinemas = Cinema::all();
        return view('admin.theaters.create', compact('cinemas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cinema_id' => 'required|exists:cinemas,id',
            'capacity' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        Theater::create($request->all());

        return redirect()->route('admin.theaters.index')
            ->with('success', 'Studio berhasil ditambahkan!');
    }

    public function edit(Theater $theater)
    {
        $cinemas = Cinema::all();
        return view('admin.theaters.edit', compact('theater', 'cinemas'));
    }

    public function update(Request $request, Theater $theater)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cinema_id' => 'required|exists:cinemas,id',
            'capacity' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        $theater->update($request->all());

        return redirect()->route('admin.theaters.index')
            ->with('success', 'Studio berhasil diperbarui!');
    }

    public function destroy(Theater $theater)
    {
        $theater->delete();

        return redirect()->route('admin.theaters.index')
            ->with('success', 'Studio berhasil dihapus!');
    }
} 