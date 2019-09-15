<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model{

    protected $table = 'activities';
    protected $fillable = ['user_id','project_id','subject','description','changes'];
    protected $casts = ['changes' => 'array'];


    public function subject(){

        return $this->morphTo();
    }


    public function user(){

        return $this->belongsTo(User::class);
    }
}
