
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'SIFARA - Wetland Learning Platform')</title>

    <meta name="description"
          content="SIFARA merupakan media pembelajaran interaktif mengenai ekosistem lahan basah.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&family=Playfair+Display:wght@500;600;700&display=swap"
          rel="stylesheet">

    <!-- Bootstrap yang sudah digunakan proyek -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- SIFARA Design System -->
    <link rel="stylesheet" href="{{ asset('css/sifara.css') }}">

    <!-- Halaman dapat menambahkan CSS sendiri -->
    @stack('styles')
</head>

<body>

    @include('partials.navbar')

    <main>
        @hasSection('content')
            @yield('content')
        @else
            {{ $slot ?? '' }}
        @endif
    </main>

    @stack('scripts')

</body>
</html>
