@extends('layouts.appdaisyui')

@section('name', 'Cat Form')

@section('content')
    <div class="flex justify-center">
        <form action="{{ route('cats.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('cats.partials.form')
            <div class="mt-6">
                <button class="btn btn-primary w-full" type="submit">Create</button>
            </div>
        </form>
    </div>
@endsection
