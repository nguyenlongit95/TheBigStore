<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 5/25/18
 * Time: 8:58 PM
 */
?>
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
                <h2 class="no-margin-bottom">Update Main Categories</h2>
            </div>
        </header>
        <ul class="breadcrumb">
            <div class="container-fluid">
                <li class="breadcrumb-item"><a href="/admin/Categories/List">Home</a></li>
                <li class="breadcrumb-item active">Main Categories</li>
            </div>
        </ul>
        <!-- Forms Section-->
        <section class="forms">
            <div class="container-fluid">
                <div class="row">
                    <!-- Horizontal Form-->
                    <div class="col-lg-6">
                        @include('admin.layout.AlertFile')
                        <div class="card">
                            <div class="card-close">
                                <div class="dropdown">
                                    <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                    <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                                </div>
                            </div>
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">Update Main Categories</h3>
                            </div>
                            <div class="card-body">
                                <p>This main categories, main categories has created this created new Banner and Categories.</p>
                                <form action="admin/Categories/UpdateMainCategories/{{$MainCategories->id}}" method="POST" class="form-horizontal">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Name Main Categories</label>
                                        <div class="col-sm-9">
                                            <input id="inputHorizontalSuccess" type="text" name="MainCategories" value="{{$MainCategories->MainCategories}}" class="form-control form-control-success"><small class="form-text">Main Categories has mother of Categories.</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-9 offset-sm-3">
                                            <input type="submit" value="Submit" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab corporis eius, explicabo facere fuga, in magnam maxime, natus non nostrum numquam odio odit quam recusandae totam vel veniam voluptas voluptates?</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet architecto at dolore doloremque itaque, minima molestiae nulla placeat quae quam ratione, sapiente, tempora? Consequatur corporis ipsam qui quisquam quod saepe?</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


