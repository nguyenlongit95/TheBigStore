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
                                    <form action="admin/Categories/ChangeMainCategories" method="POST">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" >
                                        <input type="text" style="display: none" name="id" value="{{$MC->id}}">
                                    <tr>
                                        <th scope="row">
                                            <input type="radio" name="idMainCategories" value="{{$MC->id}}" onclick="CallCategories(<?php echo $MC->id; ?>)">
                                        </th>
                                        <td>{{$MC->MainCategories}}</td>
                                        <td>{{$MC->created_at}}</td>
                                        <td>{{ $MC->updated_at }}</td>
                                        <td><input type="submit" name="" value="Update"></td>
                                        <td><a href="#">Delete</a></td>
                                    </tr>
                                    </form>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" id="showCategories">
                    <div class="card">
                        <div class="card-close">
                            <div class="dropdown">
                                <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                            </div>
                        </div>
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Categories / </h3>
                            <h3 class="h4"><a href=""> Add</a></h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td><input type="submit" name="" value="Update"></td>
                                    <td><a href="#">Delete</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td><input type="submit" name="" value="Update"></td>
                                    <td><a href="#">Delete</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    <td><input type="submit" name="" value="Update"></td>
                                    <td><a href="#">Delete</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
