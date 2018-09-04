<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class usersController extends Controller
{
    // Cac phuong thuc lien quan den User
    public function getListUser(){
        $user = User::all();
        return view("admin.Users.list",['user'=>$user]);
    }
    /*
     * phuong thuc them nguoi dung
     * */
    public function getAddUsers(){
        return view('admin.Users.add');
    }
    public function postAddUsers(Request $request){
        $this->validate($request,[
            'username'=>'required|min:3|max:32|unique:users,username',
            'password'=>'required|min:8',
            'email'=>'required|unique:users,email',
            'level'=>'required',
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
            'level.required'=>'Level has not null',
            'address.required'=>'Please incorrect your address',
        ]);
        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->address = $request->address;
        $user->level = $request->level;
        $user->remember_token = str_random(50);
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $imgExtends = $file->getClientOriginalExtension();
            if($imgExtends == "png" || $imgExtends == "PNG"){
                $imgName = $file->getClientOriginalName();
                $strEx = str_random(3) ."_". $imgName;
                $user->avatar = $strEx;
                if($user->save() && $file->move('upload/Avatar/',$strEx)) {
                    return redirect()->back()->with('thong_bao','Insert account success');
                }else{
                    return redirect()->back()->with('thong_bao','Save account failed, please check again');
                }
            }else{
                return redirect()->back()->with('thong_bao','Please chose a images has extend PNG');
            }
        }else{
            $user->avatar = "user.png";
            if($user->save()){
                return redirect()->back()->with('thong_bao','Insert account success');
            }else{
                return redirect()->back()->with('thong_bao','Insert account failed, please check again');
            }
        }
    }

    function getChangeUser($id){
        $User = User::find($id);
        return view('admin.Users.change',['user'=>$User]);
    }
    function postChangeUser(Request $request, $id){
        $user = User::find($id);
        $this->validate($request,[
            'email'=>'required|unique:users,email,'.$user->id,
            'level'=>'required'
        ],[
            'email.required'=>'Please enter email of you',
            'email.unique'=>'Email has already',
            'level.required'=>'Level has not null'
        ]);
        $user->email = $request->email;
        $user->level = $request->level;
        $user->address = $request->address;
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $imgExtends = $file->getClientOriginalExtension();
            if($imgExtends == "png" || $imgExtends == "PNG"){
                $imgName = $file->getClientOriginalName();
                $strEx = str_random(3) ."_". $imgName;
                $user->avatar = $strEx;
                if($user->save() && $file->move('upload/Avatar/',$strEx)) {
                    return redirect()->back()->with('thong_bao','Update an account success');
                }else{
                    return redirect()->back()->with('thong_bao','Update account failed, please check again');
                }
            }else{
                return redirect()->back()->with('thong_bao','Please chose a images has extend PNG');
            }
        }else{
            $user->save();
            return redirect()->back()->with('thong_bao','Update an account success');
        }
    }

    // delete User voi tham so dau vao la id
    /*
     * Nhung neu khong delete duoc user thi se thong bao va tra ve ket qua cu the
     * */
    public function getDeleteUser($id){
        $user = User::find($id);
        if($user != null){
            try{
                if($user->delete() == true){
                    return redirect('admin/Users/List')->with('thong_bao','Delete success');
                }else{
                    return redirect('admin/Users/List')->with('thong_bao','Foreign key constraint fails, check again!');
                }
            }catch(Exception $exception){
                return redirect('admin/Users/List')->with('thong_bao',$exception);
            }
        }else{
            echo "Khong tim thay User, dung co ma hack nhe' ";
        }
    }

    /*
     * Phuong thuc truy cap chi tiet tai khoan nguoi dung
     * Hien thi thong tin tai khoan nguoi dung
     * Bat nguoi dung nhap mk cu sau do moi cho phep nhap mat khau moi
     * Khi nhap mat khau cu thi dung Ajax de kiem tra, neu dung thi hien thi form de nhap mk moi
     * */
    
}
