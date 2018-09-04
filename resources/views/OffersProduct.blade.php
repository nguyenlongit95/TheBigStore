<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 7/14/18
 * Time: 3:41 PM
 */
?>
@extends('index')

@section('content')

    <!--content-->
    <div class="product">
        <div class="container">
            <div class="spec ">
                <h3>All Products Offers</h3>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
            </div>
            <div class=" con-w3l agileinf">
                @foreach($OffersProduct as $P)
                    <div class="col-md-3 pro-1">
                        <div class="col-m">
                            <a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img">
                                <img src="upload/Product/{{$P->ImgProduct}}" class="img-responsive" alt="{{$P->NameProduct}}">
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
                {!! $OffersProduct->render() !!}
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- End content -->

@endsection
