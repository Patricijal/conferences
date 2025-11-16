@extends('layouts.appdaisyui')

@section('content')
    <h1>{{ $cat['name'] }}</h1>
    <h2>{{ $cat['breed'] }}</h2>
    <h3>{{ $cat['age'] }}</h3>
    <h3>{{ $cat['gender'] }}</h3>
    <h4>{{ $cat['description'] }}</h4>
    <img src="{{ asset('cat-images/' . $cat['image_path']) }}"
         alt="{{ $cat['name'] }}"
         height="300">
@endsection
