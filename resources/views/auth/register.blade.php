@extends('partials.layout')
@section('content')
<div class="container mx-auto">
    
    <form method="POST" action="{{ route('register') }}" class="card bg-base-300 shadow-sm w-2/3 mx-auto p-3">
        @csrf
        
        <!-- Name -->
        <fieldset class="fieldset">
                <legend class="fieldset-legend">@lang('Name')</legend>
                <input name="name" value="{{ old('name') }}" type="text" class="input w-full @error('name') input-error @enderror" required autofocus autocomplete="name" />
                @error('name')
                    <p class="label text-error">{{$message}}</p>
                @enderror
        </fieldset>
        

        <!-- Email Address -->
        <fieldset class="fieldset">
                <legend class="fieldset-legend">@lang('Email')</legend>
                <input name="email" value="{{ old('email') }}" type="email" class="input w-full @error('email') input-error @enderror" required autocomplete="username" />
                @error('email')
                    <p class="label text-error">{{$message}}</p>
                @enderror
        </fieldset>

        <!-- Password -->
        <fieldset class="fieldset">
                <legend class="fieldset-legend">@lang('Password')</legend>
                <input name="password" type="password" class="input w-full @error('password') input-error @enderror" required autocomplete="new-password" />
                @error('password')
                    <p class="label text-error">{{$message}}</p>
                @enderror
        </fieldset>
      
        <!-- Confirm Password -->
        <fieldset class="fieldset">
                <legend class="fieldset-legend">@lang('Confirm Password')</legend>
                <input name="password_confirmation" type="password" class="input w-full @error('password_confirmation') input-error @enderror" required autocomplete="new-password" />
                @error('password_confirmation')
                    <p class="label text-error">{{$message}}</p>
                @enderror
        </fieldset>
       
        <div class="flex items-center justify-end mt-4">
            <a class="btn btn-link" href="{{ route('login') }}">
                @lang('Already registered?')
            </a>

            <button class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</div>
@endsection
