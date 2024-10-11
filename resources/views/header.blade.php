<header class="header">
    <h1>Admin Panel</h1>
    <div class="user-info">
        {{-- <span>Welcome, {{ Auth::user()->name }}</span> --}}
        <a href="{{ route('logout') }}">Logout</a>
    </div>
</header>