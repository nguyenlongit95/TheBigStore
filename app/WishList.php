<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $table="WishList";
    // Ket noi 1-1 toi bang User
    public function User(){
        return $this->hasOne('App\User','idUser','id');
    }
}
