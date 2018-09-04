<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQuestion extends Model
{
    protected $table="UserQuestion";
    //Ket noi 1-1 toi bang User
    public function User(){
        return $this->hasOne('App\User','idUser','id');
    }
    // Ket noi 1-n toi bang Answers
    public function Answers(){
        return $this->hasMany('App\Answers','idQuestion','id');
    }
}
