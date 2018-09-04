<?php

namespace App\Http\Controllers;

use App\ImgProduct;
use App\MainCategories;
use Illuminate\Http\Request;
use App\Categories;
use App\Product;
use App\Banner;

class productPageController extends Controller
{
    //
    public function ProductPage($id){
        /*
         * Truy van lay san pham
         * Dua vao id cua categories gui len tien hanh truy van
         * Lay tat ca san pham thuoc Categories do
         * Phan trang
         * Truyen du lieu
         * */
        $Product = Product::JOIN(
            'ImgProduct',
            'Product.id',
            '=',
            'ImgProduct.idProduct'
        )->where(
         'idCategories',
         '=',
         $id
        )->select(
           'Product.id',
           'ImgProduct.ImgProduct',
           'Product.NameProduct',
           'Product.Price',
           'Product.Sales'
        )->paginate(16);
        /*
         * Lay banner cua danh muc cha
         * Dua vao id truyen len
         * Truy van lay danh muc cha
         * Lay id danh muc cha va truy van lay banner tu danh muc cha
         * */
        $Categories = Categories::JOIN(
            'MainCategories',
            'Categories.idMainCategories',
            '=',
            'MainCategories.id'
        )->where(
            'Categories.id',
            '=',
            $id
        )->select(
            'MainCategories.id'
        )->get();
        $Banner = Banner::select('idMainCategories','Banner')->get();
        return view('product',['Product'=>$Product,'Categories'=>$Categories,'Banner'=>$Banner]);
    }

    /*
     * Trang hien thi du lieu cua danh muc cha
     * Su dung id cua danh muc cha gui len va tien hanh truy van
     * */
    public function MainCategoriesPage($id){
        /*
         * Truy van du lieu tu bang Categories den bang Product
         * Dua vao $id gui len de xac dinh cac Categories thuoc MainCategories
         * Dua vao Categories de lay Product tuong ung
         * Truy van vao bang hinh anh va lay hinh anh cua san pham
         * Dua vao id cua san pham lay duoc de xet dieu kien
         * Truyen tham so cho view voi 2 tham so la Product va ImgProduct
         * */
        $Product = Product::JOIN(
            'Categories',
            'Product.idCategories',
            '=',
            'Categories.id'
        )->JOIN(
            'ImgProduct',
            'Product.id',
            '=',
            'ImgProduct.idProduct'
        )->where(
            'Categories.id',
            '=',
            $id
        )->select(
            'Product.id',
            'Product.NameProduct',
            'Product.Price',
            'Product.Sales',
            'ImgProduct.ImgProduct'
        )->paginate(16);
        // Truy van de lay hinh anh tu bang ImgProduct
        $ImgProduct = ImgProduct::select('ImgProduct','idProduct')->get();
        // Truy van hinh anh cua categories
        $Categories = Categories::JOIN(
            'MainCategories',
            'Categories.idMainCategories',
            '=',
            'MainCategories.id'
        )->where(
            'Categories.id',
            '=',
            $id
        )->select(
            'MainCategories.id'
        )->get();
        $Banner = Banner::select('idMainCategories','Banner')->get();
        return view('MainCategories',['Product'=>$Product,'ImgProduct'=>$ImgProduct,'Categories'=>$Categories,'Banner'=>$Banner]);
    }

    /*
     * Truy van cac san pham co Offers
     * Xap xep theo thu tu tu moi den cu
     * Tu duoi len tren
     * */
    public function OffersPage(){
        $OffersProduct = Product::JOIN(
            'ImgProduct',
            'Product.id',
            '=',
            'ImgProduct.idProduct'
        )->where(
            'Sales',
            '>',
            '0'
        )->orderBy(
            'Sales',
            'ASC'
        )->select(
            'Product.id',
            'Product.NameProduct',
            'Product.Price',
            'Product.Sales',
            'ImgProduct.ImgProduct'
        )->paginate(24);
        return view('OffersProduct',['OffersProduct'=>$OffersProduct]);
    }

    /*
     * Function tim kiem
     * Dung lenh Like
     * Tim kiem tren nhieu truong khac nhau
     * Su dung menh de OrWhere
     * */
    public function ResultSearch(Request $request){
        $keySearch = $request->KeySearch;
        $this->validate($request,[
            'KeySearch'=>'required'
        ],[
            'KeySearch.required'=>'What do you want to find?'
        ]);
        $ProductSearch = Product::JOIN(
            'ImgProduct',
            'Product.id',
            '=',
            'ImgProduct.idProduct'
        )->where(
            "NameProduct",
            "like",
            "%$keySearch%"
        )->orWhere(
            "info",
            "like",
            "%$keySearch%"
        )->select(
            'Product.NameProduct',
            'Product.Price',
            'Product.Sales',
            'ImgProduct.ImgProduct'
        )->paginate(24);
        return view('Search',['ProductSearch'=>$ProductSearch]);
    }
}
