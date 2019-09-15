@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/calendar.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right">
            @auth
            <div class="flex">
                <a href="{{ route('dashboard') }}"><h2 class="grey normal mr-20">{{ __('Dashboard') }}</h2></a>

                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    <h2 class="grey normal">{{ __('Logout') }}</h2>
                </a>
            </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            @else
            <div class="flex">
                <a href="{{ route('login') }}"><h2 class="grey normal">{{ __('Login') }}</h2></a>
                <a href="{{ route('register') }}"><h2 class="grey normal ml-11">{{ __('Register') }}</h2></a>
            </div>
            @endauth
        </div>
    @endif
</div>

    <div class="title">{{ __('skejuhl.com')}}</div>
    <h3 class="center">Today's Date: <?php echo date('F d, Y'); ?></h3>


<div class="epoch">
    <div>Day: <input id="day" type="number" value="<?php echo date('d'); ?>"/></div>
    <div class="ml-11">Month: <input id="month" type="number" value="<?php echo date('m'); ?>"/></div>
    <div class="ml-11">Year: <input id="year" type="number" value="<?php echo date('Y'); ?>"/></div>

<input class="ml-11" type="button" value="Find Day"
       onclick="let calendarHTML =
            calendar([document.getElementById('day').value,
            document.getElementById('month').value,
            document.getElementById('year').value]);
            document.getElementById('calendar').innerHTML = calendarHTML;
            document.getElementById('calendarCode').innerText = calendarHTML"/>
</div>

<div id="calendar"></div>

<!-- Scripts -->
<script src="{{ asset('js/calendar.js') }}"></script>
@endsection
