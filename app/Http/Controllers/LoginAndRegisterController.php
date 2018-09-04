<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;

class LoginAndRegisterController extends Controller
{
    //
    public function LoginPage(){
        return view('Login');
    }
    public function postLogin(Request $request){
        $this->validate($request,[
            'Username'=>'required',
            'Password'=>'required|min:3|max:32'
        ],[
            'Username.required'=>'Please enter your Username',
            'Password.required'=>'Please enter your Password',
            'Password.min'=>'Password has sort',
            'Password.max'=>'Password has max 32 char'
        ]);
        /*
         * Su dung Auth
         * Tien hanh kiem tra Auth
         * */
        $Username = $request->Username;
        $Password = $request->Password;
        if(Auth::attempt(['username'=>$Username,'password'=>$Password])){
            return redirect('/')->with('thong_bao','Login success');
        }else{
            return redirect()->back()->with('thong_bao','Login failed');
        }
    }
    public function Logout(){
        if(Auth::logout()){
            return redirect('/');
        }else{
            return redirect()->back();
        }
    }
    public function RegisterPage(){
        return view('Register');
    }
    public function postRegister(Request $request){
        $this->validate($request,[
            'username'=>'required|min:3|max:32|unique:users,username',
            'password'=>'required|min:8',
            'email'=>'required|unique:users,email',
            'address'=>'required',
        ],[
            'username.required'=>'Please insert username of you',
            'username.min'=>'Please insert username > 3 char',
            'username.max'=>'Username max 32 char',
            'username.unique'=>'Username has already',
            'password.required'=>'Please enter password of you',
            'password.min'=>'Please enter password min 8 char',
            'email.required'=>'Please enter email of you',
            'email.unique'=>'Email has already',
            'address.required'=>'Please incorrect your address',
        ]);
        if($request->password == $request->ConfirmPassword) {
            $user = new User();
            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->email = $request->email;
            $user->address = $request->address;
            $user->level = 0;
            $user->remember_token = str_random(50);
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $imgExtends = $file->getClientOriginalExtension();
                if ($imgExtends == "png" || $imgExtends == "PNG") {
                    $imgName = $file->getClientOriginalName();
                    $strEx = str_random(3) . "_" . $imgName;
                    $user->avatar = $strEx;
                    if ($user->save() && $file->move('upload/Avatar/', $strEx)) {
                        return redirect()->back()->with('thong_bao', 'Insert account success');
                    } else {
                        return redirect()->back()->with('thong_bao', 'Save account failed, please check again');
                    }
                } else {
                    return redirect()->back()->with('thong_bao', 'Please chose a images has extend PNG');
                }
            } else {
                $user->avatar = "user.png";
                if ($user->save()) {
                    return redirect()->back()->with('thong_bao', 'Insert account success');
                } else {
                    return redirect()->back()->with('thong_bao', 'Insert account failed, please check again');
                }
            }
        }else{
            return redirect()->back()->with('thong_bao', 'Insert account failed, Password and Confirm not true ');
        }
    }

    public function adminLoginPage(){
        return view('adminLogin');
    }
    public function AdminLogin(Request $request){
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required'
        ],[
            'username.required'=>'Please enter admin account',
            'password.required'=>'Please enter password account!'
        ]);
        $Username = $request->username;
        $Password = $request->password;
        if(Auth::attempt(['username'=>$Username,'password'=>$Password])){
            if(Auth::user()->level == 1){
                return redirect('admin/DashBoard')->with('thong_bao','Login success');
            }else{
                return redirect()->back()->with('thong_bao','Login failed. Please use the administrator account');
            }

        }else{
            return redirect()->back()->with('thong_bao','Login failed');
        }
    }
}
