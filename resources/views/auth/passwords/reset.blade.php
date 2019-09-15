@extends('layouts.app')

@section('content')

<div class="flex content-right mr-20">
    <a href="{{ route('login') }}"><H2 class="grey normal">{{ __('Login') }}</H2></a>
    <a href="{{ route('register') }}"><H2 class="grey normal ml-11">{{ __('Register') }}</H2></a>
</div>

<h2 class="center grey">Password Reset Form</h2>

<div class="entry-container">
    <div class="justify-content-center">

            <div>

                <div>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="flex">
                            <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="card-inner w-full @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="flex mt-11">
                            <label for="password" class="form-label">{{ __('Password') }}</label>

                            <input id="password" type="password" class="card-inner w-full @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="flex mt-11">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" type="password" class="card-inner w-full" name="password_confirmation" required autocomplete="new-password">

                        </div>

                        <div class="ml-31.6% mt-11">

                                <button type="submit" class="btn-login">
                                    {{ __('Reset Password') }}
                                </button>

                        </div>
                    </form>
                </div>
            </div>

    </div>
</div>
@endsection
