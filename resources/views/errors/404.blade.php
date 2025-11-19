@extends('layouts.appdaisyui')

@section('title', '404 Not Found')

@section('content')
    <div class="hero min-h-screen relative">

        {{-- Background image + dark overlay --}}
        <div class="absolute inset-0">
            <img
                src="https://cdn.mos.cms.futurecdn.net/KHQb3Ny62YxXnCEon4mm43.jpg"   {{-- replace with any cat image --}}
            alt="Sad or lost cat background"
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-black/70"></div>
        </div>

        {{-- Center content --}}
        <div class="hero-content text-center text-white relative z-10">
            <div class="max-w-2xl">

                <h1 class="mb-6 text-6xl md:text-7xl font-extrabold">
                    404
                </h1>

                <h2 class="mb-4 text-3xl md:text-4xl font-bold">
                    Page Not Found
                </h2>

                <p class="mb-8 text-xl md:text-2xl leading-relaxed text-white/80">
                    Looks like this page wandered off…
                    much like a curious cat exploring places it shouldn’t.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ url('/') }}">
                        <button class="btn btn-secondary btn-wide btn-xl px-8">
                            Go Back Home
                        </button>
                    </a>

                    <a href="/contact">
                        <button class="btn btn-ghost text-white btn-wide btn-xl px-8">
                            Contact Support →
                        </button>
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection
