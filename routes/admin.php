<?php

/*
 * Route cho cac thanh phan cua website
 * Route cho phia admin
 * Route cho phia khach hang
 * Bao mat route cho phia admin bang middleware
 * */

\Route::get('/',function(){
    return view('Login');
});
/*
 * Xay dung bo route cho phia quan tri
 * Route cho phia quan tri se di theo duong dan:
 *  admin/{ten item}/{chuc nang}
 * Cac chuc nang co ban nhu them sua xoa
 * Cac chuc nang muc thong ke khac
 * Chuc nang muc thong ke se co route rieng
 * Luu y voi cac route phia gio hang
 * */
\Route::group(['prefix'=>'admin'],function (){
    \Route::get('DashBoard','adminController@DashBoard');

    /*
     * Route cho cac phan cua trang admin
     * Nhin chung deu co 3 phan:
     * them sua xoa(Get)
     * Them sua xoa(POST)
     * List(GET)
     * */
    \Route::group(['prefix'=>'Categories'],function(){
        \Route::get('List','CategoriesController@ListCategories');

        \Route::get('AddMainCategories','CategoriesController@getAddMainCategories');
        \Route::post('AddMainCategories','CategoriesController@postAddMainCategories');

        \Route::get('AddCategories','CategoriesController@getAddCategories');
        \Route::post('AddCategories','CategoriesController@postAddCategories');

        \Route::get('UpdateMainCategories/{id}','CategoriesController@getUpdateMainCategories');
        \Route::post('UpdateMainCategories/{id}','CategoriesController@postUpdateMainCategories');

        \Route::get('UpdateCategories/{id}','CategoriesController@getUpdateCategories');
        \Route::post('UpdateCategories/{id}','CategoriesController@postUpdateCategories');

        \Route::get('DeleteMainCategories/{id}','CategoriesController@getDeleteMainCategories');
        \Route::get('DeleteCategories/{id}','CategoriesController@getDeleteCategories');

        \Route::get('AddFormProperties/{id}','CategoriesController@getAddFormProperties');
        \Route::post('AddFormProperties/{id}','CategoriesController@postAddFormProperties');

        \Route::get('AjaxLoadCategories/{id}','CategoriesController@AjaxLoadCategories');
    });
    /*
     * Route cho phan Product
     * Product
     * Image
     * Special properties
     * */
    \Route::group(['prefix'=>'Product'],function(){
        \Route::get('List','ProductController@ListProduct');

        \Route::get('AddProduct','ProductController@getAddProduct');
        \Route::post('AddProduct','ProductController@postAddProduct');

        \Route::get('UpdateProduct/{id}','ProductController@getUpdateProduct');
        \Route::post('UpdateProduct/{id}','ProductController@postUpdateProduct');

        \Route::get('DeleteProduct/{id}','ProductController@getDeleteProduct');

        /*
         * Quan ly hinh anh cho san pham
         * Viec quan ly hinh anh cho san pham nam trong phan quan ly san pham luon
         * Hinh anh san pham co the co nhieu hon 1 hinh anh
         * Viec them sua xoa se luon di kem voi id cua san pham
         * */
        \Route::post('AddImageProduct/{id}','ProductController@postAddImageProduct');
        \Route::get('DeleteImgProduct/{id}','ProductController@getDeleteImgProduct');

        /*
         * Quan ly thuoc tinh dac biet, thuoc tinh rieng cua cac san pham
         * Viec quan ly nay se dua vao id cua san pham
         * Quan ly ngay tren trang sua thong tin san pham
         * */
        \Route::post('AddProductSpecialProperties/{id}','ProductController@postAddProductSpecialProperties');
        \Route::post('postUpdateProductSpecialProperties/{id}','ProductController@postUpdateProductSpecialProperties');
        \Route::get('DeleteProductSpecialProperties/{id}','ProductController@getDeleteProductSpecialProperties');

        // Route load Ajax cho Product
        \Route::get('LoadCategories/{id}','ProductController@loadCategories');

        // Day du lieu JSON cho cac san pham de JS co the bat duoc
        \Route::get('ProductToJSON','ProductController@ProductToJSON');
    });
    \Route::group(['prefix'=>'Contact'],function (){
        \Route::get('List','ContactController@ListContact');

        \Route::get('ChangeContact/{id}','ContactController@getFormChangeContact');
    });

    \Route::group(['prefix'=>'Users'],function (){
        \Route::get('List','usersController@getListUser');

        \Route::get('AddUsers','usersController@getAddUsers');
        \Route::post('AddUsers','usersController@postAddUsers');

        \Route::get('ChangeUsers/{id}','usersController@getChangeUser');
        \Route::post('ChangeUsers/{id}','usersController@postChangeUser');

        \Route::get('deleteUsers/{id}','usersController@getDeleteUser');
    });

    /*
     * Route cho phan Extract
     * Info of site
     * Linked
     * Slider
     * Banner
     * */
    \Route::group(['prefix'=>'Banner'],function(){
        \Route::get('List','BannerController@ListBanner');

        \Route::get('AddBanner','BannerController@getAddBanner');
        \Route::post('AddBanner','BannerController@postAddBanner');

        \Route::get('UpdateBanner/{id}','BannerController@getUpdateBanner');
        \Route::post('UpdateBanner/{id}','BannerController@postUpdateBanner');

        \Route::get('DeleteBanner/{id}','BannerController@getDeleteBanner');
    });
});

