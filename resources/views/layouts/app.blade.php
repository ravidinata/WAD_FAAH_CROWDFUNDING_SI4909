<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Donasi Peduli</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container {{ $lebar ?? '' }}">
        <h1>WEB DONASI PEDULI</h1>
        <nav>
            <a href="{{ route('campaigns.index') }}">Daftar Campaign</a>
            @auth
                <a href="{{ route('campaigns.create') }}">+ Campaign Baru</a>
                <form action="{{ route('logout') }}" method="POST" style="display:inline">
                    @csrf
                    <button>Logout ({{ auth()->user()->name }})</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </nav>
        <hr>

        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>