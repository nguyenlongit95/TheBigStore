<?php

namespace App\Http\Controllers;

use App\BigStoreOrder;
use App\BigStoreOrderDetails;
use Illuminate\Http\Request;
use Cart;
use App\Product;
use App\ImgProduct;
use App\User;
use App\StateOrder;
use Illuminate\Support\Facades\Auth;

class BigStoreShoppingCart extends Controller
{
    // Chuyen ve trang hien thi gio hang
    public function ShopingCartPage(){
        // Lay thong tin gio hang
        $ShowCart = Cart::content();
        $CartTotal = Cart::total();
        return view('BigStoreShoppingCart',['ShowCart'=>$ShowCart,'CartTotal'=>$CartTotal]);
    }
    /*
     * Them moi san pham vao gio hang
     * Dua vao id cua san pham
     * Khoi tao gio hang va them moi
     * */
    public function AddItem($id){
        $Product = Product::JOIN(
            'ImgProduct',
            'Product.id',
            '=',
            'ImgProduct.idProduct'
        )->SELECT(
            'Product.NameProduct',
            'Product.id',
            'Product.Price',
            'Product.Sales',
            'ImgProduct.ImgProduct'
        )->find($id);
        /*
         * Them san pham vao gio hang
         * Chi luu gio hang vao session
         * Khi thoat roi vao lai la auto clear san pham trong gio hang
         * */
        // Them chi can them: idProduct, Qty, Price, Price la da bao gom Sales
        $price = ($Product->Price / 100) * (100 - $Product->Sales);
        $CheckAddCart = Cart::add([
            'id' => $id,
            'name' => $Product->NameProduct,
            'qty' => 1,
            'price' => $price,
            'options' => [
                'img' => $Product->ImgProduct,
            ]
        ]);
        if ($CheckAddCart) {
            return 1;
        } else {
            return 0;
        }
    }

    /*
     * Sua so luong san pham
     * Tham so truyen len gom co
     *      SO luong san pham
     *      rowId cua san pham do
     * Xoa san pham trong gio hang
     * Tham so dau vao la rowId
     * */
    public function ChangeCart(Request $request){
        $rowId = $request->rowId;
        $qty = $request->qty;
        // Kiem tra button truyen len va xac dinh xem nguoi dung xoa hay cap nhat san pham
        if($request->updateCart == "V"){
            Cart::update($rowId,$qty);
            return redirect()->back()->with('thong_bao','Update Item Success');
        }else if($request->updateCart == "X"){
            Cart::remove($rowId);
            return redirect()->back()->with('thong_bao','Remove This Item success');
        }else{
            return redirect()->back()->with('thong_bao','Invalid request, please retry');
        }
    }
    /*
     * Phuong thuc mua hang
     * Day vao tham so bao gom(idUser, Name, AddressShip, TotalPrice,CodeOrder)
     * Sau khi luu thong tin don hang thanh cong thi luu thong tin san pham
     * Sau khi luu thong tin san pham thanh cong thi hien thi thong bao
     * Neu duoc thi send email toi cho email cua User
     * */
    public function SendOrder(Request $request){
        $this->validate($request,[
           'Name'=>'required|min:3',
           'account'=>'required',
           'email'=>'required',
           'AddressShip'=>'required|min:3'
        ],[
            'Name.required'=>'What your name?',
            'Name.min'=>'Name sort',
            'account.required'=>'Please enter you account',
            'email.required'=>'Please let us know your email',
            'AddressShip.required'=>'Please Let us know where your address is for order to the right address',
            'AddressShip.min'=>'Address name must be greater than 3 characters'
        ]);
        if(Auth::check()){
            $idUser = Auth::user()->id;
            $TotalPrice = Cart::total();
            /* Auto khoi tao 1 ma tu dong de tranh truong hop trung don hang
                *   Ma tu dong nay se trung voi ca Item trong gio hang
             * */
            $CodeOrder = str_random(3) . "_" . $request->account;
            /*
             * Tien hanh luu thong tin vao trong CSDL
             * */
            $BigStoreOrder = new BigStoreOrder();
            $BigStoreOrder->idUser = $idUser;
            $BigStoreOrder->Name = $request->Name;
            $BigStoreOrder->AddressShip = $request->AddressShip;
            $BigStoreOrder->TotalPrice = $TotalPrice;
            $BigStoreOrder->CodeOrder = $CodeOrder;
            if($BigStoreOrder->save()){
                /*
                 * Sau hi luu thong tin don hang xong thi luu cac san pham
                 * Dua vao CodeOrder de de tim duoc dung dong hang va san pham
                 * Su dung vong for de luu lien tuc cac san pham co trong gio hang thong qua rowId
                 * */
                $BigStoreOrder = BigStoreOrder::WHERE(
                    'CodeOrder',
                    '=',
                    $CodeOrder
                )->select('id','CodeOrder')->get();
                $CartContent = Cart::content();
                foreach ($CartContent as $C) {
                    /*
                     * Tai day truy van lay ra id va QTY cua Product
                     * Neu QTY > Qty gui len thi moi cho phep mua
                     * Sau khi Luu Item Order thi lay QTY cua Product - Qty gui len
                     * Luu lai thong tin cua san pham
                     * */
                    $Product = Product::find($C->id);
                    if($Product->QTY > 0 && $Product->QTY > $C->qty){
                        $BigStoreOrderDetails = new BigStoreOrderDetails();
                        $BigStoreOrderDetails->idProduct = $C->id;
                        $BigStoreOrderDetails->Qty = $C->qty;
                        $BigStoreOrderDetails->Price = $C->price;
                        $BigStoreOrderDetails->CodeOrder = $CodeOrder;
                        foreach($BigStoreOrder as $B){
                            if($B->CodeOrder == $CodeOrder){
                                $BigStoreOrderDetails->idBigStoreOrder = $B->id;
                            }else{
                                break;
                            }
                        }
                        if($BigStoreOrderDetails->save()){
                            $Product->QTY = $Product->QTY - $C->qty;
                            $Product->save();
                        }
                    }
                }
                foreach($BigStoreOrder as $B){
                    if($B->CodeOrder == $CodeOrder){
                        $StateOrder = new StateOrder();
                        $StateOrder->idOrder = $B->id;
                        $StateOrder->StateOrder = "0";
                        $StateOrder->save();
                        break;
                    }else{
                        break;
                    }
                }
                return redirect()->back()->with('thong_bao','Submit order success!');
            }else{
                return redirect()->back()->with('thong_bao','Cannot insert order, please check again');
            }
        }else{
            return redirect()->back()->with('thong_bao','Please login! Do not hack into the system offline');
        }
    }
}
