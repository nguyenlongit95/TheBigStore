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
                            <h3 class="h4">Banner /  </h3>
                            <h3 class="h4">
                                <form action="admin/Slide/AddSlide" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                     <input type="file" name="Slide">
                                     <input type="submit" value="Add New Slide">
                                </form>
                            </h3>
                        </div>
                        <div class="card-body">
                            @include('admin.layout.AlertFile')
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Slider</th>
                                    <th>Created Time</th>
                                    <th>Updated Time</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Slide as $S)
                                    <tr>
                                        <td>{{$S->id}}</td>
                                        <td><img height="100px" width="100px" src="upload/Slide/{{$S->Slide}}" alt="{{$S->Slide}}"></td>
                                        <td>{{ $S->created_at}}</td>
                                        <td>{{ $S->updated_at }}</td>
                                        <td><a href="admin/Slide/DeleteSlide/{{$S->id}}">Delete</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                {{ $Slide->render() }}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
