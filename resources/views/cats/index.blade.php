@extends('layouts.appdaisyui')

@section('content')
    <h2>List of cats</h2>
    @if(session('status'))
        <div style="background-color: green; color: lime;">{{ session('status') }}</div>
    @endif
    <a href="{{ route('cats.create') }}">
        <button type="button">Add cat</button>
    </a>
    @each('cats.partials.list', $cats, 'cat')
@endsection
