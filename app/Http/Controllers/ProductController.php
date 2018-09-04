<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;

use App\ImgProduct;
use App\MainCategories;
use Illuminate\Http\Request;
use App\Product;
use App\ProductSpecialProperties;
use App\Categories;
use App\ProductRatting;

class ProductController extends Controller
{
    /*
     * Xay dung cac chuc nang: them, sua, xoa
     * Cac chuc nang lien quan den images se lay du lieu tu bang khac
     * Luu y den cac thuoc tinh mo rong cua san pham
     * Cac thuoc tinh dac biet cua san pham
     * */
    public function ListProduct(){
        $Product = Product::paginate(6);
        return view('admin.Product.list',['Product'=>$Product]);
    }
    // Them moi san pham thi khong can phai them MainCategories
    public function getAddProduct(){
        $MainCategories = MainCategories::select('id','MainCategories')->get();
        return view('admin.Product.add',['MainCategories'=>$MainCategories]);
    }

    // Update Product vs tham so la id cua san pham
    public function getUpdateProduct($id){
        $Product = Product::find($id);
        $MainCategories = MainCategories::all();
        $ImgProduct = ImgProduct::where('idProduct','=',$id)->select('ImgProduct','id')->paginate(5);
        $SpecialProperties = ProductSpecialProperties::where('idProduct','=',$id)->select('id','ProductSpecialProperties','Value')->paginate(5);
        return view('admin.Product.UpdateProduct',['Product'=>$Product,'MainCategories'=>$MainCategories,'ImgProduct'=>$ImgProduct,'SpecialProperties'=>$SpecialProperties]);
    }
    // Update Product vs id cua san pham
    public function postUpdateProduct(Request $request,$id){
        $Product = Product::find($id);
        $this->validate($request,[
            'idCategories'=>'required',
            'NameProduct'=>'required|min:3|unique:Product,NameProduct,'.$Product->id,
            'Info'=>'required',
            'Price'=>'required|min:2|max:10|digits_between:1,9',
            'Sales'=>'required|between:0,99'
        ],[
            'idCategories.required'=>'Please chose a categories of product',
            'NameProduct.required'=>'Please enter name of product',
            'NameProduct.min'=>'Product name must be at least 3 characters long',
            'NameProduct.unique'=>'Name product has already exist',
            'Info.required'=>'Enter infomation of product',
            'Price.required'=>'Please enter price of product',
            'Price.min'=>'Min price has min 2$',
            'Price.max'=>'Max price has max 9999999999$',
            'price.digits_between'=>'Numbers must be between 1 and 9',
            'Sales.required'=>'Product has sales',
            'Sales.between'=>'Product sales attached 0% - 99%'
        ]);
        $Product->idCategories = $request->idCategories;
        $Product->NameProduct = $request->NameProduct;
        $Product->Info = $request->Info;
        $Product->Price = $request->Price;
        $Product->Sales = $request->Sales;
        $Product->QTY = $request->QTY;
        if($Product->save()){
            return redirect('admin/Product/List')->with('thong_bao','Change a product success!');
        }else{
            return redirect()->back();
        }
    }
    public function postAddProduct(Request $request){
        $this->validate($request,[
            'idCategories'=>'required',
            'NameProduct'=>'required|min:3|unique:Product,NameProduct',
            'Info'=>'required',
            'Price'=>'required|min:2|max:10|digits_between:1,9',
            'Sales'=>'required|between:0,99'
        ],[
            'idCategories.required'=>'Please chose a categories of product',
            'NameProduct.required'=>'Please enter name of product',
            'NameProduct.min'=>'Product name must be at least 3 characters long',
            'NameProduct.unique'=>'Name product has already exist',
            'Info.required'=>'Enter infomation of product',
            'Price.required'=>'Please enter price of product',
            'Price.min'=>'Min price has min 2$',
            'Price.max'=>'Max price has max 9999999999$',
            'price.digits_between'=>'Numbers must be between 1 and 9',
            'Sales.required'=>'Product has sales',
            'Sales.between'=>'Product sales attached 0% - 99%'
        ]);
        $Product = new Product();
        $Product->idCategories = $request->idCategories;
        $Product->NameProduct = $request->NameProduct;
        $Product->Info = $request->Info;
        $Product->Price = $request->Price;
        $Product->Sales = $request->Sales;
        $Product->QTY = $request->QTY;
        if($Product->save()){
            return redirect('admin/Product/List')->with('thong_bao','Add new product success!');
        }else{
            return redirect()->back();
        }
    }
    /*
     * Phan Xoa san pham
     * Truoc khi xoa san pham thi phai kiem tra xem hinh anh co ton tai hay k?
     * Neu hinh anh ton tai thi xoa hinh anh truoc
     * Xoa xong hinh anh thi xoa Ratting
     * Xoa xong ratting thi xoa cac thuoc tinh dac biet cua san pham
     * Xoa xong tat ca thi moi xoa san pham
     * Xoa xong san pham thi redirect ve dung trang cu va hien thi thong bao
     * */
    public function getDeleteProduct($id){
        $ImgProduct = ImgProduct::where('idProduct','=',$id);
        $Product = Product::find($id);
        $ProductRatting = ProductRatting::where('idProduct','=',$id);
        $ProductSpecialProperties = ProductSpecialProperties::where('idProduct','=',$id);
        if(file_exists('upload/Product/'.$ImgProduct->ImgProduct)){
            if(File::delete('upload/Product/'.$ImgProduct->ImgProduct)) {
                if ($ImgProduct->delete()) {
                    $ProductRatting->delete();
                    $ProductSpecialProperties->delete();
                    $Product->delete();
                    return redirect()->back()->with('thong_bao', 'Delete a image success!');
                } else {
                    return redirect()->back()->with('thong_bao', 'Delete a image failed! Cannot find image in resource...');
                }
            }else{
                return redirect()->back()->with('thong_bao', 'Delete image failed, Please check image again!');
            }
        }else{
            return redirect()->back()->with('thong_bao','Delete a image failed! Donot exits image file');
        }
    }

