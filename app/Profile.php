<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model{

    protected $table = 'profiles';
    protected $fillable = ['slug','user_id','titlename','intro','description','phone','phonehidden','workphone','workphonehidden','email2','email2hidden','introlink1','introlink2','introlink3','descriptionlink1','descriptionlink2','descriptionlink3','link1','link2','link3','field1','field2','field3'];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
