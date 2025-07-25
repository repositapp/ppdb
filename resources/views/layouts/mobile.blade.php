<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB SMAN 2 BATAUGA</title>
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
    <nav class="bg-white shadow-sm py-3 px-4 flex justify-between items-center">
        <div class="flex items-center">
            <img src="{{ URL::asset('dist/img/images/logo/logo.png') }}" alt="Logo" class="w-6 h-8 mr-3">
            <span class="font-bold text-lg">PPDB SMAN 2 BATAUGA</span>
        </div>
        <i class="las la-bell text-xl text-gray-600"></i>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-6">
        @yield('content')
    </div>

    <!-- Bottom Navigation -->
    @include('layouts.mobile-navigation')

    <!-- JS -->
    @include('layouts.mobile-vendor-scripts')
</body>

</html>
