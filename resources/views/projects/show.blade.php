@extends('layouts.app')

@section('content')

<h1 class="center grey">{{ __('skejuhl.com') }}</h1>

<div class="container">

    <div class="flex">
        <div class="mr-11 flex flex-col">
            <div class="center">Administrator</div>
            <img class="admin" src="{{ asset('storage/'.$project->owner->avatar()) }}" alt="">
            <div class="center">{{ $project->owner->name }}</div>
        </div>
        @foreach($project->members as $member)
        <div class="flex flex-col mt-32">
            <div class="center">Member</div>
             <img class="member" src="{{ asset('storage/'.$member->avatar()) }}" alt="No Image">
             <div class="center">{{ $member->name }}</div>
        </div>
        @endforeach
    </div>

    <h3>{{ $project->title }}</h3>
    <div class="nl2br">{{ $project->description }}</div>


    <div class="flex flex-end mt-30">
    @can('manage',$project)
        <div>
            <a href="{{ route('projects.edit', [$project->id]) }}" class="btn-cancel mr-20">edit project</a>
        </div>
        <div>
            <form method="post" action="{{ route('project.destroy', [$project->id]) }}">
                @method('delete')
                @csrf
                <button class="button-red">delete project</button>
            </form>
        </div>
    @endcan
    </div>


    <div class="flex flex-grow-1">
        <div class="w-3/4 mr-44">
            <h4 class="grey">Tasks</h4>

            <div class="">
                <form method="post" action="{{ $project->path() . '/tasks' }}">
                    @csrf
                    <input name="body" placeholder="add task..." class="card-inner w-full grey @error('body') is-invalid @enderror">
                </form>
            </div>

            @error('body')
            <span class="invalid-feedback ml-11" role="alert"><strong>{{ $message }}</strong></span>
            @enderror

            @foreach($project->tasks as $task)
                <div class="mt-8">
                    <form method="post" action="{{ $task->path() }}">
                    @method('patch')
                    @csrf
                    <div class="flex">
                        <input name="body" class="card-inner w-full {{ $task->completed ? 'greyed' : 'grey' }}" value="{{ $task->body }}">
                        <input name="completed" style="margin-right:-40px;" type="checkbox" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                    </div>
                    </form>
                </div>
            @endforeach

            <div class="mt-40">
                <h4 class="grey">General Notes</h4>
                <form method="post" action="{{ $project->path() }}">
                @csrf
                @method('patch')
                <textarea name="notes" id="notes" class="card-inner w-full @error('notes') is-invalid @enderror" cols="30" rows="16" placeholder="Project notes...">{{ $project->notes }}</textarea>
                <button class="btn-update mt-11" type="submit">save notes</button>
                </form>
            </div>

            @error('notes')
            <span class="invalid-feedback ml-11" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="w-1/4 flex space-center">
        <div class="mt-40 ml-20 flex-col">
         @include('projects.activity.index')

         @can('manage',$project)
            @include('projects.invite_users.index')
         @endcan
        </div>
        </div>
    </div>
</div>

<div class="mb-100"><br/><br/></div>
@endsection
