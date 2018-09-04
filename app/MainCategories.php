<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainCategories extends Model
{
    protected $table="MainCategories";

    /*
     * Ket noi den bang Categories
     * Ket noi den bang Banner
     * */
    public function Categories(){
        return $this->hasMany('App\Categories','idMainCategories','id');
    }

    public function Banner(){
        return $this->hasMany('App\Banner','idMainCategories','id');
    }
}
