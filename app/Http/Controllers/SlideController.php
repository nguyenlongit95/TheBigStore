<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    // Them sua xoa slider tai day
    /*
     * Viec them sua xoa slider tuong tu nhu banner
     * */
    public function getSlider(){
        $Slide = Slide::paginate(10);
        return view('admin.Slider.List',['Slide'=>$Slide]);
    }
    public function postAddSlider(Request $request){
        $this->validate($request,[
            'Slide'=>'required'
        ],[
            'Slide.required'=>'Please chose a image'
        ]);
        $Slide = new Slide();
        if($request->hasFile('Slide')){
            $file = $request->file('Slide');
            $fileExtendtion = $file->getClientOriginalExtension();
            if($fileExtendtion == "PNG" || $fileExtendtion == "png" || $fileExtendtion == "jpg" || $fileExtendtion == "JPEG"){
                $FileName = $file->getClientOriginalName();
                $Name = str_random(3) . "_" . $FileName;
                if($file->move("upload/Slide/",$Name)){
                    $Slide->Slide = $Name;
                    $Slide->save();
                    return redirect('admin/Slide/List')->with("thong_bao","Add new Slide success");
                }else{
                    return redirect('admin/Slide/List')->with("thong_bao","Cannot move images to folder, please check again");
                }
            }else{
                return redirect('admin/Slide/List')->with("thong_bao","Warning file is not formatted properly");
            }
        }else{
            return redirect('admin/Slide/List')->with("thong_bao","Cannot find images");
        }
    }

    public function getDeleteSlider($id){
        $Slide = Slide::find($id);
        if(file_exists("upload/Slide/".$Slide->Slide)){
            if(File::delete('upload/Slide/'.$Slide->Slide)){
                $Slide->delete();
                return redirect('admin/Slide/List')->with("thong_bao","Delete a Slide success");
            }else{
                return redirect('admin/Slide/List')->with("thong_bao","Delete a Slide failed, please check again");
            }
        }else{
            return redirect('admin/Slide/List')->with("thong_bao","Do not find your image file");
        }
    }
}
