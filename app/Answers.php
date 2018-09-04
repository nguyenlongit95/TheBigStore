<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $table="Answers";
    //Ket noi 1-1 toi bang UserQuestion
    public function UserQuestion(){
        return $this->hasOne('App\UserQuestion','idQuestion','id');
    }
}
