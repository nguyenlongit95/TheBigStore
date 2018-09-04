<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 5/25/18
 * Time: 10:22 PM
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
                <h2 class="no-margin-bottom">Banner</h2>
            </div>
        </header>
        <ul class="breadcrumb">
            <div class="container-fluid">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Change a Banner</li>
            </div>
        </ul>
        <!-- Forms Section-->
        <section class="forms">
            <div class="container-fluid">
                <div class="row">
                    <!-- Horizontal Form-->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-close">
                                <div class="dropdown">
                                    <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                    <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                                </div>
                            </div>
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">Change a banner</h3>
                            </div>
                            <div class="card-body">
                                @include('admin.layout.AlertFile')
                                <p>Banner will belong to a mother category.</p>
                                <form action="admin/Banner/UpdateBanner/{{$Banner->Banner}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Chose a new image</label>
                                        <div class="col-sm-9">
                                            <input name="Banner" type="file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Current picture</label>
                                        <div class="col-sm-9">
                                            <img height="100px" width="100px" src="upload/Banner/{{$Banner->Banner}}" alt="{{$Banner->Banner}}">
                                            <input type="text" style="display: none;" name="CurrentImg" value="{{$Banner->Banner}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Select Mother Categories</label>
                                        <div class="col-sm-9">
                                            <select name="idMainCategories" class="form-control">
                                                @foreach($MainCategories as $MC)
                                                    <option <?php if($MC->id == $Banner->idMainCategories){ echo "Selected"; }else{} ?> value="{{$MC->id}}">{{$MC->MainCategories}}</option>
                                                @endforeach
                                            </select>
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
                </div>
            </div>
        </section>
    </div>
@endsection


