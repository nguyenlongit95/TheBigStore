<?php

namespace App\Http\Controllers;

use App\Answers;
use Illuminate\Http\Request;
use App\User;
use App\UserQuestion;

class FAQController extends Controller
{
    //
    public function FAQPage(){
        /*
         * Lay UsersQuestion de lay duoc Question cua nguoi dung
         * Lay cac FAQs cua admin tra loi cho Question do
         * Nguoi dung cung co the tra loi cac Question do
         * Dung ket noi 3 bang voi nhau de lay du lieu cho hop ly
         * Lien ket qua cac khoa phu de lay thong tin du lieu
         * Lay cac du lieu can thiet de tien hanh truy van
         * */
        $UserQuestion = UserQuestion::JOIN(
            'users',
            'users.id',
            '=',
            'UserQuestion.idUser'
        )->select(
            'users.username',
            'users.avatar',
            'users.id',
            'UserQuestion.id',
            'UserQuestion.Question',
            'UserQuestion.created_at'
        )->paginate(10);
        $Answers = Answers::select('idQuestion','Answers','idUser','created_at')->get();
        return view('FAQ',['UserQuestion'=>$UserQuestion,'Answers'=>$Answers]);
    }

    public function sendFAQ(Request $request, $id){
        $this->validate($request,[
            'Answers'=>'required',
            'idUser'=>'required'
        ],[
            'Answers.required'=>'What happend?',
            'idUser.required'=>'Who are you?'
        ]);
        $Answers = new Answers();
        $Answers->idUser = $request->idUser;
        $Answers->idQuestion = $id;
        $Answers->Answers = $request->Answers;
        if($Answers->save()){
            return redirect()->back()->with('thong_bao','Reply commented!');
        }else{
            return redirect()->back()->with('thong_bao','Reply comment failed, please check again!');
        }
    }
}
