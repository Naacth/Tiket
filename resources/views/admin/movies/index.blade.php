@extends('layouts.app')

@section('title', 'Manajemen Film - Admin')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-gray-800">Manajemen Film</h1>
    <a href="{{ route('admin.movies.create') }}" class="bg-primary text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Film</a>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
    </div>
@endif

<div class="overflow-x-auto">
    <table class="min-w-full bg-white rounded-lg shadow-md">
        <thead>
            <tr>
                <th class="px-4 py-2">Poster</th>
                <th class="px-4 py-2">Judul</th>
                <th class="px-4 py-2">Genre</th>
                <th class="px-4 py-2">Durasi</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
                <tr class="border-t">
                    <td class="px-4 py-2"><img src="{{ $movie->poster }}" alt="{{ $movie->title }}" class="w-16 h-24 object-cover rounded"></td>
                    <td class="px-4 py-2 font-semibold">{{ $movie->title }}</td>
                    <td class="px-4 py-2">{{ $movie->genre }}</td>
                    <td class="px-4 py-2">{{ $movie->duration }} menit</td>
                    <td class="px-4 py-2">
                        @if($movie->is_active)
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-semibold">Aktif</span>
                        @else
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs font-semibold">Nonaktif</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 flex space-x-2">
                        <a href="{{ route('admin.movies.edit', $movie) }}" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Edit</a>
                        <form action="{{ route('admin.movies.destroy', $movie) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus film ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $movies->links() }}
</div>
@endsection 