<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('title', 'Noise Safe - Tenang di Tengah Kebisingan')</title>
    <meta name="description" content="@yield('meta_description', 'Earbud pintar pertama yang dirancang khusus untuk anak disabilitas sensorik dengan GPS real-time')">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
</head>
<body class="font-sans antialiased bg-white">
    
    <!-- Header/Navigation -->
    @include('partials.header')
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('partials.footer')
    
    @stack('scripts')
</body>
</html>