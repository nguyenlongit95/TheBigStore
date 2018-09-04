<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table="Categories";
    /*
     * Ket noi 1-n den bang Product
     * Ket noi 1-1 den bang MainCategories
     * Ket noi 1-n den bang FormProperties
     */
    public function Product(){
        return $this->hasMany('App\Product','idCategories','id');
    }

    public function MainCategories(){
        return $this->hasOne('App\MainCategories','idMainCategories','id');
    }

    public function FormProperties(){
        return $this->hasMany('App\FormProperties','idCategories','id');
    }
}
