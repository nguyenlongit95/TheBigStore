<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 7/7/18
 * Time: 5:53 PM
 */
?>
@extends('admin.DashBoard')
@section('content')
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">Change Users</h2>
            </div>
        </header>
        <ul class="breadcrumb">
            <div class="container-fluid">
                <li class="breadcrumb-item"><a href="/admin/Users/List">Home</a></li>
                <li class="breadcrumb-item active">User</li>
            </div>
        </ul>
        <!-- Forms Section-->
        <section class="forms">
            <div class="container-fluid">
                <div class="row">
                    <!-- Horizontal Form-->
                    <div class="col-lg-12">
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
                                <form action="admin/Users/ChangeUsers/{{$user->id}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Username</label>
                                        <div class="col-sm-9">
                                            {{$user->username}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Your Address</label>
                                        <div class="col-sm-9">
                                            <input id="inputHorizontalSuccess" type="text" name="address" value="{{$user->address}}" class="form-control form-control-success"><small class="form-text">Main Categories has mother of Categories.</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input id="inputHorizontalSuccess" type="text" name="email" value="{{$user->email}}" class="form-control form-control-success"><small class="form-text">Main Categories has mother of Categories.</small>
                                        </div>
                                    </div>
                                    Avatar: <img src="upload/Avatar/{{$user->avatar}}" alt="{{$user->username}}" height="100px" width="100px">
                                    <br>
                                    <label class="col-sm-3 form-control-label">Chose a avatar</label>
                                    <input type="file" class="form-control" name="avatar">

                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Select Auth</label>
                                        <div class="col-sm-9">
                                            <label class="checkbox-inline">
                                                <input id="inlineCheckbox1" name="level" <?php if($user->level == 0){echo "checked";}else{} ?> checked type="radio" value="0"> Member
                                            </label>
                                            <label class="checkbox-inline">
                                                <input id="inlineCheckbox2" name="level" <?php if($user->level == 1){echo "checked";}else{} ?> type="radio" value="1"> Adminstators
                                            </label>
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
