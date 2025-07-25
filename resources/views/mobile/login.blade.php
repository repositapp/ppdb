@extends('layouts.mobile-login')

@section('title')
    Login
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
                <h2 class="text-2xl font-bold text-center mb-2">Selamat Datang</h2>
                <p class="text-gray-600 text-center mb-6">Silakan masuk ke akun Anda</p>

                <!-- Alert Messages -->
                @if (session('loginError'))
                    <div class="mb-4 bg-red-50 text-red-700 p-3 rounded-md">
                        <i class="las la-exclamation-circle mr-2"></i>
                        {{ session('loginError') }}
                    </div>
                @endif

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
                <form method="POST" action="{{ route('user.authentication') }}" id="userLoginForm">
                    @csrf

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
                        <span class="btn-text">Masuk</span>
                        <span class="btn-spinner">
                            <i class="las la-spinner la-spin"></i> Memproses...
                        </span>
                    </button>
                </form>

                <!-- Register Link -->
                <div class="text-center">
                    <p class="text-gray-600">
                        Belum punya akun?
                        <a href="{{ route('user.register') }}" class="text-blue-500 hover:text-blue-700 font-medium">Daftar
                            Sekarang</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- JavaScript for Toggle Password & Spinner -->
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
            const userLoginForm = document.getElementById('userLoginForm');
            if (userLoginForm) {
                userLoginForm.addEventListener('submit', function() {
                    showSpinner('userLoginForm');
                });
            }
        </script>
    </div>
@endsection
