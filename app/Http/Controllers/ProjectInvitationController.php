<?php

namespace App\Http\Controllers;

use App\Mail\ProjectInvitationCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Project;
use App\User;

class ProjectInvitationController extends Controller{

    public function store(Project $project){

        $this->authorize('manage',$project);

        request()->validate([
            'email' => ['required','exists:users,email']
        ],[
            'email.exists' => 'User does not have an account!'
        ]);

        $user = User::whereEmail(request('email'))->first();

        $project->invite($user);
        return redirect($project->path());
    }

    //
    // public function invite(){
    //
    // }
    //
    //
    // public function process(Project $project){
    //
    //     do {
    //         $token = Str::random(64);
    //     }
    //     while (ProjectInvitation::where('token', $token)->first());
    //
    //     $projectInvitation = ProjectInvitation::create([
    //         'user_id' => auth(),
    //         'project_id' => $project->id,
    //         'email' => $request->get('email'),
    //         'token' => $token,
    //         'body' => $request->get('body'),
    //     ]);
    //
    //     Mail::to($request->get('email'))->send(new ProjectInvitationCreated($projectInvitation));
    //
    //     return redirect()->back();
    // }
    //
    //
    // public function accept($token){
    //
    //     if (!$projectInvitation = ProjectInvitation::where('token', $token)->first()) {
    //
    //         abort(404);
    //     }
    //
    //     User::create(['email' => $projectInvitation->email]);
    //
    //     $projectInvitation->delete();
    //
    //     return 'Good job! Invite accepted!';
    // }
}
