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
                    Felines are fascinating creatures known for their agility and independent nature.
                    With over 40 recognized breeds, cats display incredible diversity in size, coat, and personality.
                    These graceful hunters have been cherished human companions for thousands of years.
                </p>

                @if (session('status'))
                    <div class="alert alert-success mb-6 max-w-md mx-auto" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif
                <div class="mb-8">
                    <p class="text-lg md:text-xl font-semibold">
                        {{ __('You are logged in!') }}
                    </p>
                </div>
                <a href="{{ route('cats.index') }}">
                    <button class="btn btn-accent btn-xl px-8">Get Started</button>
                </a>
            </div>
        </div>
    </div>
@endsection
