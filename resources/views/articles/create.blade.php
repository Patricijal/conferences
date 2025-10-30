@extends('layouts.app')

@section('title', 'Article Creation Form')

@section('content')
    <h4>Article creation form</h4>
    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <div>
            <label for="title-input">Title</label>
            <input id="title-input" type="text" name="title" value="{{old('title')}}">
            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="content-input">Content</label>
            <textarea id="content-input" name="content">{{ old('content') }}</textarea>
            @error('content')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <br>
        <div>
            <input type="submit" value="Create">
            <button type="submit">{{ __('app.article.create_button') }}</button>
        </div>
    </form>
@endsection
