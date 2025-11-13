@extends('layouts.appcustom')

@section('title', 'Show Post')

@section('content')
    <h1>{{$post['title']}}</h1>
    <p>Author: {{"{$author['name']}, {$author['surname']}"}}</p>
@endsection
