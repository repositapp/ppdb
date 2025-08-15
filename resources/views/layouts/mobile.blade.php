<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{ $aplikasi->title_header }}</title>
    <link rel="icon" href="{{ URL::asset('build/dist/img/favicon.ico') }}" type="image/x-icon">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Line Awesome -->
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'purple': '#8b5cf6',
                    }
                }
            }
        }
    </script>
</head>

<body class="font-sans bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-sm py-3 px-4 flex justify-between items-center fixed top-0 left-0 right-0 z-50">
        @if (Request::is('mobile/dashboard', 'mobile/pendaftaran', 'mobile/pengumuman', 'mobile/profil'))
            <div class="flex items-center">
                <img src="{{ URL::asset('dist/img/images/logo/logo.png') }}" alt="Logo" class="w-6 h-8 mr-3">
                <span class="font-bold text-lg">PPDB SMAN 2 BATAUGA</span>
            </div>
            <div class="flex items-center space-x-4">
                <!-- Ikon Notifikasi Chat -->
                <a href="{{ route('user.chat.index') }}" class="relative text-gray-600 hover:text-blue-500">
                    <i class="las la-bell text-xl"></i>
                    <!-- Tampilkan badge hanya jika ada pesan -->
                    @if (isset($mobileUnreadChatCount) && $mobileUnreadChatCount > 0)
                        <span
                            class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                            {{ $mobileUnreadChatCount }}
                        </span>
                    @endif
                </a>

                <!-- Ikon Logout -->
                <a href="javascript:void();"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="text-gray-600 hover:text-red-500">
                    <i class="las la-sign-out-alt text-xl"></i>
                </a>
                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        @elseif (Request::is('mobile/prestasi', 'mobile/jalur', 'mobile/chat'))
            <div class="flex items-center content-center">
                <a href="{{ route('dashboard') }}">
                    <i class="las la-angle-left font-bold text-xl text-gray-600 mr-5"></i>
                </a>
                <span class="font-bold text-lg">@yield('title')</span>
            </div>
        @else
            <div class="flex items-center content-center">
                <a href="{{ redirect()->back()->getTargetUrl() }}">
                    <i class="las la-angle-left font-bold text-xl text-gray-600 mr-5"></i>
                </a>
                <span class="font-bold text-lg">@yield('title')</span>
            </div>
        @endif
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 pt-20 pb-20">
        @yield('content')
    </div>

    <!-- Bottom Navigation -->
    @if (Request::is('mobile/dashboard', 'mobile/pendaftaran', 'mobile/pengumuman', 'mobile/profil'))
        @include('layouts.mobile-navigation')
    @endif

    <!-- JS -->
    @include('layouts.mobile-vendor-scripts')
</body>

</html>
