<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Product;
use App\Slide;
use Illuminate\Http\Request;

class indexPageController extends Controller
{
    // Cac phuong thuc hien thi du lieu phia nguoi dung
    /*
     * Hien thi du lieu trang index
     * Trang index se hien thi cac component chinh
     * Hien thi danh sach san pham
     * Header bao gom co: thanh menu, banner, shoppingCart, form tim kiem
     * Content gom co: tabs, san pham, slider
     * Footer co menu, cac link lien ket
     * */
    public function index(){
        /*
         * Danh cho Special Offers
         * Load 4 danh co so offers
         * Moi danh muc hien thi 4 san pham
         * Truy van cac san pham duoc khuyen mai nhieu nhat
         * */
        $Categories = Categories::where('id','>','0')->select('id','Categories')->take(4)->get();
        $Product = Product::JOIN('ImgProduct','Product.id','=','ImgProduct.idProduct')
            ->select(
                'Product.id',
                'Product.NameProduct',
                'Product.Price',
                'Product.Sales',
                'ImgProduct.ImgProduct',
                'Product.idCategories'
            )->get();
        /*
         * Cac san pham duoc xep theo thu tu cua truong Sales
         * Lay toi da 8 san pham
         * */
        $SpecialOffers = Product::JOIN(
            'ImgProduct',
            'Product.id',
            '=',
            'ImgProduct.idProduct'
        )->orderBy(
            'Sales',
            'DESC'
        )->select(
            'Product.id',
            'Product.NameProduct',
            'Product.Price',
            'Product.Sales',
            'ImgProduct.ImgProduct'
        )->take(8)->get();
        // Show Slide cho trang chu
        $Slide = Slide::select('Slide')->take(3)->get();
        return view('home',['Categories'=>$Categories,'Product'=>$Product,'SpecialOffers'=>$SpecialOffers,'Slide'=>$Slide]);
    }
}
