@extends('layouts.appdaisyui')

@section('content')
    <div class="flex flex-col items-center">
    @if(session('status'))
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 3000)"
            x-show="show"
            x-transition
            role="alert"
            class="alert alert-success"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('status') }}</span>
        </div>
    @endif
        <div class="card bg-base-100 w-180 shadow-xl">
            <div class="card-body">
                <h1 class="text-3xl font-bold">{{ $cat['name'] }}</h1>
                <h2 class="text-base opacity-70">{{ $cat['breed'] }}</h2>
                <h2 class="text-base opacity-70">Age: {{ $cat['age'] }}</h2>
                <h2 class="text-base opacity-70">{{ $cat['gender'] }}</h2>
                <p class="text-lg">{{ $cat['description'] }}</p>
                <img class="rounded-xl mt-4"
                     src="{{ asset('cat-images/' . $cat['image_path']) }}" />
                <div class="card-actions justify-start mt-4">
                    <a href="{{ route('cats.index') }}">
                        <button class="btn btn-outline btn-accent">Back To Cats</button>
                    </a>
                    @auth
                    <!-- Edit button -->
                    <a href="{{ route('cats.edit', ['cat' => $cat['id']]) }}">
                        <button type="button" class="btn btn-outline btn-info">Edit</button>
                    </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
