<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model{

    use RecordsActivity;

    protected $table = 'projects';
    protected $fillable = ['owner_id','title','description','notes'];

    public function path(){

        return "/projects/{$this->id}";
    }



    public function owner(){

        return $this->belongsTo(User::class);
    }



    public function tasks(){

        return $this->hasMany(Task::class)->latest();
    }



    public function addTask($body){

        return $this->tasks()->create(compact('body'));
    }



    public function activity(){
        return $this->hasMany(Activity::class)->latest();
    }



    public function invite(User $user){

        return $this->members()->attach($user);
    }


    public function members(){

        return $this->belongsToMany(User::class,'project_member')->withTimestamps();
    }
}
