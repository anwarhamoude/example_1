@extends('layouts.app')

@section('content')

    <h1 class="center grey">{{ __('skejuhl.com') }}</h1>

    <div class="flex">
    <a href="{{ route('projects.create') }}" class="btn-create mr-44">create project</a>
    </div>

    <div class="projects-container">
    @forelse($projects as $project)
        <div class="flex space-between">
            <h4 class="mb-11"><a href="{{ $project->path() }}">{{ $project->title }}</a></h4>

            <div>
            @can('manage',$project)
            <form method="post" action="{{ route('project.destroy', [$project->id]) }}">
                @method('delete')
                @csrf
                <button class="btn-red mt-11">delete project</button>
            </form>
            @endcan
            </div>
        </div>

        <div class="mt-11 mb-33">
            {{ Str::limit($project->description,666) }}
        </div>
    @empty
        <li>Projects are empty!</li>
    @endforelse
    </div>

@endsection
