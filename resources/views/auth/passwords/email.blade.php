@extends('layouts.app')

@section('content')

<div class="flex content-right mr-20">
    <a href="{{ route('login') }}"><h2 class="grey normal">{{ __('Login') }}</h2></a>
    <a href="{{ route('register') }}"><h2 class="grey normal ml-11">{{ __('Register') }}</h2></a>
</div>

<h2 class="center grey">Send Password Reset Form</h2>


@if (session('status'))
    <div class="center grey" style="margin-bottom:-38px;" role="alert">
            {{ session('status') }}
        </div>
@endif


<div class="entry-container">
    <div class="justify-content-center">

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="flex">
                <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>


                    <input id="email" type="email" class="card-inner w-full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            </div>

            <div class="ml-31.6% mt-11">

                    <button type="submit" class="btn-login">
                        {{ __('Send Password Reset Link') }}
                    </button>

            </div>
        </form>

    </div>
</div>
@endsection
