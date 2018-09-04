<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BigStoreOrderDetails extends Model
{
    protected $table="BigStoreOrderDetail";
    //Ket noi 1-1 toi bang BigStoreOrder
    public function BigStoreOrder(){
        return $this->hasOne('App\BigStoreOrder','idBigStoreOrder','id');
    }
}
