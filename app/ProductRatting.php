<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductRatting extends Model
{
    protected $table="ProductRatting";

    // Ket noi 1-1 den bang Product
    public function Product(){
        return $this->hasOne('App\Product','idProduct','id');
    }
}