    /*
     * Quan ly hinh anh cho san pham
     * Tham so dau vao la id cua san pham
     * Hinh anh co the co nhieu hon 1
     * Dinh dang khuyen khich la JPG hoac PNG
     * Hinh anh se tu dong crop de phu hop voi kich thuoc cua trang
     * */
    public function postAddImageProduct(Request $request,$id){
        $this->validate($request,[
           'ImgProduct'=>'required'
        ],[
            'ImgProduct.required'=>'Please chose a image!'
        ]);
        $ImgProduct = new ImgProduct();
        if($request->hasFile('ImgProduct')){
            $file = $request->file('ImgProduct');
            $IMGExtendsName = $file->getClientOriginalExtension();
            if($IMGExtendsName == "JPG" || $IMGExtendsName == "jpg" || $IMGExtendsName == "png" || $IMGExtendsName == "PNG"){
                $IMGName = $file->getClientOriginalName();
                $name = str_random(3) . "_" .$IMGName;
                $file->move('upload/Product/',$name);
                $ImgProduct->ImgProduct = $name;
                $ImgProduct->idProduct = $id;
                if($ImgProduct->save()){
                    return redirect()->back()->with('thong_bao','Add new image success!');
                }else{
                    return redirect()->back()->with('thong_bao','Add new image failed!');
                }
            }
        }
    }
    public function getDeleteImgProduct($id){
        $ImgProduct = ImgProduct::find($id);
        if($ImgProduct != null){
            if($ImgProduct->delete() && file_exists('upload/Product/'.$ImgProduct->ImgProduct)){
                if(File::delete('upload/Product/'.$ImgProduct->ImgProduct)){
                    return redirect()->back()->with('thong_bao','Delete a image success!');
                }else{
                    return redirect()->back()->with('thong_bao','Delete a image failed! Cannot find image in resource...');
                }
            }else{
                return redirect()->back()->with('thong_bao','Delete a image failed! Donot exits image file');
            }
        }else{
            return redirect()->back()->with('thong_bao','Cannot find images of product!');
        }
    }

    /*
     * Quan ly cac thuoc tinh dac biet cua san pham
     * Cac thuoc tinh nay dua vao id cua san pham
     * Them sua xoa ngay lap tuc tren trang cap nhat thong tin
     * */
    public function postAddProductSpecialProperties(Request $request,$id){
        $this->validate($request,[
           'ProductSpecialProperties'=>'required',
           'Value'=>'required'
        ],[
           'ProductSpecialProperties.required'=>'Please enter a properties',
            'Value.required'=>'Please enter value of properties'
        ]);
        $ProductSpecialProperties = new ProductSpecialProperties();
        $ProductSpecialProperties->idProduct = $id;
        $ProductSpecialProperties->ProductSpecialProperties = $request->ProductSpecialProperties;
        $ProductSpecialProperties->Value = $request->Value;
        if($ProductSpecialProperties->save()){
            return redirect()->back()->with('thong_bao','Add new properties success');
        }else{
            return redirect()->back()->with('thong_bao','Cannot add properties, please check again!');
        }
    }
    public function postUpdateProductSpecialProperties(Request $request,$id){
        $this->validate($request,[
            'ProductSpecialProperties'=>'required',
            'Value'=>'required'
        ],[
            'ProductSpecialProperties.required'=>'Please enter a properties',
            'Value.required'=>'Please enter value of properties'
        ]);
        $ProductSpecialProperties = ProductSpecialProperties::find($id);
        $ProductSpecialProperties->ProductSpecialProperties = $request->ProductSpecialProperties;
        $ProductSpecialProperties->Value = $request->Value;
        if($ProductSpecialProperties->save()){
            return redirect()->back()->with('thong_bao','Change this properties success');
        }else{
            return redirect()->back()->with('thong_bao','Cannot change properties, please check again!');
        }
    }
    public function getDeleteProductSpecialProperties($id){
        $ProductSpecialProperties = ProductSpecialProperties::find($id);
        $ProductSpecialProperties->delete();
        return redirect()->back()->with('thong_bao','Delete properties success');
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /// Phan nay la Ajax de load cac thanh phan hien thi cho trang quan tri
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /*
     * Ajax load cho phan san pham
     * Load Ajax Categories cho Product
     * */
    public function loadCategories($id){
        $Categories = Categories::where('idMainCategories','=',$id)->select('id','Categories')->get();
        ?>
        <label class="form-control-label">Select Main Categories</label>
        <SELECT class="form-control" id="SelectMainCategories" name="idCategories">
            <?php foreach($Categories as $C){ ?>
            <OPTION value="<?php echo $C->id; ?>"> <?php echo $C->Categories; ?> </OPTION>
            <?php } ?>
        </SELECT>
        <?php
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /// Phan nay lay ra du lieu dang JSON cho cac san pham de JS bat roi phan tich
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function ProductToJSON(){
        $Product = Product::all();
        echo response($Product,201);
    }
}
