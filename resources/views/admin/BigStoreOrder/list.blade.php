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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-close">
                            <div class="dropdown">
                                <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                            </div>
                        </div>
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">BigStore Order / List</h3>
                        </div>
                        @include('layouts.alert')
                        <div class="card-body">
                            <h4>Click the radio button to view the line item</h4>
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>TotalPrice</th>
                                    <th>Code Order</th>
                                    <th>Details</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($BigStoreOrder as $Big)
                                    <form action="admin/Categories/ChangeMainCategories" method="POST">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" >
                                        <input type="text" style="display: none" name="id" value="{{$Big->id}}">
                                    <tr>
                                        <td>{{$Big->Name}}</td>
                                        <td>${{$Big->TotalPrice}}</td>
                                        <td>{{$Big->CodeOrder}}</td>
                                        <td><a href="admin/BigStoreOrder/Details/{{$Big->id}}">Details</a></td>
                                        <td><a href="admin/BigStoreOrder/Delete/{{$Big->id}}">Delete</a></td>
                                    </tr>
                                    </form>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
