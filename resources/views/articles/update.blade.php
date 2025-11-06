@extends('layouts.app')

@section('title', 'Article Edit Form')

@section('content')
    <form action="{{ route('articles.update', ['article' => $article->id]) }}" method="POST">
        @csrf
        @method('PUT')
        @include('articles.partials.form')
        <div><input type="submit" value="Update"></div>
    </form>
@endsection
