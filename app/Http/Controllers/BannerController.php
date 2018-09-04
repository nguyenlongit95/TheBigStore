<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\MainCategories;

class BannerController extends Controller
{
    //
    public function ListBanner(){
        $Banner = Banner::paginate(5);
        return view('admin.Banner.list',['Banner'=>$Banner]);
    }
    public function getAddBanner(){
        $MainCategories = MainCategories::select('id','MainCategories')->get();
        return view('admin.Banner.add',['MainCategories'=>$MainCategories]);
    }
    public function postAddBanner(Request $request){
        $this->validate($request,[
            'Banner'=>'required',
            'idMainCategories'=>'required'
        ],[
            'Banner.required'=>'Please chose a image',
            'idMainCategories.required'=>'Please select a mother categories'
        ]);
        $Banner = new Banner();
        if($request->hasFile('Banner')){
            $file = $request->file('Banner');
            $fileExtendtion = $file->getClientOriginalExtension();
            if($fileExtendtion == "PNG" || $fileExtendtion == "png" || $fileExtendtion == "jpg" || $fileExtendtion == "JPEG" || $fileExtendtion == "gif"){
                $FileName = $file->getClientOriginalName();
                $Name = str_random(3) . "_" . $FileName;
                if($file->move("upload/Banner/",$Name)){
                    $Banner->Banner = $Name;
                    $Banner->idMainCategories = $request->idMainCategories;
                    $Banner->save();
                    return redirect('admin/Banner/List')->with("thong_bao","Add new Banner success");
                }else{
                    return redirect('admin/Banner/List')->with("thong_bao","Cannot move images to folder, please check again");
                }
            }else{
                return redirect('admin/Banner/List')->with("thong_bao","Warning file is not formatted properly");
            }
        }else{
            return redirect('admin/Banner/List')->with("thong_bao","Cannot find images");
        }
    }

    public function getUpdateBanner($id){
        $Banner = Banner::find($id);
        $MainCategories = MainCategories::all();
        return view('admin.Banner.updateBanner',['Banner'=>$Banner,'MainCategories'=>$MainCategories]);
    }
    public function postUpdateBanner(Request $request, $id){
        $this->validate($request,[
            'idMainCategories'=>'required'
        ],[
            'idMainCategories.required'=>'Please select a mother categories'
        ]);
        $Banner = Banner::find($id);
        if($request->hasFile('Banner')){
            $file = $request->file('Banner');
            $fileExtendtion = $file->getClientOriginalExtension();
            if($fileExtendtion == "PNG" || $fileExtendtion == "png" || $fileExtendtion == "jpg" || $fileExtendtion == "JPEG" || $fileExtendtion == "gif"){
                $FileName = $file->getClientOriginalName();
                $Name = str_random(3) . "_" . $FileName;
                if($file->move("upload/Banner/",$Name)){
                    $Banner->Banner = $Name;
                    $Banner->idMainCategories = $request->idMainCategories;
                    $Banner->save();
                    return redirect('admin/Banner/List')->with("thong_bao","Change a Banner success");
                }else{
                    return redirect('admin/Banner/List')->with("thong_bao","Cannot move images to folder, please check again");
                }
            }else{
                return redirect('admin/Banner/List')->with("thong_bao","Warning file is not formatted properly");
            }
        }else{
            $Banner->Banner = $request->CurrentImg;
            $Banner->idMainCategories = $request->idMainCategories;
            $Banner->save();
            return redirect('admin/Banner/List')->with("thong_bao","Change a Banner success");
        }
    }
    public function getDeleteBanner($id){
        $Banner = Banner::find($id);
        if($Banner->delete()){
            return redirect('admin/Banner/List')->with("thong_bao","Delete a Banner success");
        }else{
            return redirect('admin/Banner/List')->with("thong_bao","Delete a Banner fail, please check again");
        }
    }
}
