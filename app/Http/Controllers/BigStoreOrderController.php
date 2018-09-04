<?php

namespace App\Http\Controllers;

use App\Product;
use App\StateOrder;
use Illuminate\Http\Request;
use App\BigStoreOrder;
use App\BigStoreOrderDetails;
use App\User;

class BigStoreOrderController extends Controller
{
    //
    public function List(){
        /*
         * Truy van lay thong tin don hang
         * Truy van lay thong tin san pham
         * Kiem tra CodeOrder de lay thong tin
         * Hoac dua vao id de lay thong tin
         * */
        $BigStoreOrder = BigStoreOrder::SELECT(
            'id',
            'idUser',
            'Name',
            'AddressShip',
            'TotalPrice',
            'CodeOrder'
        )->paginate(30);
        $User = User::all();
        return view('admin.BigStoreOrder.list',['BigStoreOrder'=>$BigStoreOrder,'User'=>$User]);
    }

    public function getDetailsOrder($id){
        $BigStoreOrder = BigStoreOrder::JOIN(
            'BigStoreOrderDetail',
            'BigStoreOrder.id',
            '=',
            'BigStoreOrderDetail.idBigStoreOrder'
        )->WHERE(
            'BigStoreOrder.id',
            '=',
            $id
        )->get();
        $BG = BigStoreOrder::JOIN('StateOrder','BigStoreOrder.id','=','idOrder')->WHERE('BigStoreOrder.id','=',$id)->select('StateOrder.StateOrder','StateOrder.id')->get();
        $Product = Product::JOIN('ImgProduct','Product.id','=','ImgProduct.idProduct')->SELECT('Product.id','Product.NameProduct','ImgProduct.ImgProduct')->get();
        return view('admin.BigStoreOrder.change',['BigStoreOrder'=>$BigStoreOrder,'Product'=>$Product,'BG'=>$BG]);
    }

    public function postUpdateOrder(Request $request ,$id){
        $StateOrder = StateOrder::find($id);
        $StateOrder->StateOrder = $request->StateOrder;
        $StateOrder->save();
        return redirect()->back()->with('thong_bao','Update Cart success!');
    }
    /*
     * Khi xoa Order:
     *  Xoa Item cua order
     *  Xoa State cua Order
     *  Xoa Order
     * */
    public function getDeleteOrder($id){

        return view();
    }
}
