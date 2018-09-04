<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StateOrder extends Model
{
    protected $table="StateOrder";
    // Ket noi 1-1 toi bang BigStoreOrder
    public function BigStoreOrder(){
        return $this->hasOne('App\BigStoreOrder','idOrder','id');
    }
}
