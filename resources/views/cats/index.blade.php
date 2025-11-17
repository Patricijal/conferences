@extends('layouts.appdaisyui')

@section('content')
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
    @each('cats.partials.list', $cats, 'cat')
@endsection
