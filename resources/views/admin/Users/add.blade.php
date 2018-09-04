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
                <h2 class="no-margin-bottom">Users</h2>
            </div>
        </header>
        <ul class="breadcrumb">
            <div class="container-fluid">
                <li class="breadcrumb-item"><a href="DashBoard">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
            </div>
        </ul>
        <!-- Forms Section-->
        <section class="forms">
            <div class="container-fluid">
                <div class="row">
                    <!-- Basic Form-->
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
                                <h3 class="h4">Please incorrect all infomation of you!</h3>
                            </div>
                            <div class="card-body">
                                <form action="admin/Users/AddUsers" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Username</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="username" class="form-control" placeholder="Your Username">
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="email" placeholder="Email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Your Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="address" placeholder="Address" class="form-control">
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Select Auth</label>
                                        <div class="col-sm-9">
                                            <label class="checkbox-inline">
                                                <input id="inlineCheckbox1" name="level" checked type="radio" value="0"> Member
                                            </label>
                                            <label class="checkbox-inline">
                                                <input id="inlineCheckbox2" name="level" type="radio" value="1"> Adminstators
                                            </label>
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    <label class="col-sm-3 form-control-label">Chose a avatar</label>
                                    <input type="file" class="form-control" name="avatar">

                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 offset-sm-3">
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save User</button>
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

