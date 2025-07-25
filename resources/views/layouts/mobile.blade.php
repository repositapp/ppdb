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
            <a href="javascript:void();"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="las la-sign-out-alt text-xl text-gray-600"></i>
            </a>
            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
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
