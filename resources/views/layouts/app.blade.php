<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Layouts</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-200">
    <nav class="flex bg-white py-3 mb-6 justify-between">
        <ul class="flex items-center">
            <li><a href="/" class="p-3">Home</a></li>
            <li><a href="{{ route('dashboard') }}" class="p-3">Dashboard</a></li>
            <li><a href="{{ route('posts') }}" class="p-3">Post</a></li>
        </ul>
        @if(auth()->check())
        <ul class="flex items-center">
            <li><a href="" class="p-3">{{ auth()->user()->name }}</a></li>

            <li>
                <form action="{{ route('logout')}}" method="POST" class="inline">
                    @csrf 
                    <button type="submit" class="pr-3">Logout</button>
                </form>
            </li>

        </ul>
        @else
        <ul class="flex items-center">
            <li><a href="{{ route('login') }}" class="p-3">Login</a></li>
            <li><a href="/register" class="p-3">Register</a></li>
        </ul>

        @endif
    </nav>
    @yield('content')
</body>
</html>
