@extends('layouts.app')

@section('content')
    @include('projects._form', [
        'title' => 'Update',
        'buttonText' => 'update project',
    ])
@endsection
