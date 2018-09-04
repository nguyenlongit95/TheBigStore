<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\User;
class ContactPageController extends Controller
{
    //
    public function ContactPage(){
        return view('Contact');
    }
    public function postContact(Request $request){
        $this->validate($request,[
            'Name'=>'required|min:3|max:100',
            'Email'=>'required',
            'Message'=>'required'
        ],[
            'Name.required'=>'What your name?',
            'Name.min'=>'Name very sort',
            'Name.max'=>'Name very long',
            'Email.required'=>'Please enter your email!',
            'Message.required'=>'What do you thing ?'
        ]);
        $Contact = new Contact();
        $Contact->Name = $request->Name;
        $Contact->Email = $request->Email;
        $Contact->Message = $request->Message;
        $Contact->Checker = 0;
        if($Contact->save()){
            return redirect()->back()->with('thong_bao','Send Message success !');
        }else{
            return redirect()->back()->with('thong_bao','Send Message failed, please check again !');
        }
    }
}
