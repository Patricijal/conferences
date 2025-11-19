@extends('layouts.appdaisyui')

@section('content')
    <div class="hero min-h-screen relative">
        <div class="absolute inset-0">
            <img
                src="https://static.scientificamerican.com/dam/m/16dc65f99004b20c/original/Birman-cat.jpg?m=1759528486.08"
                alt="Beautiful Birman cat"
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <div class="hero-content text-center text-white relative z-10">
            <div class="max-w-2xl">
                <h1 class="mb-6 text-5xl md:text-7xl font-bold">Welcome</h1>

                <p class="mb-6 text-xl md:text-2xl leading-relaxed">
                    {{ __('app.home_text') }}
                </p>
                @auth
                <div class="mb-8">
                    <p class="text-lg md:text-xl font-semibold">
                        {{ __('You are logged in!') }}
                    </p>
                </div>
                @endauth
                <a href="{{ route('cats.index') }}">
                    <button class="btn btn-accent btn-xl px-8">Get Started</button>
                </a>
            </div>
        </div>
    </div>
@endsection
