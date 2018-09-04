<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 5/24/18
 * Time: 3:37 PM
 */
?>
@extends('admin.DashBoard')
@section('content')
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
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
                            <h3 class="h4">Main Categories / </h3>
                            <h3 class="h4"><a href="admin/Categories/AddMainCategories"> Add</a></h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <p>click btn # as show sub categories</p>
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Main Categoties Name</th>
                                    <th>Created Time</th>
                                    <th>Updated Time</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($MainCategories as $MC)
                                    <tr>
                                        <th scope="row">
                                            <input type="button" value="{{$MC->id}}" onclick="CallCategories(<?php echo $MC->id; ?>)">
                                        </th>
                                        <td>{{$MC->MainCategories}}</td>
                                        <td>{{$MC->created_at}}</td>
                                        <td>{{$MC->updated_at }}</td>
                                        <td><a href="admin/Categories/UpdateMainCategories/{{$MC->id}}">Update</a></td>
                                        <td><a href="admin/Categories/DeleteMainCategories/{{$MC->id}}">Delete</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$MainCategories->render()}}
                    </div>
                </div>

                <div class="col-lg-6" id="showCategories">
                    <!-- Cho nay de load du lieu nhan duoc tu Ajax -->
                </div>
            </div>
        </div>
    </section>
    @endsection
