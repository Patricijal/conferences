@extends('layouts.app')

@section('title', 'Show Post')

@section('content')
        <h1>{{$post['title']}}</h1>
        <p>{{$post['content']}}</p>
@endsection
