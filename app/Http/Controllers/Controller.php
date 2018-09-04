<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\MainCategories;
use App\Categories;
use App\Slide;
use App\Banner;
use DB;
use Cart;

use Illuminate\View\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /*
     * Tao phuong thuc khoi tao de co the goi o tat ca cac file blade template
     * File nay xay dung bo khung du lieu cho cac thanh phan cua website
     * Truy van va truyen du lieu cho cac thanh phan cua website
     * Header, slider, banner,footer
     * Su dung view->composer() de truyen du lieu cho cac file
     * */
    public function __construct()
    {
        /*
         * Truy van va truyen du lieu cho header
         * Truy van danh muc de truyen du lieu cho menu
         * Su dung lenh Join de lay thong tin
         * */
        view()->composer('layouts.header',function (View $view){
            // Truyen tham so tai day
            $MainCategories = MainCategories::select('MainCategories','id')->get();
            $view->with(compact('MainCategories'));
        });
        view()->composer('layouts.header',function (View $view){
            // Truyen tham so tai day
            $Categories = Categories::select('Categories','idMainCategories','id')->get();
            $view->with(compact('Categories'));
        });
        view()->composer('layouts.header',function (View $view){
            // Truyen tham so tai day
            $showBanner = Banner::select('Banner','idMainCategories')->get();
            $view->with(compact('showBanner'));
        });
        view()->composer('layouts.header',function (View $view){
            // Truyen tham so tai day
            $CartCount = Cart::count();
            $view->with(compact('CartCount'));
        });
        view()->composer('layouts.footer',function (View $view){
            // Truyen tham so tai day
            $MainCategories = MainCategories::select('id','MainCategories')->get();
            $view->with(compact('MainCategories'));
        });

    }
}
