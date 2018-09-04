<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="Product";
    /*
     * Ket noi 1-1 den bang Categories
     * Ket noi 1-n den bang ProductSpecialProperties
     * Ket noi 1-n den bang ImgProduct
     * Ket noi 1-n den bang ProductRatting
     * */
    public function Categories(){
        return $this->hasOne('App\Categories','idCategories','id');
    }
    public function ProductSpecialProperties(){
        return $this->hasMany('App\ProductSpecialProperties','idProduct','id');
    }
    public function ImgProduct(){
        return $this->hasMany('App\ImgProduct','idProduct','id');
    }
    public function ProductRatting(){
        return $this->hasMany('App\ProductRatting','idProduct','id');
    }
}
