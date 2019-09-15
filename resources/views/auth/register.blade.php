@extends('layouts.app')

@section('content')

<div class="flex content-right mr-20">
    <a href="{{ route('login') }}"><h2 class="grey normal">{{ __('Login') }}</h2></a>
    <a href="{{ route('register') }}"><h2 class="grey ml-11">{{ __('Register') }}</h2></a>
</div>

<h2 class="center grey">Registration Form</h2>

<div class="entry-container">
    <div class="justify-content-center">

        <div>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="flex">
                    <label for="name" class="form-label">{{ __('Name') }}</label>

                        <input id="name" type="text" class="card-inner w-full @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                </div>
                        @error('name')
                            <span class="invalid-feedback ml-31.6%" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror



                <div class="flex mt-11">
                    <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>

                        <input id="email" type="email" class="card-inner w-full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                </div>
                        @error('email')
                            <span class="invalid-feedback ml-31.6%" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror


                <div class="flex mt-11">
                    <label for="password" class="form-label">{{ __('Password') }}</label>

                        <input id="password" type="password" class="card-inner w-full @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                </div>
                        @error('password')
                            <span class="invalid-feedback ml-31.6%" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror


                <div class="flex mt-11">
                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>

                        <input id="password-confirm" type="password" class="card-inner w-full @error('password') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
                </div>

                <div class="ml-31.6% mt-11">

                        <button type="submit" class="btn-login">
                            {{ __('Register') }}
                        </button>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
