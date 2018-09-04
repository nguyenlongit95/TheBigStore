<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table="Banner";

    // Ket noi 1-1 den bang MainCategories
    public function MainCategories(){
        return $this->hasOne('App\MainCategories','idMainCategories','id');
    }
}
