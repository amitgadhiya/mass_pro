<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel')</title>

    <!-- Include your CSS files here -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @stack('styles')
</head>
<body>
    <!-- Admin Sidebar -->
    <div class="sidebar">
        @include('sidebar')
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Admin Header -->
        <header class="header">
            @include('header')
        </header>

        <!-- Content Section -->
        <section class="content">
            @yield('content')
        </section>

        <!-- Footer Section -->
        <footer class="footer">
            @include('footer')
        </footer>
    </div>

    <!-- Include your JS files here -->
    <script src="{{ asset('js/admin.js') }}"></script>
    @stack('scripts')
</body>
</html>