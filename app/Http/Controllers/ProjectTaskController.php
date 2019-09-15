<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class ProjectTaskController extends Controller{


    public function store(Project $project){

        try {
            $this->authorize('update', $project);
        } catch (AuthorizationException $e) {
            abort(403);
        }

        request()->validate(['body' => 'required|min:3|max:255']);
        $project->addTask(request('body'));
        return redirect($project->path());
    }



    public function update(Project $project, Task $task){

        try {
            $this->authorize('update', $project);
        } catch (AuthorizationException $e) {
            abort(403);
        }

        $task->update(request()->validate(['body' => 'required']));

        request('completed') ? $task->complete() : $task->incomplete();

        return redirect($project->path());
    }
}
