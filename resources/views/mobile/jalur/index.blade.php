@extends('layouts.mobile')

@section('title', 'Pilih Jalur Pendaftaran')

@section('content')
    <!-- Konten Utama -->
    <div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Pilih Jalur Pendaftaran</h1>

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

        <div class="mb-6">
            <p class="text-gray-600 mb-2">Jalur yang telah dipilih:</p>
            @if ($calonSiswa->jalurPendaftaran)
                <div class="p-3 bg-blue-50 rounded-md">
                    <span class="font-medium">{{ $calonSiswa->jalurPendaftaran->nama_jalur }}</span>
                    <p class="text-sm text-gray-600">{{ $calonSiswa->jalurPendaftaran->deskripsi }}</p>
                </div>
            @else
                <div class="p-3 bg-yellow-50 rounded-md">
                    <span class="font-medium text-yellow-800">Belum memilih jalur</span>
                </div>
            @endif
        </div>

        <form action="{{ route('jalur.update') }}" method="POST">
            @csrf
            @method('POST')

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium mb-2">Pilih Jalur Pendaftaran:</label>

                @foreach ($jalurs as $jalur)
                    <div class="mb-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="jalur_pendaftaran_id" value="{{ $jalur->id }}"
                                {{ old('jalur_pendaftaran_id', $calonSiswa->jalur_pendaftaran_id) == $jalur->id ? 'checked' : '' }}
                                class="form-radio h-4 w-4 text-blue-600">
                            <span class="ml-2">
                                <span class="font-medium">{{ $jalur->nama_jalur }}</span>
                                @if ($jalur->deskripsi)
                                    <span class="block text-sm text-gray-600">{{ $jalur->deskripsi }}</span>
                                @endif
                            </span>
                        </label>
                    </div>
                @endforeach

                @error('jalur_pendaftaran_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md">
                Simpan Pilihan
            </button>
        </form>

        @if ($calonSiswa->jalurPendaftaran && $calonSiswa->jalurPendaftaran->nama_jalur === 'Prestasi')
            <div class="mt-6 pt-4 border-t border-gray-200">
                <a href="{{ route('prestasi.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-green-500 hover:bg-green-600 text-white font-medium rounded-md">
                    <i class="las la-trophy mr-2"></i>
                    Kelola Prestasi
                </a>
            </div>
        @endif
    </div>
@endsection
