<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSpecialProperties extends Model
{
    protected $table="ProductSpecialProperties";

    // Ket noi 1-1 den bang Product
    public function Product(){
        return $this->hasOne('App\Product','idProduct','id');
    }
}
