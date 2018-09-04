<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
     * Ket noi 1-n den bang Contact
     * Ket noi 1-n den bang WishList
     * Ket noi 1-n den bang UserQuestion
     * Ket noi 1-n den bang BigStoreOrder
     * */
    public function Contact(){
        return $this->hasMany('App\Contact','idUser','id');
    }
    public function WishList(){
        return $this->hasMany('App\WishList','idUser','id');
    }
    public function UserQuestion(){
        return $this->hasMany('App\UserQuestion','idUser','id');
    }
    public function BigStoreOrder(){
        return $this->hasMany('App\BigStoreOrder','idUser','id');
    }

}
