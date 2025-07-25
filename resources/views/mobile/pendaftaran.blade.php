@extends('layouts.mobile')
@section('title')
    Pendaftaran
@endsection
@section('content')
    <!-- Pendaftaran Section -->
    <h2 class="text-xl font-bold mb-4">Status Pendaftaran</h2>

    @if (session('success'))
        <div id="alert" class="mb-4 p-4 bg-green-50 text-green-700 rounded-md">
            <i class="las la-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    @if ($calonSiswa)
        <!-- Tampilkan status pendaftaran -->
        <a href="{{ route('pendaftaran.detail', $calonSiswa->id) }}">
            <div class="p-4 bg-white rounded-lg shadow-md">
                <div class="flex items-start">
                    <div>
                        <h2 class="text-xl font-medium mb-1">No. Pendaftaran:</h2>
                        <p class="text-gray-600">{{ $calonSiswa->no_pendaftaran }}</p>
                    </div>
                    <div class="ml-auto">
                        @if ($calonSiswa->status == 'pending')
                            <span
                                class="bg-yellow-200 text-yellow-800 text-xs font-medium inline-flex items-center px-3 py-1 rounded-full">
                                Menunggu Verifikasi
                            </span>
                        @elseif ($calonSiswa->status == 'diterima')
                            <span
                                class="bg-green-200 text-green-800 text-xs font-medium inline-flex items-center px-3 py-1 rounded-full">
                                Diterima
                            </span>
                        @else
                            <span
                                class="bg-red-200 text-red-800 text-xs font-medium inline-flex items-center px-3 py-1 rounded-full">
                                Ditolak
                            </span>
                        @endif
                    </div>
                </div>

                <div class="mt-4">
                    <div class="flex items-center">
                        <div class="mr-4">
                            <i class="las la-check-circle text-green-500 text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-medium mb-1">Pendaftaran</h2>
                            <p class="text-gray-600">{{ $calonSiswa->created_at->format('d M Y') }}</p>
                        </div>
                    </div>

                    <div class="flex items-center mt-4">
                        @if ($calonSiswa->status == 'pending')
                            <div class="mr-4">
                                <i class="las la-hourglass-half text-yellow-500 text-xl"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-medium mb-1">Verifikasi</h2>
                                <p class="text-gray-600">Menunggu</p>
                            </div>
                        @elseif ($calonSiswa->status == 'diterima')
                            <div class="mr-4">
                                <i class="las la-hourglass-half text-green-500 text-xl"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-medium mb-1">Verifikasi</h2>
                                <p class="text-gray-600">Diterima</p>
                            </div>
                        @else
                            <div class="mr-4">
                                <i class="las la-hourglass-half text-red-500 text-xl"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-medium mb-1">Verifikasi</h2>
                                <p class="text-gray-600">Ditolah</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </a>
    @else
        <!-- Pesan jika calon siswa belum mendaftar -->
        <div class="p-4 bg-white rounded-lg shadow-md">
            <p class="text-gray-600">Anda belum melakukan pendaftaran.</p>
            <div class="mt-4">
                <a href="{{ route('pendaftaran.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-md">
                    <i class="las la-plus mr-2"></i>
                    Buat Pendaftaran Baru
                </a>
            </div>
        </div>
    @endif
@endsection
@push('script')
    <script>
        $(function() {
            // Auto hide alert setelah 5 detik
            const alert = document.getElementById("alert");
            setTimeout(function() {
                alert.fadeOut('slow');
            }, 5000);
        });
    </script>
@endpush
