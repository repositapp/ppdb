@extends('layouts.mobile')
@section('title')
    Informasi PPDB
@endsection
@section('content')
    <!-- Informasi PPDB Section -->
    <h2 class="text-xl font-bold mb-4">Informasi PPDB</h2>

    <!-- Form Pencarian -->
    <form action="{{ route('pengumuman') }}" method="GET" class="mb-4">
        <div class="relative">
            <input type="text" name="search" id="search" placeholder="Cari pengumuman..." value="{{ request('search') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <button type="submit" class="absolute right-4 top-1/2 transform -translate-y-1/2">
                <i class="las la-search text-gray-500"></i>
            </button>
        </div>
    </form>

    @if ($pengumumans->count() > 0)
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
    @else
        <div class="mb-4 bg-red-50 text-red-700 text-center p-3 rounded-md">
            Tidak ada Informasi PPDB yang ditemukan.
        </div>
    @endif

    <!-- Pagination -->
    <div class="mt-6 mb-4">
        {{ $pengumumans->links('vendor.pagination.tailwind') }}
    </div>
@endsection
