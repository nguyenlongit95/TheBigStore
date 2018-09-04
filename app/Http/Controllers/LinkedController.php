<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Linked;

class LinkedController extends Controller
{
    //
    public function getList(){
        $Linked = Linked::all();
        return view('admin.Linked.list',['Linked'=>$Linked]);
    }
    public function postChange(Request  $request, $id){
        $Linked = Linked::find($id);
        $Linked->Linked = $request->Linked;
        $Linked->save();
        return redirect('admin/Linked/List')->with('thong_bao','Update Link success');
    }
}
