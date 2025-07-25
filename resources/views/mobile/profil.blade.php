@extends('layouts.mobile')
@section('title')
    Profil
@endsection
@section('content')
    <!-- Profil User -->
    <div class="max-w-md mx-auto my-8 p-6 bg-white rounded-lg shadow-md">
        <!-- Foto Profil -->
        <div class="flex flex-col items-center mb-4">
            <div class="w-24 h-24 bg-gray-200 rounded-full overflow-hidden">
                <img src="@if (Auth::user()->avatar != '') {{ asset('storage/' . Auth::user()->avatar) }}@else{{ URL::asset('build/dist/img/user2-160x160.jpg') }} @endif"
                    alt="Foto Profil" class="w-full h-full object-cover rounded-full">
            </div>
            <h2 class="text-2xl font-bold mt-2">{{ Auth::user()->name }}</h2>
            <p class="text-gray-600">Email: {{ Auth::user()->email }}</p>
            <div class="mt-2">
                <span
                    class="bg-blue-100 text-blue-500 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-200 dark:text-blue-800">
                    Akun Aktif
                </span>
            </div>
        </div>

        <!-- Menu Profil -->
        <ul class="divide-y divide-gray-200">
            <!-- Edit Data Pribadi -->
            <li class="py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <div class="mr-4">
                        <i class="las la-file-alt text-xl text-blue-500"></i>
                    </div>
                    <div>
                        <h3 class="text-base font-medium text-gray-700">Edit Data Pribadi</h3>
                        <p class="text-sm text-gray-500">Ubah informasi data diri</p>
                    </div>
                </div>
                <div>
                    <i class="las la-angle-right text-gray-400"></i>
                </div>
            </li>

            <!-- Edit Berkas -->
            <li class="py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <div class="mr-4">
                        <i class="las la-image text-xl text-blue-500"></i>
                    </div>
                    <div>
                        <h3 class="text-base font-medium text-gray-700">Edit Berkas</h3>
                        <p class="text-sm text-gray-500">Kelola dokumen pendaftaran</p>
                    </div>
                </div>
                <div>
                    <i class="las la-angle-right text-gray-400"></i>
                </div>
            </li>

            <!-- Keluar -->
            <a href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <li class="py-4 flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="mr-4">
                            <i class="las la-sign-out-alt text-xl text-blue-500"></i>
                        </div>
                        <div>
                            <h3 class="text-base font-medium text-gray-700">Keluar</h3>
                            <p class="text-sm text-gray-500">Keluar dari aplikasi</p>
                        </div>
                    </div>
                    <div>
                        <i class="las la-angle-right text-gray-400"></i>
                    </div>
                </li>
            </a>
            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </div>
@endsection
