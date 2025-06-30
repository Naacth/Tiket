<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    public function index()
    {
        $cinemas = Cinema::latest()->paginate(10);
        return view('admin.cinemas.index', compact('cinemas'));
    }

    public function create()
    {
        return view('admin.cinemas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email',
            'facilities' => 'nullable',
            'is_active' => 'boolean',
        ]);
        Cinema::create($request->all());
        return redirect()->route('admin.cinemas.index')->with('success', 'Bioskop berhasil ditambahkan!');
    }

    public function edit(Cinema $cinema)
    {
        return view('admin.cinemas.edit', compact('cinema'));
    }

    public function update(Request $request, Cinema $cinema)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email',
            'facilities' => 'nullable',
            'is_active' => 'boolean',
        ]);
        $cinema->update($request->all());
        return redirect()->route('admin.cinemas.index')->with('success', 'Bioskop berhasil diupdate!');
    }

    public function destroy(Cinema $cinema)
    {
        $cinema->delete();
        return redirect()->route('admin.cinemas.index')->with('success', 'Bioskop berhasil dihapus!');
    }
} 