@extends('layouts.mobile')
@section('title')
    Tambah Pendaftaran
@endsection
@section('content')
    <div class="max-w-md my-0 p-6 bg-white">
        <h2 class="text-xl font-bold mb-4">Formulir Pendaftaran</h2>

        <!-- Tampilkan pesan error jika ada -->
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-50 text-red-700 rounded-md">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Tampilkan pesan sukses jika ada -->
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-50 text-green-700 rounded-md">
                <i class="las la-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        <!-- Form Pendaftaran -->
        <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Data Pribadi -->
            <fieldset class="mb-6 p-4 border border-gray-200 rounded-md">
                <legend class="text-lg font-medium text-gray-700 px-2">Data Pribadi</legend>

                <!-- Nama Lengkap -->
                <div class="mb-4">
                    <label for="nama_lengkap" class="block text-gray-700 text-sm font-medium mb-1">Nama Lengkap *</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" required value="{{ old('nama_lengkap') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('nama_lengkap') border-red-500 @enderror"
                        placeholder="Masukkan nama lengkap">
                    @error('nama_lengkap')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- NISN -->
                <div class="mb-4">
                    <label for="nisn" class="block text-gray-700 text-sm font-medium mb-1">NISN *</label>
                    <input type="text" name="nisn" id="nisn" required value="{{ old('nisn') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('nisn') border-red-500 @enderror"
                        placeholder="Masukkan NISN">
                    @error('nisn')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- NIK -->
                <div class="mb-4">
                    <label for="nik" class="block text-gray-700 text-sm font-medium mb-1">NIK *</label>
                    <input type="text" name="nik" id="nik" required value="{{ old('nik') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('nik') border-red-500 @enderror"
                        placeholder="Masukkan NIK">
                    @error('nik')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tempat & Tanggal Lahir -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="tempat_lahir" class="block text-gray-700 text-sm font-medium mb-1">Tempat Lahir
                            *</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" required
                            value="{{ old('tempat_lahir') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('tempat_lahir') border-red-500 @enderror"
                            placeholder="Masukkan tempat lahir">
                        @error('tempat_lahir')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="tanggal_lahir" class="block text-gray-700 text-sm font-medium mb-1">Tanggal Lahir
                            *</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" required
                            value="{{ old('tanggal_lahir') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('tanggal_lahir') border-red-500 @enderror">
                        @error('tanggal_lahir')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Jenis Kelamin & Agama -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="jenis_kelamin" class="block text-gray-700 text-sm font-medium mb-1">Jenis Kelamin
                            *</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('jenis_kelamin') border-red-500 @enderror">
                            <option value="">Pilih jenis kelamin</option>
                            <option value="L" {{ old('jenis_kelamin') === 'L' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="P" {{ old('jenis_kelamin') === 'P' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                        @error('jenis_kelamin')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="agama" class="block text-gray-700 text-sm font-medium mb-1">Agama *</label>
                        <select name="agama" id="agama" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('agama') border-red-500 @enderror">
                            <option value="">Pilih agama</option>
                            <option value="Islam" {{ old('agama') === 'Islam' ? 'selected' : '' }}>
                                Islam
                            </option>
                            <option value="Kristen" {{ old('agama') === 'Kristen' ? 'selected' : '' }}>
                                Kristen</option>
                            <option value="Katolik" {{ old('agama') === 'Katolik' ? 'selected' : '' }}>
                                Katolik</option>
                            <option value="Hindu" {{ old('agama') === 'Hindu' ? 'selected' : '' }}>
                                Hindu
                            </option>
                            <option value="Budha" {{ old('agama') === 'Budha' ? 'selected' : '' }}>
                                Budha
                            </option>
                            <option value="Konghucu" {{ old('agama') === 'Konghucu' ? 'selected' : '' }}>
                                Konghucu</option>
                        </select>
                        @error('agama')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Alamat -->
                <div class="mb-4">
                    <label for="alamat" class="block text-gray-700 text-sm font-medium mb-1">Alamat *</label>
                    <textarea name="alamat" id="alamat" rows="3" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('alamat') border-red-500 @enderror"
                        placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- No HP & Email -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="no_hp" class="block text-gray-700 text-sm font-medium mb-1">Nomor HP *</label>
                        <input type="text" name="no_hp" id="no_hp" required value="{{ old('no_hp') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('no_hp') border-red-500 @enderror"
                            placeholder="Masukkan nomor HP">
                        @error('no_hp')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 text-sm font-medium mb-1">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror"
                            placeholder="Masukkan email">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </fieldset>

            <!-- Data Sekolah -->
            <fieldset class="mb-6 p-4 border border-gray-200 rounded-md">
                <legend class="text-lg font-medium text-gray-700 px-2">Data Sekolah</legend>

                <!-- Asal Sekolah -->
                <div class="mb-4">
                    <label for="asal_sekolah" class="block text-gray-700 text-sm font-medium mb-1">Asal Sekolah *</label>
                    <input type="text" name="asal_sekolah" id="asal_sekolah" required
                        value="{{ old('asal_sekolah') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('asal_sekolah') border-red-500 @enderror"
                        placeholder="Masukkan nama sekolah asal">
                    @error('asal_sekolah')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tahun Lulus -->
                <div class="mb-4">
                    <label for="tahun_lulus" class="block text-gray-700 text-sm font-medium mb-1">Tahun Lulus *</label>
                    <input type="number" name="tahun_lulus" id="tahun_lulus" required min="1900"
                        max="{{ date('Y') + 1 }}" value="{{ old('tahun_lulus') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('tahun_lulus') border-red-500 @enderror"
                        placeholder="Masukkan tahun lulus">
                    @error('tahun_lulus')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nilai UN & Rapor -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="nilai_un" class="block text-gray-700 text-sm font-medium mb-1">Nilai UN</label>
                        <input type="number" step="0.01" name="nilai_un" id="nilai_un" min="0"
                            max="100" value="{{ old('nilai_un') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('nilai_un') border-red-500 @enderror"
                            placeholder="Masukkan nilai UN">
                        @error('nilai_un')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="nilai_raport" class="block text-gray-700 text-sm font-medium mb-1">Nilai Rapor</label>
                        <input type="number" step="0.01" name="nilai_raport" id="nilai_raport" min="0"
                            max="100" value="{{ old('nilai_raport') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('nilai_raport') border-red-500 @enderror"
                            placeholder="Masukkan nilai rapor rata-rata">
                        @error('nilai_raport')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </fieldset>

            <!-- Data Orang Tua -->
            <fieldset class="mb-6 p-4 border border-gray-200 rounded-md">
                <legend class="text-lg font-medium text-gray-700 px-2">Data Orang Tua</legend>

                <!-- Nama Ayah & Ibu -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="nama_ayah" class="block text-gray-700 text-sm font-medium mb-1">Nama Ayah *</label>
                        <input type="text" name="nama_ayah" id="nama_ayah" required value="{{ old('nama_ayah') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('nama_ayah') border-red-500 @enderror"
                            placeholder="Masukkan nama ayah">
                        @error('nama_ayah')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="nama_ibu" class="block text-gray-700 text-sm font-medium mb-1">Nama Ibu *</label>
                        <input type="text" name="nama_ibu" id="nama_ibu" required value="{{ old('nama_ibu') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('nama_ibu') border-red-500 @enderror"
                            placeholder="Masukkan nama ibu">
                        @error('nama_ibu')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Pekerjaan Ayah & Ibu -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="pekerjaan_ayah" class="block text-gray-700 text-sm font-medium mb-1">Pekerjaan Ayah
                            *</label>
                        <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" required
                            value="{{ old('pekerjaan_ayah') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('pekerjaan_ayah') border-red-500 @enderror"
                            placeholder="Masukkan pekerjaan ayah">
                        @error('pekerjaan_ayah')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="pekerjaan_ibu" class="block text-gray-700 text-sm font-medium mb-1">Pekerjaan Ibu
                            *</label>
                        <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" required
                            value="{{ old('pekerjaan_ibu') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('pekerjaan_ibu') border-red-500 @enderror"
                            placeholder="Masukkan pekerjaan ibu">
                        @error('pekerjaan_ibu')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </fieldset>

            <!-- Upload Dokumen -->
            <fieldset class="mb-6 p-4 border border-gray-200 rounded-md">
                <legend class="text-lg font-medium text-gray-700 px-2">Upload Dokumen</legend>
                <p class="text-sm text-gray-500 mb-4">* Kosongkan jika tidak ingin mengganti file</p>

                <!-- Foto 3x4 -->
                <div class="mb-4">
                    <label for="foto_file" class="block text-gray-700 text-sm font-medium mb-1">Foto 3×4 (Max 2MB)</label>
                    <div class="flex items-center justify-between">
                        <input type="file" name="foto_file" id="foto_file"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('foto_file') border-red-500 @enderror"
                            accept="image/jpeg,image/png">
                        <i class="las la-upload text-blue-500 text-xl ml-2 cursor-pointer"></i>
                    </div>
                </div>

                <!-- Kartu Keluarga -->
                <div class="mb-4">
                    <label for="kk_file" class="block text-gray-700 text-sm font-medium mb-1">Kartu Keluarga (PDF/JPG Max
                        5MB)</label>
                    <div class="flex items-center justify-between">
                        <input type="file" name="kk_file" id="kk_file"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('kk_file') border-red-500 @enderror"
                            accept="application/pdf,image/jpeg,image/png">
                        <i class="las la-upload text-blue-500 text-xl ml-2 cursor-pointer"></i>
                    </div>
                </div>

                <!-- Akta Lahir -->
                <div class="mb-4">
                    <label for="akta_file" class="block text-gray-700 text-sm font-medium mb-1">Akta Lahir (PDF/JPG Max
                        5MB)</label>
                    <div class="flex items-center justify-between">
                        <input type="file" name="akta_file" id="akta_file"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('akta_file') border-red-500 @enderror"
                            accept="application/pdf,image/jpeg,image/png">
                        <i class="las la-upload text-blue-500 text-xl ml-2 cursor-pointer"></i>
                    </div>
                </div>

                <!-- Ijazah SD/SKHUN -->
                <div class="mb-4">
                    <label for="ijazah_sd_file" class="block text-gray-700 text-sm font-medium mb-1">Ijazah SD/SKHUN
                        (PDF/JPG
                        Max 5MB)</label>
                    <div class="flex items-center justify-between">
                        <input type="file" name="ijazah_sd_file" id="ijazah_sd_file"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('ijazah_sd_file') border-red-500 @enderror"
                            accept="application/pdf,image/jpeg,image/png">
                        <i class="las la-upload text-blue-500 text-xl ml-2 cursor-pointer"></i>
                    </div>
                </div>

                <!-- Ijazah SMP -->
                <div class="mb-4">
                    <label for="ijazah_smp_file" class="block text-gray-700 text-sm font-medium mb-1">Ijazah SMP (PDF/JPG
                        Max
                        5MB)</label>
                    <div class="flex items-center justify-between">
                        <input type="file" name="ijazah_smp_file" id="ijazah_smp_file"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('ijazah_smp_file') border-red-500 @enderror"
                            accept="application/pdf,image/jpeg,image/png">
                        <i class="las la-upload text-blue-500 text-xl ml-2 cursor-pointer"></i>
                    </div>
                </div>

                <!-- Rapor -->
                <div class="mb-4">
                    <label for="rapor_file" class="block text-gray-700 text-sm font-medium mb-1">Rapor (PDF/JPG Max
                        5MB)</label>
                    <div class="flex items-center justify-between">
                        <input type="file" name="rapor_file" id="rapor_file"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('rapor_file') border-red-500 @enderror"
                            accept="application/pdf,image/jpeg,image/png">
                        <i class="las la-upload text-blue-500 text-xl ml-2 cursor-pointer"></i>
                    </div>
                </div>
            </fieldset>

            <!-- Upload Dokumen -->
            {{-- <div class="mb-4">
                <h2 class="text-lg font-medium mb-2">Upload Dokumen</h2>

                <!-- Foto 3x4 -->
                <div class="mb-2">
                    <label for="foto_file" class="block text-gray-700 text-sm font-medium mb-1">Foto 3×4</label>
                    <div class="flex items-center justify-between">
                        <input type="file" name="foto_file" id="foto_file"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('foto_file') border-red-500 @enderror">
                        <i class="las la-upload text-blue-500 text-xl ml-2 cursor-pointer"></i>
                    </div>
                    @error('foto_file')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kartu Keluarga -->
                <div class="mb-2">
                    <label for="kk_file" class="block text-gray-700 text-sm font-medium mb-1">Kartu Keluarga</label>
                    <div class="flex items-center justify-between">
                        <input type="file" name="kk_file" id="kk_file"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('kk_file') border-red-500 @enderror">
                        <i class="las la-upload text-blue-500 text-xl ml-2 cursor-pointer"></i>
                    </div>
                    @error('kk_file')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Akta Lahir -->
                <div class="mb-2">
                    <label for="akta_file" class="block text-gray-700 text-sm font-medium mb-1">Akta Lahir</label>
                    <div class="flex items-center justify-between">
                        <input type="file" name="akta_file" id="akta_file"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('akta_file') border-red-500 @enderror">
                        <i class="las la-upload text-blue-500 text-xl ml-2 cursor-pointer"></i>
                    </div>
                    @error('akta_file')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Ijazah SD/SKHUN -->
                <div class="mb-2">
                    <label for="ijazah_sd_file" class="block text-gray-700 text-sm font-medium mb-1">Ijazah
                        SD/SKHUN</label>
                    <div class="flex items-center justify-between">
                        <input type="file" name="ijazah_sd_file" id="ijazah_sd_file"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('ijazah_sd_file') border-red-500 @enderror">
                        <i class="las la-upload text-blue-500 text-xl ml-2 cursor-pointer"></i>
                    </div>
                    @error('ijazah_sd_file')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Ijazah SMP -->
                <div class="mb-2">
                    <label for="ijazah_smp_file" class="block text-gray-700 text-sm font-medium mb-1">Ijazah
                        SMP</label>
                    <div class="flex items-center justify-between">
                        <input type="file" name="ijazah_smp_file" id="ijazah_smp_file"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('ijazah_smp_file') border-red-500 @enderror">
                        <i class="las la-upload text-blue-500 text-xl ml-2 cursor-pointer"></i>
                    </div>
                    @error('ijazah_smp_file')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Rapor -->
                <div class="mb-2">
                    <label for="rapor_file" class="block text-gray-700 text-sm font-medium mb-1">Rapor</label>
                    <div class="flex items-center justify-between">
                        <input type="file" name="rapor_file" id="rapor_file"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('rapor_file') border-red-500 @enderror">
                        <i class="las la-upload text-blue-500 text-xl ml-2 cursor-pointer"></i>
                    </div>
                    @error('rapor_file')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div> --}}

            <!-- Tombol Kirim -->
            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md">
                Kirim Formulir
            </button>
        </form>
    </div>
@endsection
