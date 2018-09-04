<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 5/24/18
 * Time: 9:37 PM
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
                <h2 class="no-margin-bottom">Add New Main Categories</h2>
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
                                <h3 class="h4">Add Main Categories</h3>
                            </div>
                            <div class="card-body">
                                <p>Add new categories, main categories has mother this categories, please select a main categories.</p>
                                <form action="admin/Categories/AddCategories" method="POST" class="form-horizontal">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Name This Categories</label>
                                        <div class="col-sm-9">
                                            <input id="inputHorizontalSuccess" type="text" name="Categories" placeholder="Add New Main Categories" class="form-control form-control-success"><small class="form-text">Main Categories has mother of Categories.</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Select Main Categories</label>
                                        <div class="col-sm-9">
                                        <SELECT class="form-control" name="idMainCategories">
                                            @foreach($MainCategories as $MC)
                                            <OPTION value="{{$MC->id}}">{{$MC->MainCategories}}</OPTION>
                                            @endforeach
                                        </SELECT>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Info Of Categories</label>
                                        <div class="col-sm-9">
                                            <textarea name="info" class="form-control" id="" cols="30" rows="10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.</textarea>
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


