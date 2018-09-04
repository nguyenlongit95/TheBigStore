<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BigStoreOrder extends Model
{
    protected $table="BigStoreOrder";
    //Ket noi 1-n toi bang User
    public function User(){
        return $this->hasOne('App\User','idUser','id');
    }
    /*
     * Ket noi 1-n toi bang StateOrder
     * Ket noi 1-n toi bang BigStoreOrderDetail
     * */
    public function StateOrder(){
        return $this->hasMany('App\StateOrder','idOrder','id');
    }
    public function BigStoreOrderDetail(){
        return $this->hasMany('App\BigStoreOrderDetails','idBigStoreOrder','id');
    }
}
