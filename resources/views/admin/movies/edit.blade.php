@extends('layouts.app')

@section('title', 'Edit Film - Admin')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Film</h1>
    <form action="{{ route('admin.movies.update', $movie) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Judul</label>
            <input type="text" name="title" class="w-full border rounded px-3 py-2" value="{{ old('title', $movie->title) }}" required>
            @error('title')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
            <textarea name="description" class="w-full border rounded px-3 py-2" rows="4" required>{{ old('description', $movie->description) }}</textarea>
            @error('description')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Genre</label>
            <input type="text" name="genre" class="w-full border rounded px-3 py-2" value="{{ old('genre', $movie->genre) }}" required>
            @error('genre')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Durasi (menit)</label>
            <input type="number" name="duration" class="w-full border rounded px-3 py-2" value="{{ old('duration', $movie->duration) }}" required>
            @error('duration')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Sutradara</label>
            <input type="text" name="director" class="w-full border rounded px-3 py-2" value="{{ old('director', $movie->director) }}" required>
            @error('director')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Pemeran</label>
            <input type="text" name="cast" class="w-full border rounded px-3 py-2" value="{{ old('cast', $movie->cast) }}" required>
            @error('cast')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Poster (URL)</label>
            <input type="url" name="poster" class="w-full border rounded px-3 py-2" value="{{ old('poster', $movie->poster) }}" required>
            @error('poster')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Trailer (URL)</label>
            <input type="url" name="trailer_url" class="w-full border rounded px-3 py-2" value="{{ old('trailer_url', $movie->trailer_url) }}">
            @error('trailer_url')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Rating</label>
            <select name="rating" class="w-full border rounded px-3 py-2" required>
                <option value="">Pilih Rating</option>
                <option value="G" {{ old('rating', $movie->rating) == 'G' ? 'selected' : '' }}>G</option>
                <option value="PG" {{ old('rating', $movie->rating) == 'PG' ? 'selected' : '' }}>PG</option>
                <option value="PG-13" {{ old('rating', $movie->rating) == 'PG-13' ? 'selected' : '' }}>PG-13</option>
                <option value="R" {{ old('rating', $movie->rating) == 'R' ? 'selected' : '' }}>R</option>
                <option value="NC-17" {{ old('rating', $movie->rating) == 'NC-17' ? 'selected' : '' }}>NC-17</option>
            </select>
            @error('rating')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-6">
            <label class="inline-flex items-center">
                <input type="checkbox" name="is_active" value="1" class="form-checkbox" {{ old('is_active', $movie->is_active) ? 'checked' : '' }}>
                <span class="ml-2 text-gray-700">Aktif</span>
            </label>
        </div>
        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.movies.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
            <button type="submit" class="bg-primary text-white px-6 py-2 rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection 