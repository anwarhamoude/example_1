<h1 class="center grey">{{ __('skejuhl.com') }}</h1>

<h2 class="center grey mt-40">{{ $title }} Project Form</h2>

<div class="create-container">
    <div class="justify-content-center">

        <div>
            <form method="POST"
                @if(!$project->id == null)
                    action="{{ route('projects.update', [$project->id]) }}"
                @else
                    action="{{ route('projects.store') }}"
                @endif
                    >
                @csrf
                @isset($project->id)
                    {{ method_field('patch')}}
                @endisset
                <div class="flex">
                    <input id="title" type="text" class="card-inner w-full @error('title') is-invalid @enderror" name="title" value="{{ $project->title }}" placeholder="enter title...">
                </div>
                        @error('title')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror


                <div class="flex mt-11">
                    <textarea id="description" class="card-inner w-full @error('description') is-invalid @enderror" name="description" cols="30" rows="16" placeholder="enter project description...">{{ $project->description }}</textarea>
                </div>
                        @error('description')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror


                <div class="flex mt-11">
                    <a href="
                    @if(!$project->id == null)
                    {{ route('projects.show', [$project->id]) }}
                    @else
                    {{ route('projects.index') }}
                    @endif
                        " class="btn-cancel">cancel</a>
                    <button class="btn-create">{{ $buttonText }}</button>
                </div>
            </form>
        </div>
    </div>

</div>
