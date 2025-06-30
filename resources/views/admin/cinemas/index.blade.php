@extends('layouts.app')

@section('title', 'Manajemen Bioskop - Admin')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-gray-800">Manajemen Bioskop</h1>
    <a href="{{ route('admin.cinemas.create') }}" class="bg-primary text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Bioskop</a>
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
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Alamat</th>
                <th class="px-4 py-2">Kota</th>
                <th class="px-4 py-2">Telepon</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cinemas as $cinema)
                <tr class="border-t">
                    <td class="px-4 py-2 font-semibold">{{ $cinema->name }}</td>
                    <td class="px-4 py-2">{{ $cinema->address }}</td>
                    <td class="px-4 py-2">{{ $cinema->city }}</td>
                    <td class="px-4 py-2">{{ $cinema->phone }}</td>
                    <td class="px-4 py-2">
                        @if($cinema->is_active)
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-semibold">Aktif</span>
                        @else
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs font-semibold">Nonaktif</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 flex space-x-2">
                        <a href="{{ route('admin.cinemas.edit', $cinema) }}" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Edit</a>
                        <form action="{{ route('admin.cinemas.destroy', $cinema) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus bioskop ini?')">
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
    {{ $cinemas->links() }}
</div>
@endsection 