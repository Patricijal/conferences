<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <div class="navbar bg-base-100 shadow-sm sticky top-0 z-50">
            <div class="navbar-start">
                <!-- Brand/Logo -->
                <a class="btn btn-ghost text-xl" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="navbar-center hidden lg:flex">
                <ul class="menu menu-horizontal px-1 flex gap-4">
                    <!-- Add your navigation items here if needed -->
                    <li>
                        <a class="btn btn-ghost text-xl" href="{{ route('cats.index') }}">Browse Cats</a>
                    </li>
                    <li>
                        <a class="btn btn-primary text-xl" href="{{ route('cats.create') }}">Add Cat</a>
                    </li>
                </ul>
            </div>

            <!-- Desktop Authentication Links -->
            <div class="navbar-end hidden lg:flex">
                <ul class="menu menu-horizontal px-1 flex gap-4">
                    @guest
                        @if (Route::has('login'))
                            <li><a href="{{ route('login') }}" class="btn btn-ghost text-xl">{{ __('Login') }}</a></li>
                        @endif
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="btn btn-primary text-xl">{{ __('Register') }}</a></li>
                        @endif
                    @else
                        <div class="dropdown dropdown-end">
                            <div tabindex="0" role="button" class="btn btn-ghost rounded-btn">
                                {{ Auth::user()->name }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <ul tabindex="0" class="menu dropdown-content z-[1] p-2 shadow bg-base-100 rounded-box w-52 mt-4">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </ul>
            </div>
        </div>
        <!-- Logout Form -->
        @auth
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endauth

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
