@extends('layouts.appdaisyui')

@section('content')
    @if(session('status'))
        <div style="background-color: green; color: lime;">{{ session('status') }}</div>
    @endif
    @each('cats.partials.list', $cats, 'cat')
@endsection
