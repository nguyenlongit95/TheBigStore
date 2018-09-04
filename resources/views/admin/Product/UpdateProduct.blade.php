<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 6/6/18
 * Time: 4:20 PM
 */
?>
@extends('admin.DashBoard')
@section('content')
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">Product</h2>
            </div>
        </header>
        <ul class="breadcrumb">
            <div class="container-fluid">
                <li class="breadcrumb-item"><a href="DashBoard">Update</a></li>
                <li class="breadcrumb-item active">Forms</li>
            </div>
        </ul>
        <!-- Forms Section-->
        <section class="forms">
            <div class="container-fluid">
                <div class="row">
                    <!-- Basic Form-->
                    <div class="col-lg-8">
                        @include('admin.layout.AlertFile')
                        <div class="card">
                            <div class="card-close">
                                <div class="dropdown">
                                    <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                    <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                                </div>
                            </div>
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">Update this product!</h3>
                            </div>
                            <div class="card-body">
                                <p>The product has change infomation and add new properties this now.</p>
                                <form action="admin/Product/UpdateProduct/{{$Product->id}}" method="POST">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        <label class="form-control-label">Name Product</label>
                                        <input type="text" name="NameProduct" value="{{$Product->NameProduct}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Info Product</label>
                                        <textarea class="form-control ckeditor" name="Info" id="" cols="30" rows="10">{{$Product->Info}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Price</label>
                                        <input type="number" name="Price" value="{{$Product->Price}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Sales</label>
                                        <input type="number" name="Sales" value="{{$Product->Sales}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Quantity</label>
                                        <input type="number" name="QTY" value="{{$Product->QTY}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Main Categories</label>
                                        <SELECT class="form-control" id="SelectMainCategories" name="idMainCategories">
                                            @foreach($MainCategories as $MC)
                                                <OPTION <?php if($MC->id == $Product->idCategories){echo "selected";}else{} ?> value="{{$MC->id}}">{{$MC->MainCategories}}</OPTION>
                                            @endforeach
                                        </SELECT>
                                    </div>
                                    <div class="form-group" id="showCategoriesForAddProeuct">
                                        <!-- tai day se show ra cac Categories -->
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Update" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Add Special Properties Product Form-->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-close">
                                <div class="dropdown">
                                    <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                    <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                                </div>
                            </div>
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">Add a picture</h3>
                            </div>
                            <div class="card-body">
                                <p>You can choose a computer image for product.</p>
                                <form class="form-horizontal" method="POST" action="admin/Product/AddImageProduct/{{$Product->id}}" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Add a image</label>
                                        <div class="col-sm-9">
                                            <input id="inputHorizontalSuccess" name="ImgProduct" type="file" class="form-control form-control-success">
                                            <small class="form-text">Images are small in size 240x480 and are in JPG or PNG format.</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-9 offset-sm-3">
                                            <input type="submit" value="Add Image" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>

                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Images this product</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ImgProduct as $img)
                                        <tr>
                                            <th scope="row">{{$img->id}}</th>
                                            <td><img src="upload/Product/{{$img->ImgProduct}}" height="100px" width="100px" alt="Img of product"></td>
                                            <td><a href="admin/Product/DeleteImgProduct/{{$img->id}}">Delete</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    {{$ImgProduct->render()}}
                                    <?php  ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Inline Form-->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-close">
                                <div class="dropdown">
                                    <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                    <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                                </div>
                            </div>
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">Properties Product Special List</h3>
                            </div>
                            <div class="card-body">
                                <p>Add special attributes, own the product here!</p>

                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Special Properties</th>
                                        <th>Value Properties</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($SpecialProperties as $SP)
                                        <form class="form-horizontal" action="admin/Product/postUpdateProductSpecialProperties/{{$SP->id}}" method="POST">
                                            <tr>
                                                <th scope="row">{{$SP->id}}</th>
                                                <td><input type="text" name="ProductSpecialProperties" value="{{$SP->ProductSpecialProperties}}"></td>
                                                <td><input type="text" name="Value" value="<?php echo trimText($SP->Value,20); ?>"></td>
                                                <td><input type="submit" name="Change" value="Update"></td>
                                                <td><a href="admin/Product/DeleteProduct/{{$SP->id}}">Delete</a></td>
                                            </tr>
                                        </form>
                                    @endforeach
                                    </tbody>
                                    {{$SpecialProperties->render()}}
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Add More Properties Product Form-->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-close">
                                <div class="dropdown">
                                    <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                    <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                                </div>
                            </div>
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">Add Properties Product Special</h3>
                            </div>
                            <div class="card-body">
                                <p>Add special attributes, own the product here!</p>
                                <form class="form-horizontal" action="admin/Product/AddProductSpecialProperties/{{$Product->id}}" method="POST">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Special Properties</label>
                                        <div class="col-sm-9">
                                            <input id="inputHorizontalSuccess" name="ProductSpecialProperties" type="text" placeholder="Product Special Properties" class="form-control form-control-success"><small class="form-text">Properties More.</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Value Of Special Properties</label>
                                        <div class="col-sm-9">
                                            <input id="inputHorizontalWarning" name="Value" type="text" placeholder="Value of Properties" class="form-control form-control-warning"><small class="form-text">Example help text that remains unchanged.</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-9 offset-sm-3">
                                            <input type="submit" value="Add" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Inline Form-->


                    <!-- Inline Form-->
                </div>
            </div>
        </section>
    </div>
@endsection


