<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class ProjectController extends Controller{


    public function index(){

        $projects = auth()->user()->accessibleProjects();
        return view('projects.index', compact('projects'));
    }



    public function show(Project $project){

        try {
            $this->authorize('update', $project);
        } catch (AuthorizationException $e) {
            abort(403);
        }

        return view('projects.show', compact('project'));
    }




    public function create(){

        return view('projects.create');
    }




    public function store(){

        $project = auth()->user()->projects()->create($this->validation());

        return redirect($project->path());
    }



    public function edit(Project $project){

        return view('projects.edit', compact('project'));
    }



    public function update(Project $project){

        try {
            $this->authorize('update', $project);
        } catch (AuthorizationException $e) {
            abort(403);
        }

        $project->update($this->validation());

        return redirect($project->path());
    }



    public function destroy(Project $project){

        $this->authorize('manage',$project);
        $project->delete();
        return redirect('projects');
    }



    protected function validation(){

        return request()->validate([
            'title' => 'sometimes|required',
            'description' => 'sometimes|required',
            'notes' => 'nullable',
        ]);
    }
}
