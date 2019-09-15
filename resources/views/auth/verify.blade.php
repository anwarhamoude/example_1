@extends('layouts.app')

@section('content')
<div class="container">

    <div class="mt-40">
        <h2 class="center grey">{{ __('Verify Your Email Address') }}</h2>

        <h3 class="center grey">
            @if (session('resent'))
                <div class="green mb-16" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
        <br class="mb-8"/>
            {{ __('If you did not receive the email') }}, <a class="btn-link" href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
        </h3>
    </div>

</div>
@endsection
