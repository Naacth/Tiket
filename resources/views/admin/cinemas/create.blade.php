@extends('layouts.app')

@section('title', 'Tambah Bioskop - Admin')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Tambah Bioskop Baru</h1>
    <form action="{{ route('admin.cinemas.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Nama</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" value="{{ old('name') }}" required>
            @error('name')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Alamat</label>
            <textarea name="address" class="w-full border rounded px-3 py-2" rows="2" required>{{ old('address') }}</textarea>
            @error('address')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Kota</label>
            <input type="text" name="city" class="w-full border rounded px-3 py-2" value="{{ old('city') }}" required>
            @error('city')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Telepon</label>
            <input type="text" name="phone" class="w-full border rounded px-3 py-2" value="{{ old('phone') }}" required>
            @error('phone')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Email</label>
            <input type="email" name="email" class="w-full border rounded px-3 py-2" value="{{ old('email') }}">
            @error('email')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Fasilitas</label>
            <textarea name="facilities" class="w-full border rounded px-3 py-2" rows="2">{{ old('facilities') }}</textarea>
            @error('facilities')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-6">
            <label class="inline-flex items-center">
                <input type="checkbox" name="is_active" value="1" class="form-checkbox" {{ old('is_active', true) ? 'checked' : '' }}>
                <span class="ml-2 text-gray-700">Aktif</span>
            </label>
        </div>
        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.cinemas.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
            <button type="submit" class="bg-primary text-white px-6 py-2 rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection 