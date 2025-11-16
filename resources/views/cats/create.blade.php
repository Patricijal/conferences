@extends('layouts.appdaisyui')

@section('name', 'Cat Form')

@section('content')
    <form action="{{ route('cats.store') }}" method="POST">
        @csrf
        @include('cats.partials.form')
{{--        <div><input type="submit" value="Create"></div>--}}
        <div><button class="btn btn-primary" type="submit">Create</button></div>
    </form>
@endsection
