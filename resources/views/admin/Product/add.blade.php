<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 5/24/18
 * Time: 4:19 PM
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
                <li class="breadcrumb-item"><a href="admin/DashBoard">Home</a></li>
                <li class="breadcrumb-item active">Add Product</li>
            </div>
        </ul>
        <!-- Forms Section-->
        <section class="forms">
            <div class="container-fluid">
                <div class="row">
                    <!-- Basic Form-->
                    <div class="col-lg-8">
                        <div class="card">
                            @include('admin.layout.AlertFile')
                            <div class="card-close">
                                <div class="dropdown">
                                    <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                    <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                                </div>
                            </div>
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">Basic attributes of the product!</h3>
                            </div>
                            <div class="card-body">
                                <p>The products have some of the same basic attributes, which are added to this form.</p>
                                <form action="admin/Product/AddProduct" method="POST">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        <label class="form-control-label">Select Main Categories</label>
                                        <SELECT class="form-control" id="SelectMainCategories" name="idMainCategories">
                                            @foreach($MainCategories as $MC)
                                            <OPTION value="{{$MC->id}}">{{$MC->MainCategories}}</OPTION>
                                            @endforeach
                                        </SELECT>
                                    </div>
                                    <div class="form-group" id="showCategoriesForAddProeuct">

                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Incorrect Name Product</label>
                                        <input type="text" name="NameProduct" placeholder="Name Of Product" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Info of Product</label>
                                        <textarea name="Info" id="InfoProduct" class="form-control ckeditor" cols="30" rows="10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Price</label>
                                        <input type="text" name="Price" placeholder="$" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Quantity</label>
                                        <input type="number" name="QTY" placeholder="100" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Sales</label>
                                        <input type="number" name="Sales" placeholder="%" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Add New Product" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aperiam dolor ducimus eligendi excepturi illum itaque, minima minus modi nisi non odio officiis placeat porro possimus qui quisquam suscipit voluptatem.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque debitis dignissimos doloribus ex libero minus odio officiis perspiciatis soluta velit? Alias cum debitis delectus dolor illum recusandae rem unde voluptatum.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores ex nesciunt non officia quae quam qui, reprehenderit tenetur ullam veniam, vero voluptatum! Deserunt dignissimos exercitationem sunt temporibus tenetur totam voluptate.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet at beatae iure numquam pariatur sed, soluta. Alias aliquid est et eum maiores quia quisquam, quod rem sapiente similique totam?</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

