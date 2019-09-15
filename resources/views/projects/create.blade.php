@extends('layouts.app')

@section('content')

    @include('projects._form', [
        'project' => new App\Project,
        'title' => 'Create',
        'buttonText' => 'create project',
    ])

@endsection
