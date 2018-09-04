<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 7/13/18
 * Time: 10:14 AM
 */
?>
@extends('index')

@section('content')

    <!--content-->
    <div class="kic-top ">
        <div class="container ">
            <div class="kic ">
                <h3>Popular Categories</h3>

            </div>
            @foreach($Categories as $C)
                @foreach($Banner as $B)
                    <?php if($C->id == $B->idMainCategories){ ?>
            <div class="col-md-4 kic-top1">
                <a href="MainCategories/{{$C->id}}">
                    <img src="upload/Banner/{{$B->Banner}}" class="img-responsive" alt="">
                </a>
                <h6>Dal</h6>
                <p>Nam libero tempore</p>
            </div>
                    <?php } ?>
                @endforeach
            @endforeach
        </div>
    </div>

    <!--content-->
    <div class="product">
        <div class="container">
            <div class="spec ">
                <h3>Products</h3>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
            </div>
            <div class=" con-w3l agileinf">
                @foreach($Product as $P)
                <div class="col-md-3 pro-1">
                    <div class="col-m">
                        <a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img">
                            <img src="upload/Product/{{$P->ImgProduct}}" class="img-responsive" alt="">
                        </a>
                        <div class="mid-1">
                            <div class="women">
                                <h6><a href="Single/{{$P->id}}">{{$P->NameProduct}}</h6>
                            </div>
                            <div class="mid-2">
                                <p ><label>${{$P->Price}}</label><em class="item_price">$<?php echo ($P->Price/100)*(100-$P->Sales); ?></em></p>
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="add">
                                <button onclick="getAddItemToCart({{$P->id}})" class="btn btn-default">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{ $Product->render() }}
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- End content -->

@endsection
