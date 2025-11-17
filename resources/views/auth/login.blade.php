@extends('layouts.appdaisyui')

@section('content')
    <div class="container mx-auto w-full max-w-md px-4">
        <div class="row justify-center">
            <div class="col-md-8">
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title text-2xl mb-4">Login</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <fieldset class="fieldset mb-4">
                                <legend class="fieldset-legend">Email Address</legend>
                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required autocomplete="email" autofocus
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
                                    required autocomplete="current-password"
                                    class="input input-bordered w-full @error('password') input-error @enderror"
                                    placeholder="••••••••"
                                >
                                @error('password')
                                <p class="text-error mt-1">{{ $message }}</p>
                                @enderror
                            </fieldset>

                            <div class="form-control mb-4">
                                <label class="label cursor-pointer">
                                    <input type="checkbox" name="remember" id="remember" class="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="label-text ml-2">Remember Me</span>
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary w-full">Login</button>

                            @if (Route::has('password.request'))
                                <a class="link link-primary mt-4 block text-center" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
