@extends('layouts.mobile')
@section('title')
    Dashboard
@endsection
@section('content')
    <!-- Header -->
    <div class="text-center mb-8">
        <img src="{{ URL::asset('dist/img/images/logo/logo.png') }}" alt="Logo PPDB" class="w-12 h-21 mx-auto mb-3">
        <h1 class="text-2xl font-bold">PPDB Online 2025</h1>
    </div>

    <!-- Cards Grid -->
    <div class="grid grid-cols-2 md:grid-cols-2 gap-5 mb-8">
        <!-- Card 1 -->
        <a href="{{ route('pendaftaran.create') }}">
            <div
                class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center text-center hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white mb-3">
                    <i class="las la-file-alt text-xl"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">PPDB Online</h3>
                <p class="text-gray-600 text-sm">Daftar sebagai siswa baru</p>
            </div>
        </a>

        <!-- Card 2 -->
        <div
            class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center text-center hover:shadow-lg transition-shadow">
            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white mb-3">
                <i class="las la-check-circle text-xl"></i>
            </div>
            <h3 class="font-bold text-lg mb-2">Cek Status</h3>
            <p class="text-gray-600 text-sm">Lihat status pendaftaran</p>
        </div>
    </div>

    <!-- Informasi PPDB Section -->
    <h2 class="text-xl font-bold mb-4">Informasi PPDB</h2>

    <!-- Info Cards -->
    <div class="space-y-4 mb-4">
        <!-- Info 1 -->
        @forelse ($pengumumans as $pengumuman)
            <div class="bg-white rounded-lg shadow-md p-4 border-l-4 border-blue-500 hover:shadow-lg transition-shadow">
                <a href="{{ route('pengumuman.detail', $pengumuman->slug) }}">
                    <div class="flex items-center mb-2">
                        <span class="font-bold">{{ $pengumuman->judul }}</span>
                    </div>
                    <p class="text-gray-700 text-sm pb-2">{{ $pengumuman->created_at->translatedFormat('d F Y, h:s') }}
                    </p>
                    <p class="text-gray-600 text-sm">{!! implode(' ', array_slice(explode(' ', $pengumuman->body), 0, 20)) !!}...</p>
                </a>
            </div>
        @empty
            <div class="mb-4 bg-red-50 text-red-700 text-center p-3 rounded-md">
                Informasi PPDB belum Tersedia.
            </div>
        @endforelse
    </div>
@endsection
