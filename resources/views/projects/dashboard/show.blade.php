@extends('layouts.app')

@section('content')

    <div class="flex flex-end content-right mr-20">
      <h2 class="grey normal logout mr-20"><a href="{{ route('profile_dashboard') }}">{{ __('User Profile') }}</h2>
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
                <h2 class="center grey">Project Dashboard</h2>

                <h3 class="center grey">Today's Date: <?php echo date('F d, Y'); ?></h3>

                <a href="{{ route('projects.index') }}"><h3>Projects</h3></a>
                <a href="{{ route('projects.create') }}"><h3>Projects Create</h3></a>

            </div>
        </div>
    </div>

    <div class="mb-100"></div>
@endsection
