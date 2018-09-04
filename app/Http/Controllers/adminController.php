<?php

namespace App\Http\Controllers;
use App\BigStoreOrderDetails;
use App\Categories;
use App\ImgProduct;
use App\Slide;
use App\StateOrder;
use DB;

use Carbon\Carbon;
use App\Answers;
use App\BigStoreOrder;
use App\Contact;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    /*
     * controller dieu khien cac chuc nang cho trang admin
     * Dieu huong admin
     * */
    public function DashBoard(){
        /*
         * Truy van va truyen cac tham so cho bieu do o day
         * Truy van tong san pham
         * Truy van tong So user
         * Truy van tong so Order
         * Truy van tong so Contact
         * Truy van tong so Answer
         * */
        $TotalProduct = DB::table('Product')->sum('QTY');
        $TotalUser = DB::table('users')->count();
        $TotalBigStoreOrder = DB::table('BigStoreOrder')->count();
        $TotalContact = DB::table('Contact')->count();
        $TotalAnwers = DB::table('Answers')->count();
        $OrderDeliverd = BigStoreOrder::JOIN(
            'StateOrder',
            'BigStoreOrder.id',
            '=',
            'StateOrder.idOrder'
        )->WHERE(
            'StateOrder.StateOrder',
            '=',
            '1'
        )->count();
        /*
         * Truy van Lay trung binh so tien cua tat ca san pham trong kho
         * Truy van lay so luong hinh anh trong site
         * Truy van lay so luong Slide trong web
         * Truy van lay so luong Answers trong Site
         * */
        $AVGPrice = Product::avg('Price');
        $TotalImg = ImgProduct::count();
        $TotalSlide = Slide::count();
        /*
         * Truy van du lieu va tra ve JSON de ve bieu do
         * Lay ra 9 Categories co nhieu san pham nhat
         * */
        $arrayCate = array();
        for($i = 1; $i <= 11; $i++){
            $Cate = Categories::JOIN(
                'Product',
                'Categories.id',
                '=',
                'Product.idCategories'
            )->WHERE(
                'Product.idCategories',
                '=',
                $i
            )->sum("QTY");
            array_push($arrayCate,$Cate);
        }
        /*
         * Lay ra so luong don hang da giao
         * Ve bieu do tron the hien don hang da giao va chua giao
         * */
        $OrderDeliverdDount = StateOrder::WHERE('StateOrder','=',1)->count();
        $AllOrder = BigStoreOrder::count();
        $PercentageOrder = ($OrderDeliverdDount/$AllOrder)*100;

        /*
         * Truy van lay san pham trong cac muc gia cu the
         * Su dung lenh Beetween de tien hanh truy van
         * Thao tac trong Eloquied thi su dung lenh GroupBy Having
         * */
        $PriceProductRate1 = Product::groupBy('Price')->having('Price', '>', '10')->having('Price', '<=', '30')->sum('QTY');
        $PriceProductRate2 = Product::groupBy('Price')->having('Price', '>', '30')->having('Price', '<=', '50')->sum('QTY');
        $PriceProductRate3 = Product::groupBy('Price')->having('Price', '>', '50')->having('Price', '<=', '70')->sum('QTY');
        $PriceProductRate4 = Product::groupBy('Price')->having('Price', '>', '70')->having('Price', '<=', '100')->sum('QTY');
        $PriceProductRate5 = Product::groupBy('Price')->having('Price', '>', '100')->sum('QTY');
        $arrPriceProductRate = array();
        array_push($arrPriceProductRate,$PriceProductRate1,$PriceProductRate2,$PriceProductRate3,$PriceProductRate4,$PriceProductRate5);


        /*
         * Truy van so luong san pham da ban va chua ban
         * Luong san pham da ban va chua ban trong 12 thang qua
         * Mốc các tháng được chia ra như sau: "1", "3", "5", "7", "9", "12"
         * Kiem tra xem san pham thuoc khoang nao
         * Neu thuoc khoang thi cho san pham do vao trong mang tuong ung
         * Truyen mang do sang cho view duoi dang JSON
         * */
        $SetDayProduct = Product::all();
        $arrSetDayProduct1 = array();
        $arrSetDayProduct2 = array();
        $arrSetDayProduct3 = array();
        $arrSetDayProduct4 = array();
        $arrSetDayProduct5 = array();
        $arrSetDayProduct6 = array();
        foreach($SetDayProduct as $SDP){
            $set1 = $SDP->created_at->diffInMonths(Carbon::now());
            if($set1 >=0 && $set1 <=1){
                array_push($arrSetDayProduct1,$set1);
            }else if($set1 >1 && $set1 <=3){
                array_push($arrSetDayProduct2,$set1);
            }else if($set1 >3 && $set1 <=5){
                array_push($arrSetDayProduct3,$set1);
            }else if($set1 >5 && $set1 <=7){
                array_push($arrSetDayProduct4,$set1);
            }else if($set1 >7 && $set1 <=9){
                array_push($arrSetDayProduct5,$set1);
            }else if($set1 >9 && $set1 <=12){
                array_push($arrSetDayProduct6,$set1);
            }
        }
        // Dem tong so phan tu co trong mang cua 6 muc ngay thang
        $countArrSetDayProduct1 = count($arrSetDayProduct1);
        $countArrSetDayProduct2 = count($arrSetDayProduct2);
        $countArrSetDayProduct3 = count($arrSetDayProduct3);
        $countArrSetDayProduct4 = count($arrSetDayProduct4);
        $countArrSetDayProduct5 = count($arrSetDayProduct5);
        $countArrSetDayProduct6 = count($arrSetDayProduct6);
        // Chuyen tat ca chi so thu duoc vao trong 1 array
        $ListArrSetDayProduct = array($countArrSetDayProduct1,$countArrSetDayProduct2,$countArrSetDayProduct3,$countArrSetDayProduct4,$countArrSetDayProduct5,$countArrSetDayProduct6);

        /*
         * Lay ngay thang cua so luong san pham da ban
         * So sanh ngay thang cua so luong san pham da ban
         * Lam tuong tu nhu voi phan lay thong tin ngay thang cua san pham o tren
         * */
        $SetDayItem = BigStoreOrderDetails::all();
        $arrSetDayItem1 = array();
        $arrSetDayItem2 = array();
        $arrSetDayItem3 = array();
        $arrSetDayItem4 = array();
        $arrSetDayItem5 = array();
        $arrSetDayItem6 = array();
        foreach($SetDayItem as $SDI){
            $set2 = $SDI->created_at->diffInMonths(Carbon::now());
            if($set2 >=0 && $set2 <=1){
                array_push($arrSetDayItem1,$set2);
            }else if($set2 >1 && $set2 <=3){
                array_push($arrSetDayItem2,$set2);
            }else if($set2 >3 && $set2 <=5){
                array_push($arrSetDayItem3,$set2);
            }else if($set2 >5 && $set2 <=7){
                array_push($arrSetDayItem4,$set2);
            }else if($set2 >7 && $set2 <=9){
                array_push($arrSetDayItem5,$set2);
            }else if($set2 >9 && $set2 <=12){
                array_push($arrSetDayItem6,$set2);
            }
        }
        $countArrSetDayItem1 = count($arrSetDayItem1);
        $countArrSetDayItem2 = count($arrSetDayItem2);
        $countArrSetDayItem3 = count($arrSetDayItem3);
        $countArrSetDayItem4 = count($arrSetDayItem4);
        $countArrSetDayItem5 = count($arrSetDayItem5);
        $countArrSetDayItem6 = count($arrSetDayItem6);
        // Chuyen tat ca chi so thu duoc vao trong 1 array
        $ListArrSetDayItem = array($countArrSetDayItem1,$countArrSetDayItem2,$countArrSetDayItem3,$countArrSetDayItem4,$countArrSetDayItem5,$countArrSetDayItem6);


        return view('admin.dashboardContent',
            [
                'TotalProduct'=>$TotalProduct,
                'TotalUser'=>$TotalUser,
                'TotalOrder'=>$TotalBigStoreOrder,
                'TotalContact'=>$TotalContact,
                'TotalAnwers'=>$TotalAnwers,
                'OrderDeliverd'=>$OrderDeliverd,
                'ABGPrice'=>$AVGPrice,
                'TotalImg'=>$TotalImg,
                'TotalSlide'=>$TotalSlide,
                'arrayCate'=>$arrayCate,
                'PercentageOrder'=>$PercentageOrder,
                'PriceProductRate'=>$arrPriceProductRate,
                'ListArrSetDayProduct'=>$ListArrSetDayProduct,
                'ListArrSetDayItem'=>$ListArrSetDayItem
            ]
        );

    }

    public function AdminLogout(){
        if(Auth::check()){
            Auth::logout();
            return redirect("/");
        }else{
            return redirect()->back()->with('thong_bao','Logout Failed!');
        }
    }
}
