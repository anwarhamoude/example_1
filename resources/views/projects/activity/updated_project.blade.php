@if(count($activity->changes['after']) == 1)
    <span class="activity-name">{{ $activity->user->name }} </span> updated project <span class="activity-title"> {{ key($activity->changes['after']) }}</span>
@else
    <span class="activity-name">{{ $activity->user->name }} </span> updated project <span class="activity-title"> {{ $project->title }} </span>
@endif
