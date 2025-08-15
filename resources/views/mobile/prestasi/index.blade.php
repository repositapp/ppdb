@extends('layouts.mobile')

@section('title', 'Data Prestasi')

@section('content')
    <div class="min-h-screen bg-gray-100">
        <!-- Konten Utama -->
        <div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-md">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Data Prestasi</h1>
                <a href="{{ route('prestasi.create') }}"
                    class="inline-flex items-center px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium rounded-md">
                    <i class="las la-plus mr-1"></i>
                    Tambah
                </a>
            </div>

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-50 text-green-700 rounded-md">
                    <i class="las la-check-circle mr-2"></i> {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 p-4 bg-red-50 text-red-700 rounded-md">
                    <i class="las la-exclamation-circle mr-2"></i> {{ session('error') }}
                </div>
            @endif

            @if ($prestasis->count() > 0)
                <div class="space-y-4">
                    @foreach ($prestasis as $prestasi)
                        <div class="p-4 border border-gray-200 rounded-md">
                            <div class="flex justify-between">
                                <h3 class="font-medium text-lg">{{ $prestasi->nama_prestasi }}</h3>
                                <div class="flex space-x-2">
                                    <a href="{{ route('prestasi.edit', $prestasi) }}"
                                        class="text-blue-500 hover:text-blue-700">
                                        <i class="las la-edit"></i>
                                    </a>
                                    <form action="{{ route('prestasi.destroy', $prestasi) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus prestasi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <i class="las la-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="mt-2 text-sm text-gray-600">
                                <p><span class="font-medium">Tingkat:</span> {{ $prestasi->tingkat }}</p>
                                <p><span class="font-medium">Jenis:</span> {{ $prestasi->jenis }}</p>
                                <p><span class="font-medium">Tahun:</span> {{ $prestasi->tahun }}</p>
                                <p><span class="font-medium">Penyelenggara:</span> {{ $prestasi->penyelenggara }}</p>
                                @if ($prestasi->peringkat)
                                    <p><span class="font-medium">Peringkat:</span> {{ $prestasi->peringkat }}</p>
                                @endif

                                @if ($prestasi->file_bukti)
                                    <p class="mt-2">
                                        <span class="font-medium">File Bukti:</span>
                                        <a href="{{ Storage::url($prestasi->file_bukti) }}" target="_blank"
                                            class="text-blue-500 hover:underline">
                                            Lihat File
                                        </a>
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <i class="las la-trophy text-4xl text-gray-300 mb-2"></i>
                    <p class="text-gray-500">Belum ada data prestasi.</p>
                    <p class="text-gray-400 text-sm mt-1">Silakan tambahkan prestasi Anda.</p>
                </div>
            @endif

            <div class="mt-6">
                <a href="{{ route('jalur.index') }}" class="inline-flex items-center text-blue-500 hover:text-blue-700">
                    <i class="las la-arrow-left mr-1"></i>
                    Kembali ke Pilihan Jalur
                </a>
            </div>
        </div>
    </div>
@endsection
