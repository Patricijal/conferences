@extends('layouts.appdaisyui')

@section('content')
    <div class="container mx-auto w-full max-w-md px-4">
        <div class="row justify-center">
            <div class="col-md-8">
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title text-2xl mb-4">Register</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <fieldset class="fieldset mb-4">
                                <legend class="fieldset-legend">Full Name</legend>
                                <input
                                    id="name"
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    required autocomplete="name" autofocus
                                    class="input input-bordered w-full @error('name') input-error @enderror"
                                    placeholder="John Doe"
                                >
                                @error('name')
                                <p class="text-error mt-1">{{ $message }}</p>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset mb-4">
                                <legend class="fieldset-legend">Email Address</legend>
                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required autocomplete="email"
                                    class="input input-bordered w-full @error('email') input-error @enderror"
                                    placeholder="you@example.com"
                                >
                                @error('email')
                                <p class="text-error mt-1">{{ $message }}</p>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset mb-4">
                                <legend class="fieldset-legend">Password</legend>
                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password"
                                    class="input input-bordered w-full @error('password') input-error @enderror"
                                    placeholder="••••••••"
                                >
                                @error('password')
                                <p class="text-error mt-1">{{ $message }}</p>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset mb-6">
                                <legend class="fieldset-legend">Confirm Password</legend>
                                <input
                                    id="password-confirm"
                                    type="password"
                                    name="password_confirmation"
                                    required autocomplete="new-password"
                                    class="input input-bordered w-full"
                                    placeholder="••••••••"
                                >
                            </fieldset>

                            <button type="submit" class="btn btn-primary w-full mb-4">Register</button>

                            <a class="link link-primary block text-center" href="{{ route('login') }}">
                                Already have an account? Login here
                            </a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
