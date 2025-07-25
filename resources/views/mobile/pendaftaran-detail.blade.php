@extends('layouts.mobile')
@section('title')
    Detail Pendaftaran
@endsection
@section('content')
    <!-- Pendaftaran Section -->
    <h2 class="text-xl font-bold mb-4">Detail Pendaftaran</h2>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-50 text-green-700 rounded-md">
            <i class="las la-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    <!-- Informasi Calon Siswa -->
    <div class="p-4 bg-white rounded-lg shadow-md mb-4">
        <h2 class="text-xl font-medium mb-2">Data Pribadi</h2>
        <div class="space-y-2">
            <p><strong>Nama Lengkap:</strong> {{ $calonSiswa->nama_lengkap }}</p>
            <p><strong>NISN:</strong> {{ $calonSiswa->nisn }}</p>
            <p><strong>NIK:</strong> {{ $calonSiswa->nik }}</p>
            <p><strong>Tanggal Lahir:</strong> {{ $tanggalFormatted }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $calonSiswa->jenis_kelamin }}</p>
            <p><strong>Agama:</strong> {{ $calonSiswa->agama }}</p>
            <p><strong>Alamat:</strong> {{ $calonSiswa->alamat }}</p>
            <p><strong>No. HP:</strong> {{ $calonSiswa->no_hp }}</p>
            <p><strong>Email:</strong> {{ $calonSiswa->email }}</p>
            <p><strong>Asal Sekolah:</strong> {{ $calonSiswa->asal_sekolah }}</p>
            <p><strong>Tahun Lulus:</strong> {{ $calonSiswa->tahun_lulus }}</p>
            <p><strong>Nama Ayah:</strong> {{ $calonSiswa->nama_ayah }}</p>
            <p><strong>Pekerjaan Ayah:</strong> {{ $calonSiswa->pekerjaan_ayah }}</p>
            <p><strong>Nama Ibu:</strong> {{ $calonSiswa->nama_ibu }}</p>
            <p><strong>Pekerjaan Ibu:</strong> {{ $calonSiswa->pekerjaan_ibu }}</p>
            <p><strong>Nilai UN:</strong> {{ $calonSiswa->nilai_un }}</p>
            <p><strong>Nilai Raport:</strong> {{ $calonSiswa->nilai_raport }}</p>
            <p><strong>Status:</strong> {{ $calonSiswa->status }}</p>
        </div>
    </div>

    <!-- Dokumen Calon Siswa -->
    <div class="p-4 bg-white rounded-lg shadow-md">
        <h2 class="text-xl font-medium mb-2">Dokumen Pendukung</h2>
        <div class="space-y-2">
            <p><strong>Foto 3x4:</strong>
                @if ($calonSiswa->dokumens && $calonSiswa->dokumens->foto_file)
                    <a href="{{ Storage::url($calonSiswa->dokumens->foto_file) }}" target="_blank">Lihat Foto</a>
                @else
                    Belum diunggah
                @endif
            </p>
            <p><strong>Kartu Keluarga:</strong>
                @if ($calonSiswa->dokumens && $calonSiswa->dokumens->kk_file)
                    <a href="{{ Storage::url($calonSiswa->dokumens->kk_file) }}" target="_blank">Lihat File</a>
                @else
                    Belum diunggah
                @endif
            </p>
            <p><strong>Akta Lahir:</strong>
                @if ($calonSiswa->dokumens && $calonSiswa->dokumens->akta_file)
                    <a href="{{ Storage::url($calonSiswa->dokumens->akta_file) }}" target="_blank">Lihat File</a>
                @else
                    Belum diunggah
                @endif
            </p>
            <p><strong>Ijazah SD/SKHUN:</strong>
                @if ($calonSiswa->dokumens && $calonSiswa->dokumens->ijazah_sd_file)
                    <a href="{{ Storage::url($calonSiswa->dokumens->ijazah_sd_file) }}" target="_blank">Lihat File</a>
                @else
                    Belum diunggah
                @endif
            </p>
            <p><strong>Rapor:</strong>
                @if ($calonSiswa->dokumens && $calonSiswa->dokumens->rapor_file)
                    <a href="{{ Storage::url($calonSiswa->dokumens->rapor_file) }}" target="_blank">Lihat File</a>
                @else
                    Belum diunggah
                @endif
            </p>
        </div>
    </div>

    <!-- Tombol Edit -->
    <div class="mt-6">
        <a href="{{ route('pendaftaran.edit', $calonSiswa->id) }}"
            class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-md">
            <i class="las la-edit mr-2"></i>
            Edit Data Pendaftaran
        </a>
    </div>
@endsection
