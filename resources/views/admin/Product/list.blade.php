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
                <div class="col-lg-12" id="showCategories">
                    <div class="card">
                        <div class="card-close">
                            <div class="dropdown">
                                <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                            </div>
                        </div>
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Product / </h3>
                            <h3 class="h4"><a href="admin/Product/AddProduct"> Add</a></h3>
                        </div>
                        <div class="card-body">
                            @include('admin.layout.AlertFile')
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Info</th>
                                    <th>Price</th>
                                    <th>Sales</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if($Product == null){
                                       ?>
                                       No Products In Systems
                                <?php
                                    }else{
                                ?>
                                @foreach($Product as $P)
                                <tr>
                                    <th scope="row">{{$P->id}}</th>
                                    <td>{{$P->NameProduct}}</td>
                                    <td><?php echo trimText($P->Info,200); ?></td>
                                    <td>{{ $P->Price }}</td>
                                    <td>{{$P->Sales}}</td>
                                    <td><a href="admin/Product/UpdateProduct/{{$P->id}}">Update</a></td>
                                    <td><a href="admin/Product/DeleteProduct/{{$P->id}}">Delete</a></td>
                                </tr>
                                @endforeach
                                </tbody>
                                {{$Product->render()}}
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
