@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-10">
    <div class="mb-10 text-center">
        <div class="flex justify-center items-center mb-2">
            <svg class="w-12 h-12 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6h13M9 6L3 12l6 6" />
            </svg>
            <h1 class="text-5xl font-extrabold text-gray-900">Dashboard Admin</h1>
        </div>
        <p class="text-lg text-gray-500">Selamat datang di panel administrasi sistem tiket bioskop</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Card Template -->
        <a href="{{ route('admin.movies.index') }}" class="group bg-white rounded-2xl shadow-lg p-8 flex flex-col items-center transition-transform duration-200 hover:-translate-y-2 hover:shadow-2xl border-b-4 border-blue-500 hover:border-blue-700">
            <div class="bg-blue-100 rounded-full p-5 mb-4 transition-all group-hover:scale-110">
                <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M6 20h12M6 4h12"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Manajemen Film</h3>
            <p class="text-gray-500 text-center mb-4">Kelola data film, poster, dan informasi lainnya</p>
            <span class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold shadow hover:bg-blue-700 transition">Kelola Film</span>
        </a>
        <a href="{{ route('admin.cinemas.index') }}" class="group bg-white rounded-2xl shadow-lg p-8 flex flex-col items-center transition-transform duration-200 hover:-translate-y-2 hover:shadow-2xl border-b-4 border-green-500 hover:border-green-700">
            <div class="bg-green-100 rounded-full p-5 mb-4 transition-all group-hover:scale-110">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Manajemen Bioskop</h3>
            <p class="text-gray-500 text-center mb-4">Kelola data bioskop dan lokasi</p>
            <span class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg font-semibold shadow hover:bg-green-700 transition">Kelola Bioskop</span>
        </a>
        <a href="{{ route('admin.theaters.index') }}" class="group bg-white rounded-2xl shadow-lg p-8 flex flex-col items-center transition-transform duration-200 hover:-translate-y-2 hover:shadow-2xl border-b-4 border-purple-500 hover:border-purple-700">
            <div class="bg-purple-100 rounded-full p-5 mb-4 transition-all group-hover:scale-110">
                <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Manajemen Studio</h3>
            <p class="text-gray-500 text-center mb-4">Kelola studio dan kapasitas ruangan</p>
            <span class="inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-lg font-semibold shadow hover:bg-purple-700 transition">Kelola Studio</span>
        </a>
        <a href="#" class="group bg-white rounded-2xl shadow-lg p-8 flex flex-col items-center transition-transform duration-200 hover:-translate-y-2 hover:shadow-2xl border-b-4 border-yellow-500 hover:border-yellow-700">
            <div class="bg-yellow-100 rounded-full p-5 mb-4 transition-all group-hover:scale-110">
                <svg class="w-10 h-10 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Manajemen Jadwal</h3>
            <p class="text-gray-500 text-center mb-4">Kelola jadwal tayang film</p>
            <span class="inline-flex items-center px-4 py-2 bg-yellow-600 text-white rounded-lg font-semibold shadow hover:bg-yellow-700 transition">Kelola Jadwal</span>
        </a>
        <a href="#" class="group bg-white rounded-2xl shadow-lg p-8 flex flex-col items-center transition-transform duration-200 hover:-translate-y-2 hover:shadow-2xl border-b-4 border-red-500 hover:border-red-700">
            <div class="bg-red-100 rounded-full p-5 mb-4 transition-all group-hover:scale-110">
                <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Manajemen User</h3>
            <p class="text-gray-500 text-center mb-4">Kelola data pengguna dan admin</p>
            <span class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg font-semibold shadow hover:bg-red-700 transition">Kelola User</span>
        </a>
        <a href="#" class="group bg-white rounded-2xl shadow-lg p-8 flex flex-col items-center transition-transform duration-200 hover:-translate-y-2 hover:shadow-2xl border-b-4 border-indigo-500 hover:border-indigo-700">
            <div class="bg-indigo-100 rounded-full p-5 mb-4 transition-all group-hover:scale-110">
                <svg class="w-10 h-10 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Manajemen Booking</h3>
            <p class="text-gray-500 text-center mb-4">Kelola pemesanan tiket</p>
            <span class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg font-semibold shadow hover:bg-indigo-700 transition">Kelola Booking</span>
        </a>
    </div>

    <footer class="mt-16 text-center text-gray-400 text-sm">
        &copy; {{ date('Y') }} CinemaTix. All rights reserved.
    </footer>
</div>
@endsection 