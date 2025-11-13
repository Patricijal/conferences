@extends('layouts.appcustom')

@section('content')
    @if(session('status'))
        <div style="background-color: green; color: lime;">{{ session('status') }}</div>
    @endif

    <h1>{{ $article['title'] }}</h1>
    <p>{{ $article['content'] }}</p>
@endsection
