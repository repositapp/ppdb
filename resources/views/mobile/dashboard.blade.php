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
        <div
            class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center text-center hover:shadow-lg transition-shadow">
            <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white mb-3">
                <i class="las la-file-alt text-xl"></i>
            </div>
            <h3 class="font-bold text-lg mb-2">Pendaftaran Online</h3>
            <p class="text-gray-600 text-sm">Daftar sebagai siswa baru</p>
        </div>

        <!-- Card 2 -->
        <div
            class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center text-center hover:shadow-lg transition-shadow">
            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white mb-3">
                <i class="las la-check-circle text-xl"></i>
            </div>
            <h3 class="font-bold text-lg mb-2">Cek Status</h3>
            <p class="text-gray-600 text-sm">Lihat status pendaftaran</p>
        </div>

        <!-- Card 3 -->
        <div
            class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center text-center hover:shadow-lg transition-shadow">
            <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center text-white mb-3">
                <i class="las la-info-circle text-xl"></i>
            </div>
            <h3 class="font-bold text-lg mb-2">Info PPDB</h3>
            <p class="text-gray-600 text-sm">Informasi terkini</p>
        </div>

        <!-- Card 4 -->
        <div
            class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center text-center hover:shadow-lg transition-shadow">
            <div class="w-12 h-12 bg-purple rounded-full flex items-center justify-center text-white mb-3">
                <i class="las la-bell text-xl"></i>
            </div>
            <h3 class="font-bold text-lg mb-2">Notifikasi</h3>
            <p class="text-gray-600 text-sm">Pemberitahuan penting</p>
        </div>
    </div>

    <!-- Informasi PPDB Section -->
    <h2 class="text-xl font-bold mb-4">Informasi PPDB</h2>

    <!-- Info Cards -->
    <div class="space-y-4 mb-20">
        <!-- Info 1 -->
        <div class="bg-gray-100 rounded-lg p-4 border-l-4 border-blue-500">
            <div class="flex items-center mb-2">
                <i class="las la-calendar-alt text-gray-600 text-xl mr-2"></i>
                <span class="font-bold">Jadwal Tes Seleksi</span>
            </div>
            <p class="text-gray-700 font-medium">5 Februari 2024</p>
            <p class="text-gray-600 text-sm">Tes akan dilaksanakan secara online</p>
        </div>

        <!-- Info 2 -->
        <div class="bg-gray-100 rounded-lg p-4 border-l-4 border-green-500">
            <div class="flex items-center mb-2">
                <i class="las la-calendar-check text-gray-600 text-xl mr-2"></i>
                <span class="font-bold">Pengumuman Hasil</span>
            </div>
            <p class="text-gray-700 font-medium">15 Februari 2024</p>
            <p class="text-gray-600 text-sm">Cek status pendaftaran Anda</p>
        </div>

        <!-- Info 3 -->
        <div class="bg-gray-100 rounded-lg p-4 border-l-4 border-yellow-500">
            <div class="flex items-center mb-2">
                <i class="las la-clipboard-list text-gray-600 text-xl mr-2"></i>
                <span class="font-bold">Daftar Ulang</span>
            </div>
            <p class="text-gray-700 font-medium">20-25 Februari 2024</p>
            <p class="text-gray-600 text-sm">Bagi siswa yang diterima</p>
        </div>
    </div>
@endsection
