<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormProperties extends Model
{
    protected $table="FormProperties";

    /*
     * Ket noi 1-1 den bang Categories
     * */
    public function Categories(){
        $this->hasOne('App\Categories','idCategories','id');
    }
}
