@extends('layouts.app')

@section('content')

<div class="flex content-right mr-20">
    <a href="{{ route('login') }}"><h2 class="grey">{{ __('Login') }}</h2></a>
    <a href="{{ route('register') }}"><h2 class="grey normal ml-11">{{ __('Register') }}</h2></a>
</div>

<h2 class="center grey">Login Form</h2>

<div class="entry-container">
    <div class="justify-content-center">

        <div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="flex">
                    <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>


                        <input id="email" type="email" class="card-inner w-full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                </div>
                        @error('email')
                            <span class="invalid-feedback ml-31.6%" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                <div class="flex mt-11">
                    <label for="password" class="form-label">{{ __('Password') }}</label>


                        <input id="password" type="password" class="card-inner w-full @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                </div>
                        @error('password')
                            <span class="invalid-feedback ml-31.6%" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                <div class="ml-31.6% mt-8">

                            <input class="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label grey" for="remember">
                                {{ __('Remember Me') }}
                            </label>

                </div>

                <div class="ml-31.6% mt-8">
                        <button type="submit" class="btn-login">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn-link ml-11" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                </div>

            </form>
        </div>

    </div>
</div>
@endsection
