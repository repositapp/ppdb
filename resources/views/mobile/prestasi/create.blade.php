@extends('layouts.mobile')

@section('title', 'Tambah Prestasi')

@section('content')
    <div class="min-h-screen bg-gray-100">
        <!-- Konten Utama -->
        <div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-md">
            <h1 class="text-2xl font-bold mb-4">Tambah Prestasi</h1>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-50 text-red-700 rounded-md">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('prestasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Nama Prestasi -->
                <div class="mb-4">
                    <label for="nama_prestasi" class="block text-gray-700 text-sm font-medium mb-1">Nama Prestasi *</label>
                    <input type="text" name="nama_prestasi" id="nama_prestasi" value="{{ old('nama_prestasi') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Masukkan nama prestasi" required>
                </div>

                <!-- Tingkat -->
                <div class="mb-4">
                    <label for="tingkat" class="block text-gray-700 text-sm font-medium mb-1">Tingkat *</label>
                    <select name="tingkat" id="tingkat"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required>
                        <option value="">Pilih Tingkat</option>
                        <option value="Sekolah" {{ old('tingkat') == 'Sekolah' ? 'selected' : '' }}>Sekolah</option>
                        <option value="Kecamatan" {{ old('tingkat') == 'Kecamatan' ? 'selected' : '' }}>Kecamatan</option>
                        <option value="Kabupaten" {{ old('tingkat') == 'Kabupaten' ? 'selected' : '' }}>Kabupaten</option>
                        <option value="Provinsi" {{ old('tingkat') == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
                        <option value="Nasional" {{ old('tingkat') == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                        <option value="Internasional" {{ old('tingkat') == 'Internasional' ? 'selected' : '' }}>
                            Internasional</option>
                    </select>
                </div>

                <!-- Jenis -->
                <div class="mb-4">
                    <label for="jenis" class="block text-gray-700 text-sm font-medium mb-1">Jenis *</label>
                    <select name="jenis" id="jenis"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required>
                        <option value="">Pilih Jenis</option>
                        <option value="Akademik" {{ old('jenis') == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                        <option value="Non-Akademik" {{ old('jenis') == 'Non-Akademik' ? 'selected' : '' }}>Non-Akademik
                        </option>
                    </select>
                </div>

                <!-- Tahun -->
                <div class="mb-4">
                    <label for="tahun" class="block text-gray-700 text-sm font-medium mb-1">Tahun *</label>
                    <input type="number" name="tahun" id="tahun" value="{{ old('tahun', date('Y')) }}"
                        min="1900" max="{{ date('Y') + 1 }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Masukkan tahun" required>
                </div>

                <!-- Penyelenggara -->
                <div class="mb-4">
                    <label for="penyelenggara" class="block text-gray-700 text-sm font-medium mb-1">Penyelenggara *</label>
                    <input type="text" name="penyelenggara" id="penyelenggara" value="{{ old('penyelenggara') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Masukkan nama penyelenggara" required>
                </div>

                <!-- Peringkat -->
                <div class="mb-4">
                    <label for="peringkat" class="block text-gray-700 text-sm font-medium mb-1">Peringkat</label>
                    <input type="text" name="peringkat" id="peringkat" value="{{ old('peringkat') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Masukkan peringkat (jika ada)">
                </div>

                <!-- File Bukti -->
                <div class="mb-6">
                    <label for="file_bukti" class="block text-gray-700 text-sm font-medium mb-1">File Bukti (PDF/JPG/PNG,
                        Max 5MB)</label>
                    <input type="file" name="file_bukti" id="file_bukti"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        accept="application/pdf,image/jpeg,image/png">
                    <p class="mt-1 text-sm text-gray-500">* Sertifikat atau dokumen pendukung prestasi</p>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex justify-between">
                    <a href="{{ route('prestasi.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-md">
                        <i class="las la-arrow-left mr-2"></i>
                        Batal
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-md">
                        <i class="las la-save mr-2"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
