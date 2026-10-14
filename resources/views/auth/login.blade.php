@extends('partials.layout')
@section('content')
    <div class="container mx-auto">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="card bg-base-300 shadow-sm w-2/3 mx-auto p-3">
            @csrf

            <!-- Email Address -->
            <fieldset class="fieldset">
                <legend class="fieldset-legend">@lang('Email')</legend>
                <input name="email" value="{{ old('email') }}" type="email"
                    class="input w-full @error('email') input-error @enderror" required autocomplete="username" />
                @error('email')
                    <p class="label text-error">{{ $message }}</p>
                @enderror
            </fieldset>

            <!-- Password -->
            <fieldset class="fieldset">
                <legend class="fieldset-legend">@lang('Password')</legend>
                <input name="password" type="password" class="input w-full @error('password') input-error @enderror"
                    required autocomplete="current-password" />
                @error('password')
                    <p class="label text-error">{{ $message }}</p>
                @enderror
            </fieldset>

            <!-- Remember Me -->
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Login options</legend>
                <label class="label">
                    <input name="remember" type="checkbox" checked="checked" class="checkbox" />
                    @lang('Remember me')
                </label>
            </fieldset>
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="btn btn-link"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button class="btn btn-primary">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </div>
@endsection
