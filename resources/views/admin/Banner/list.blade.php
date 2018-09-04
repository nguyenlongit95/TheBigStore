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
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-close">
                            <div class="dropdown">
                                <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                            </div>
                        </div>
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Banner / </h3>
                            <h3 class="h4"><a href="admin/Banner/AddBanner"> Add</a></h3>
                        </div>
                        <div class="card-body">
                            @include('admin.layout.AlertFile')
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Banner</th>
                                    <th>Created Time</th>
                                    <th>Updated Time</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Banner as $B)
                                    <tr>
                                        <td>{{$B->id}}</td>
                                        <td><img height="100px" width="100px" src="upload/Banner/{{$B->Banner}}" alt="{{$B->Banner}}"></td>
                                        <td>{{ $B->created_at}}</td>
                                        <td>{{ $B->updated_at }}</td>
                                        <td><a href="admin/Banner/UpdateBanner/{{$B->id}}">Update</a></td>
                                        <td><a href="admin/Banner/DeleteBanner/{{$B->id}}">Delete</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                {{ $Banner->render() }}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
