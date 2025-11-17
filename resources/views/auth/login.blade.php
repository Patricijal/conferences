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

                            <fieldset class="fieldset mb-4" x-data="{ show: false }">
                                <legend class="fieldset-legend">Password</legend>
                                <div class="relative w-full">
                                    <input
                                        id="password"
                                        :type="show ? 'text' : 'password'"
                                        name="password"
                                        required autocomplete="current-password"
                                        class="input input-bordered w-full @error('password') input-error @enderror"
                                        placeholder="••••••••"
                                    >
                                    <!-- Toggle button -->
                                    <button type="button"
                                            @click="show = !show"
                                            class="absolute inset-y-0 right-2 flex items-center px-2">

                                        <!-- Show password -->
                                        <img x-show="!show"
                                             src="https://cdn-icons-png.flaticon.com/128/14070/14070523.png"
                                             alt="Show password" class="h-6 w-6" />

                                        <!-- Hide password -->
                                        <img x-show="show"
                                             src="https://cdn-icons-png.flaticon.com/128/9458/9458496.png"
                                             alt="Hide password" class="h-6 w-6" />
                                    </button>
                                </div>
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
