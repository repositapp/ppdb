<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{ $aplikasi->title_header }}</title>
    <link rel="icon" href="{{ URL::asset('build/dist/img/favicon.ico') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="{{ URL::asset('dist/css/login.css') }}" rel="stylesheet">
</head>

<body>
    @yield('content')

    <script>
        // Fungsi untuk menampilkan spinner pada tombol submit
        function showSpinner(formId) {
            const form = document.getElementById(formId);
            const submitButton = form.querySelector('button[type="submit"]');

            if (submitButton) {
                submitButton.classList.add('loading');
                submitButton.disabled = true;
            }
        }

        // Fungsi untuk menyembunyikan spinner (jika diperlukan)
        function hideSpinner(formId) {
            const form = document.getElementById(formId);
            const submitButton = form.querySelector('button[type="submit"]');

            if (submitButton) {
                submitButton.classList.remove('loading');
                submitButton.disabled = false;
            }
        }
    </script>
</body>

</html>
