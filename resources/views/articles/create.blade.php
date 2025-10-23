@extends('layouts.app')

@section('title', 'Article Creation Form')

@section('content')
    <h4>Article creation form</h4>
    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <div>
            <label for="title-input">Title</label>
            <input id="title-input" type="text" name="title">
        </div>
        <div>
            <label for="content-input">Content</label>
            <textarea id="content-input" name="content"></textarea>
        </div>
        <br>
        <div>
            <input type="submit" value="Create">
        </div>
    </form>
@endsection
