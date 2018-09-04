<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ImgProduct;

class singlePageController extends Controller
{
    //
    public function SinglePage($id){
        // truy van san pham dua vao id duoc gui len
        $Product = Product::JOIN(
            'ImgProduct',
            'Product.id',
            '=',
            'ImgProduct.idProduct'
        )->find($id);
        // Product Single Offers
        $ProductOffers = Product::JOIN(
            'ImgProduct',
            'Product.id',
            '=',
            'ImgProduct.idProduct'
        )->WHERE(
            'Product.id',
            '>',
            '0'
        )->orderBy(
            'Product.Sales',
            'ASC'
        )->select(
            'Product.id',
            'Product.NameProduct',
            'Product.Price',
            'Product.Sales',
            'ImgProduct.ImgProduct'
        )->take(16)->get();
        return view('Single',['Product'=>$Product,'ProductOffers'=>$ProductOffers]);
    }
}
