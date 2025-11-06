@extends('layouts.app')

@section('content')
    <h2>List of articles</h2>
    @if(session('status'))
        <div style="background-color: green; color: lime;">{{ session('status') }}</div>
    @endif
    <a href="{{ route('articles.create') }}"><button type="button">Create article</button></a>
    @each('articles.partials.list', $articles, 'article')
@endsection
