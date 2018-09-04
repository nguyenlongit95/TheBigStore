<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;

class InfoController extends Controller
{
    //
    public function getList(){
        $InfoOfPage = Info::all();
        return view('admin.Linked',['Info'=>$InfoOfPage]);
    }
    public function postChangeInfo(Request $request,$id){

    }
}
