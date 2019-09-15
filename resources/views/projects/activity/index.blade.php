 <h4 class="grey">Activity Record</h4>
@foreach($project->activity as $activity)
    <div class="{{ $loop->last ? '' : 'mb-4' }}">
        @include("projects.activity.{$activity->description}")
        <small class="grey">{{ $activity->created_at->diffForHumans(null,true) }}</small>
    </div>
@endforeach
