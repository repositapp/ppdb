@extends('layouts.mobile-login')

@section('title')
    Registrasi
@endsection

@section('content')
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-lg shadow-xl p-8">
                <!-- Logo -->
                <div class="flex items-center justify-center mb-6">
                    <img src="{{ URL::asset('dist/img/images/logo/logo.png') }}" alt="Logo Sekolah" class="w-16 h-25">
                </div>

                <!-- Header -->
                <h2 class="text-2xl font-bold text-center mb-2">Daftar Akun</h2>
                <p class="text-gray-600 text-center mb-6">PPDB SMAN 2 BATAUGA</p>

                <!-- Alert Messages -->
                @if (session('error'))
                    <div class="mb-4 bg-red-50 text-red-700 p-3 rounded-md">
                        <i class="las la-exclamation-circle mr-2"></i>
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="mb-4 bg-green-50 text-green-700 p-3 rounded-md">
                        <i class="las la-check-circle mr-2"></i>
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Form -->
                <form method="POST" action="{{ route('user.register.post') }}" id="registerForm">
                    @csrf

                    <!-- Nama -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="name" id="name" placeholder="Nama Lengkap"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror"
                            value="{{ old('name') }}" required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" id="email" placeholder="Alamat Email"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror"
                            value="{{ old('email') }}" required>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Username -->
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                        <input type="text" name="username" id="username" placeholder="Username"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('username') border-red-500 @enderror"
                            value="{{ old('username') }}" required>
                        @error('username')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <div class="relative">
                            <input type="password" name="password" id="password" placeholder="Password"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('password') border-red-500 @enderror"
                                required>
                            <i class="las la-eye absolute right-4 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500 hover:text-gray-700"
                                id="togglePassword"></i>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="btn-submit w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md transition duration-300 mb-4">
                        <span class="btn-text">Daftar Sekarang</span>
                        <span class="btn-spinner">
                            <i class="las la-spinner la-spin"></i> Memproses...
                        </span>
                    </button>
                </form>

                <!-- Login Link -->
                <div class="text-center">
                    <p class="text-gray-600">
                        Sudah punya akun?
                        <a href="{{ route('user.login') }}" class="text-blue-500 hover:text-blue-700 font-medium">Masuk</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- JavaScript for Spinner -->
        <script>
            // Toggle Password
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');

            if (togglePassword && passwordInput) {
                togglePassword.addEventListener('click', function() {
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        togglePassword.classList.remove('la-eye');
                        togglePassword.classList.add('la-eye-slash');
                    } else {
                        passwordInput.type = 'password';
                        togglePassword.classList.remove('la-eye-slash');
                        togglePassword.classList.add('la-eye');
                    }
                });
            }

            // Form Submit with Spinner
            const registerForm = document.getElementById('registerForm');
            if (registerForm) {
                registerForm.addEventListener('submit', function() {
                    showSpinner('registerForm');
                });
            }
        </script>
    </div>
@endsection
