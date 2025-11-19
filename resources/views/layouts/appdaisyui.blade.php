<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="silk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col">
    <div id="app" class="flex flex-col min-h-screen">
        <div class="navbar bg-base-100 shadow-sm sticky top-0 z-50">
            <div class="navbar-start">
                <label class="swap swap-flip text-5xl">
                    <!-- this hidden checkbox controls the state -->
                    <input type="checkbox" />
                    <div class="swap-on">😺</div>
                    <div class="swap-off">😻</div>
                </label>
                <!-- Brand/Logo -->
                <a class="btn btn-ghost text-xl" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="navbar-center hidden lg:flex">
                <ul class="menu menu-horizontal px-1 flex gap-4">
                    <label class="swap swap-rotate" x-data="themeToggle()" x-init="init()">
                        <input type="checkbox" x-model="isDracula" class="theme-controller" />

                        <!-- sun icon -->
                        <svg
                            class="swap-off h-10 w-10 fill-current"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path
                                d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
                        </svg>

                        <!-- moon icon -->
                        <svg
                            class="swap-on h-10 w-10 fill-current"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path
                                d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
                        </svg>
                    </label>

                    <!-- Add your navigation items here if needed -->
                    <li>
                        <a class="btn btn-ghost text-xl" href="{{ route('cats.index') }}">
                            {{ __('app.navbar_browse') }}
                        </a>
                    </li>
                    @auth
                    <li>
                        <a class="btn btn-primary text-xl" href="{{ route('cats.create') }}">
                            {{ __('app.navbar_add') }}
                        </a>
                    </li>
                    @endauth
                </ul>
            </div>

            <!-- Desktop Authentication Links -->
            <div class="navbar-end hidden lg:flex">
                <ul class="menu menu-horizontal px-1 flex gap-4">
                    @guest
                        @if (Route::has('login'))
                            <li><a href="{{ route('login') }}" class="btn btn-ghost text-xl">
                                    {{ __('app.login_button') }}
                                </a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="btn btn-primary text-xl">
                                    {{ __('app.register_button') }}
                                </a>
                            </li>
                        @endif
                    @else
                        <div class="dropdown dropdown-end">
                            <div tabindex="0" role="button" class="btn btn-ghost rounded-btn text-xl">
                                {{ Auth::user()->name }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <ul tabindex="0" class="menu dropdown-content z-[1] p-2 shadow bg-base-100 rounded-box w-52 mt-4">
                                <li>
                                    <a class="text-xl" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                        {{ __('app.navbar_logout') }}
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

        <footer class="footer sm:footer-horizontal bg-base-200 text-base-content p-10 mt-auto">
            <nav>
                <h6 class="footer-title">Services</h6>
                <a class="link link-hover">Branding</a>
                <a class="link link-hover">Design</a>
                <a class="link link-hover">Marketing</a>
                <a class="link link-hover">Advertisement</a>
            </nav>
            <nav>
                <h6 class="footer-title">Company</h6>
                <a class="link link-hover">About us</a>
                <a class="link link-hover">Contact</a>
                <a class="link link-hover">Jobs</a>
                <a class="link link-hover">Press kit</a>
            </nav>
            <nav>
                <h6 class="footer-title">Legal</h6>
                <a class="link link-hover">Terms of use</a>
                <a class="link link-hover">Privacy policy</a>
                <a class="link link-hover">Cookie policy</a>
            </nav>
            <form>
                <h6 class="footer-title">Newsletter</h6>
                <fieldset class="w-80">
                    <label>Enter your email address</label>
                    <div class="join">
                        <input
                            type="text"
                            placeholder="username@site.com"
                            class="input input-bordered join-item" />
                        <button class="btn btn-primary join-item">Subscribe</button>
                    </div>
                </fieldset>
            </form>
        </footer>
    </div>
</body>
</html>

<script>
    function themeToggle() {
        return {
            isDracula: false,
            init() {
                // Load saved theme
                const saved = localStorage.getItem('theme') || 'light';
                this.isDracula = saved === 'dracula';
                document.documentElement.setAttribute('data-theme', saved);
                // Watch for changes
                this.$watch('isDracula', value => {
                    const newTheme = value ? 'dracula' : 'light';
                    document.documentElement.setAttribute('data-theme', newTheme);
                    localStorage.setItem('theme', newTheme);
                });
            }
        }
    }
</script>
