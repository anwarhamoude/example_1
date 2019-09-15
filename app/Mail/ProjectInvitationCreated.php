<?php

namespace App\Mail;

use App\ProjectInvitation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProjectInvitationCreated extends Mailable{

    use Queueable, SerializesModels;

    public $projectInvitation;

    public function __construct(ProjectInvitation $projectInvitation){

        $this->projectInvitation = $projectInvitation;

    }


    public function build()
    {
        return $this->view('email.project_invitation.index');
    }
}
