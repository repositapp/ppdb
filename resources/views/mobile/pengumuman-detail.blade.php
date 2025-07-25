@extends('layouts.mobile')
@section('title')
    Detail Informasi PPDB
@endsection
@section('content')
    <!-- Konten Pengumuman -->
    <div class="max-w-2xl mx-auto">
        <!-- Judul Pengumuman -->
        <h1 class="text-2xl font-bold mb-2">{{ $pengumuman->judul }}</h1>

        <!-- Metadata -->
        <div class="flex items-center text-gray-600 text-sm mb-6">
            <span class="flex items-center mr-4">
                <i class="las la-user mr-1"></i>
                {{ $pengumuman->user->name ?? 'Admin' }}
            </span>
            <span class="flex items-center mr-4">
                <i class="las la-calendar mr-1"></i>
                {{ $pengumuman->created_at->format('d M Y') }}
            </span>
            <span class="flex items-center">
                <i class="las la-eye mr-1"></i>
                {{ $pengumuman->views }} views
            </span>
        </div>

        <!-- Gambar (jika ada) -->
        @if ($pengumuman->gambar)
            <div class="mb-6">
                <img src="{{ asset($pengumuman->gambar) }}" alt="{{ $pengumuman->judul }}" class="w-full h-auto rounded-lg">
            </div>
        @endif

        <!-- Isi Pengumuman -->
        <div class="prose max-w-none">
            {!! $pengumuman->body !!}
        </div>
    </div>
@endsection
