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
        <ul class="breadcrumb">
            <div class="container-fluid">
                <li class="breadcrumb-item"><a href="DashBoard">DashBoard</a></li>
                <li class="breadcrumb-item active">Order Details</li>
            </div>
        </ul>
        <!-- Forms Section-->
        <section class="forms">
            <div class="container-fluid">
                <div class="row">
                    <!-- Basic Form-->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-close">
                                <div class="dropdown">
                                    <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                    <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                                </div>
                            </div>
                            @include('layouts.alert')
                            <div class="card-body">
                                <h4>Details Item On Cart</h4>
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Image Product</th>
                                        <th>Name Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($BigStoreOrder as $Big)
                                        @foreach($Product as $P)
                                            <?php if($P->id == $Big->idProduct){ ?>
                                        <form action="admin/Categories/ChangeMainCategories" method="POST">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}" >
                                            <input type="text" style="display: none" name="id" value="{{$Big->id}}">
                                            <tr>
                                                <td><img height="100px" width="100px" src="upload/Product/{{$P->ImgProduct}}" alt=""></td>
                                                <td>{{$P->NameProduct}}</td>
                                                <td>{{$Big->Qty}}</td>
                                                <td>${{$Big->Price}}</td>

                                            </tr>
                                        </form>
                                            <?php } ?>
                                            @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                                @foreach($BG as $bg)
                                    <form action="admin/BigStoreOrder/Update/{{$bg->id}}" method="POST">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        Being delive<input class="form-control" <?php if($bg->StateOrder == 0){echo "checked";}else{} ?> type="radio" name="StateOrder" value="0">
                                        Delivered<input class="form-control" <?php if($bg->StateOrder == 1){echo "checked";}else{} ?> type="radio" name="StateOrder" value="1">
                                        <input class="form-control" type="submit" value="ChangeCart">
                                    </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Horizontal Form-->
                </div>
            </div>
        </section>
        <!-- Page Footer-->
    </div>
@endsection

