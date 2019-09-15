<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail{

    use Notifiable;

    protected $fillable = ['name','email','password','avatar_path'];


    protected $hidden = ['password', 'remember_token'];


    protected $casts = ['email_verified_at' => 'datetime'];


    public function projects(){

        return $this->hasMany(Project::class,'owner_id')->latest('updated_at');
    }


    public function accessibleProjects(){

        return Project::where('owner_id', $this->id)
            ->orWhereHas('members', function($query){
                $query->where('user_id', $this->id);
            })->get();
    }


    public function avatar(){

      if(!$this->avatar_path){
        return 'avatars/default.jpg';
      }

      return $this->avatar_path;
    }
}
