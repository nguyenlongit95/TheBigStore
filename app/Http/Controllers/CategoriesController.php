<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MainCategories;
use App\Categories;
use App\FormProperties;
class CategoriesController extends Controller
{
    //Cac phuong thuc quan ly Categories va MainCategories
    public function ListCategories(){
        $Categories = Categories::paginate(10);
        $MainCategories = MainCategories::paginate(5);
        return view('admin.Categories.List',['Categories'=>$Categories,'MainCategories'=>$MainCategories]);
    }
    public function getAddMainCategories(){
        return view('admin.Categories.addMainCategories');
    }
    public function postAddMainCategories(Request $request){
        $this->validate($request,[
            'MainCategories'=>'required|min:3|max:32'
        ],[
            'MainCategories.required'=>'please enter new main categories!',
            'MainCategories.min'=>'Main categories has min 3 char',
            'MainCategories.max'=>'Main categories has max 32 char'
        ]);
        $MainCategories = new MainCategories();
        $MainCategories->MainCategories = $request->MainCategories;
        if($MainCategories->save()){
            return redirect('admin/Categories/List')->with('thong_bao','Add new main categories success');
        }else{
            return redirect('admin/Categories/AddMainCategories')->with('thong_bao','Add new main categories faild! Please check again');
        }
    }
    public function getAddCategories(){
        $MainCategories = MainCategories::all();
        return view('admin.Categories.addCategories',['MainCategories'=>$MainCategories]);
    }
    public function postAddCategories(Request $request){
        $this->validate($request,[
            'idMainCategories'=>'required',
            'Categories'=>'required|min:3|max:32'
        ],[
            'Categories.required'=>'please enter new categories!',
            'Categories.min'=>'Main categories has min 3 char',
            'Categories.max'=>'Main categories has max 32 char',
            'idMainCategories.required'=>'Please select a mother categories'
        ]);
        $Categories = new Categories();
        $Categories->Categories = $request->Categories;
        $Categories->idMainCategories = $request->idMainCategories;
        $Categories->info = $request->info;
        if($Categories->save()){
            return redirect('admin/Categories/List')->with('thong_bao','Add new categories success');
        }else{
            return redirect('admin/Categories/AddCategories')->with('thong_bao','Add new categories faild! Please check again');
        }
    }
    public function getUpdateMainCategories($id){
        $MainCategories = MainCategories::find($id);
        return view('admin.Categories.updateMainCategories',['MainCategories'=>$MainCategories]);
    }
    public function postUpdateMainCategories(Request $request,$id){
        $this->validate($request,[
            'MainCategories'=>'required|min:3|max:32'
        ],[
            'MainCategories.required'=>'please enter new main categories!',
            'MainCategories.min'=>'Main categories has min 3 char',
            'MainCategories.max'=>'Main categories has max 32 char'
        ]);
        $MainCategories = MainCategories::find($id);
        $MainCategories->MainCategories = $request->MainCategories;
        if($MainCategories->save()){
            return redirect('admin/Categories/List')->with('thong_bao','Change a main categories success');
        }else{
            return redirect('admin/Categories/AddMainCategories')->with('thong_bao','Change a main categories fail! Please check again');
        }
    }
    public function getUpdateCategories($id){
        $Categories = Categories::find($id);
        $MainCategories = MainCategories::select('id','MainCategories')->get();
        $FormProperties = FormProperties::where('idCategories','=',$id)->paginate(5);
        return view('admin.Categories.UpdateCategories',['Categories'=>$Categories,'MainCategories'=>$MainCategories,'FormProperties'=>$FormProperties]);
    }
    public function postUpdateCategories(Request $request,$id){
        $this->validate($request,[
            'idMainCategories'=>'required',
            'Categories'=>'required|min:3|max:32'
        ],[
            'Categories.required'=>'please enter new categories!',
            'Categories.min'=>'Main categories has min 3 char',
            'Categories.max'=>'Main categories has max 32 char',
            'idMainCategories.required'=>'Please select a mother categories'
        ]);
        $Categories = Categories::find($id);
        $Categories->Categories = $request->Categories;
        $Categories->idMainCategories = $request->idMainCategories;
        $Categories->info = $request->info;
        if($Categories->save()){
            return redirect('admin/Categories/List')->with('thong_bao','Change this categories success');
        }else{
            return redirect('admin/Categories/AddCategories')->with('thong_bao','Change this categories fail ! Please check again');
        }
    }
    public function getDeleteMainCategories($id){
        $MainCategories = MainCategories::find($id);
        if($MainCategories->delete()){
            return redirect('admin/Categories/List')->with('thong_bao','Delete a mother categories success');
        }else{
            return redirect('admin/Categories/List')->with('thong_bao','Delete a mother categories Fail, Because exist sub categories');
        }
    }
    public function getDeleteCategories($id){
        $Categories = Categories::find($id);
        if($Categories->delete()){
            return redirect('admin/Categories/List')->with('thong_bao','Delete a categories success');
        }else{
            return redirect('admin/Categories/List')->with('thong_bao','Delete a categories Fail, Because exist product of categories');
        }
    }
    public function getAddFormProperties($id){

    }
    public function postAddFormProperties(Request $request,$id){
        $this->validate($request,[
            'FormProperties'=>'required'
        ],[
            'FormProperties.required'=>'Please incorrect a form properties of product'
        ]);
        $FormProperties = new FormProperties();
        $FormProperties->FormProperties = $request->FormProperties;
        $FormProperties->idCategories = $request->idCategories;
        if($FormProperties->save()){
            return redirect('admin/Categories/UpdateCategories/'.$id)->with('thong_bao','Add new form properties success');
        }else{
            return redirect('admin/Categories/UpdateCategories/'.$id)->with('thong_bao','Add new form properties fail, please check again');
        }
    }
    /*
     * Code xu ly server cho Ajax
     * Sau khi chuyen du lieu len thi tien hanh xu ly
     * Dua du lieu tro ve trang hien thi
     * Tham so gui len la id cua MainCategories
     * Tra du lieu ve la danh sach cac Categories cua MainCategories do
     * */
    public function AjaxLoadCategories($id){
        $Categories = Categories::where('idMainCategories','=',$id)->paginate(7);
        //foreach($Categories as $C){
            ?>
            <div class="card">
                <div class="card-close">
                    <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                    </div>
                </div>
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Categories / </h3>
                    <h3 class="h4"><a href="admin/Categories/AddCategories"> Add</a></h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Categories</th>
                            <th>Created Time</th>
                            <th>updated Time</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($Categories as $C){ ?>
                            <form action="" method="">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <tr>
                            <th style="display: none;" scope="row"><?php echo $C->id; ?></th>
                            <td><?php echo $C->Categories; ?></td>
                            <td><?php echo $C->created_at; ?></td>
                            <td><?php echo $C->updated_at; ?></td>
                            <td><a href="admin/Categories/UpdateCategories/<?php echo $C->id; ?>">Update</a></td>
                            <td><a href="admin/Categories/DeleteCategories/<?php echo $C->id; ?>">Delete</a></td>
                        </tr>
                            </form>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
        echo $Categories->render();
        }
}
