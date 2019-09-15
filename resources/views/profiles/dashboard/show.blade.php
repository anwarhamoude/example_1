@extends('layouts.app')

@section('content')

    <div class="flex flex-end content-right mr-20">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <h2 class="grey normal logout">{{ __('Logout') }}</h2>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <h1 class="center grey" style="margin-top:-13px;">{{ __('skejuhl.com') }}</h1>

    <div class="container mt-40">
        <div class="justify-content-center">

            <div class="">
                <h2 class="center grey">Profile Dashboard</h2>
            </div>

            <div class="mt-40 center">
                Add profile image for {{ auth()->user()->name }}

                <form method="post" action="{{ route('avatar', auth()->id()) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-11">
                        <input type="file" name="avatar">
                    </div>
                    <div class="mt-11">
                        <button class="button" type="submit">upload image</button>
                    </div>
                </form>
            </div>

            <div class="mt-11 center">
                <img src="storage/{{ auth()->user()->avatar_path }}" style="width:128px;height:128px;" alt="">
            </div>

        </div>
    </div>
@endsection
