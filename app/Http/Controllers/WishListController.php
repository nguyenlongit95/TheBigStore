<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WishList;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    //
    public function getWishListPage(){
        if(Auth::check()){
            $idUser = Auth::user()->id;
            /*
             * Neu da dang nhap thi truy van du lieu cua nguoi dung da dang nhap
             * Ket noi bang WishList voi bang Product
             * Ngoai ra co the them san pham vao danh sach yeu thich
             * */
            $WishList = WishList::WHERE(
                'idUser',
                '=',
                $idUser
            )->select(
                'idProduct',
                'idUser'
            )->get();
            $Product = Product::JOIN(
               'ImgProduct',
               'Product.id',
               '=',
               'ImgProduct.idProduct'
            )->select(
                'Product.NameProduct',
                'Product.Price',
                'Product.id',
                'ImgProduct.ImgProduct',
                'Product.Sales'
            )->get();
        }else{
            return redirect('index')->with('thong_bao','Please login system');
        }
        return view('WishList',['WishList'=>$WishList,'Product'=>$Product]);
    }
    /*
     * Them san pham moi trong WishList
     * Dua vao id cua san pham gui len
     * Lay Auth de lay duoc id cua nguoi dung
     * */
    public function AddItemWishList($id){
        if(Auth::check()){
            $idUser = Auth::user()->id;
            $WishList = new WishList();
            $WishList->idUser = $idUser;
            $WishList->idProduct = $id;
            $WishList->qty = 1;
            if($WishList->save()){
                return 1;
            }else{
                return 0;
            }
        }
    }
    // Delete WishList
    /*
     * Sau khi xoa trong CSDL
     * Neu xoa thanh cong thi tra ve 1
     * Neu Xoa khong thanh cong thi tra ve gia tri 0
     * */
    public function deleteItemWishList($id){
        $WishList = WishList::find($id);
        if($WishList->delete()){
            return 1;
        }else{
            return 0;
        }
    }
}
