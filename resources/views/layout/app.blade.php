<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bikipost</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <nav class="mb-3 p-3 bg-white flex justify-between">
        <ul class="flex items-center">
            <li class="p-3"><a href="{{ route('home') }}">Home</a></li>
            <li class="p-3"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="p-3">Posts</li>
        </ul>
        
        <ul class="flex items-center">
            @auth
                <li class="p-3">{{ auth()->user()->name }}</li>

                <form action="{{ route('logout') }}" method="post" class="inline p-3">
                    @csrf

                    <button type="submit">Logout</button>
                </form>
            @endauth

            @guest
                <li class="p-3"><a href="{{ route('login') }}">Login</a></li>
                <li class="p-3"><a href="{{ route('register') }}">Register</a></li>
            @endguest
        </ul>
    </nav>
    @yield('content')
</body>
</html>