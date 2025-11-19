@extends('layouts.appdaisyui')

@section('name', 'Cat Edit Form')

@section('content')
    <div class="flex flex-col items-center">
        <form action="{{ route('cats.update', ['cat' => $cat->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('cats.partials.form')
            <div class="mt-6">
                <input type="submit" class="btn btn-primary w-full" value="{{ __('app.update_button') }}" id="submit-btn">
            </div>
        </form>

        <dialog id="image-modal" class="modal">
            <div class="modal-box p-0 bg-transparent shadow-none max-w-none w-auto">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 bg-base-100/80 backdrop-blur-sm">✕</button>
                </form>
                <img
                    id="modal-image"
                    src="#"
                    alt="Full size preview"
                    class="max-w-[90vw] max-h-[90vh] object-contain rounded-lg"
                />
            </div>
            <form method="dialog" class="modal-backdrop bg-black/70">
                <button>close</button>
            </form>
        </dialog>
    </div>
@endsection
