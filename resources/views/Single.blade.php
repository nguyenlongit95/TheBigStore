<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 7/16/18
 * Time: 9:38 AM
 */
?>

@extends('index')

@section('content')

    <!--banner-->
    <div class="banner-top">
        <div class="container">
            <h3 >{{$Product->NameProduct}}</h3>
            <h4><a href="index">Home</a><label>/Single</label></h4>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="single">
        <div class="container">
            <div class="single-top-main">
                <div class="col-md-5 single-top">
                    <div class="single-w3agile">

                        <div id="picture-frame">
                            <img src="upload/Product/{{$Product->ImgProduct}}" data-src="upload/Product/{{$Product->ImgProduct}}" alt="{{$Product->NameProduct}}" class="img-responsive"/>
                        </div>
                        <script src="js/jquery.zoomtoo.js"></script>
                        <script>
                            $(function() {
                                $("#picture-frame").zoomToo({
                                    magnify: 1
                                });
                            });
                        </script>



                    </div>
                </div>
                <div class="col-md-7 single-top-left ">
                    <div class="single-right">
                        <h3>{{$Product->NameProduct}}</h3>


                        <div class="pr-single">
                            <p class="reduced "><del>${{$Product->Price}}</del>$<?php echo ($Product->Price/100)*(100-$Product->Sales); ?></p>
                        </div>
                        <div class="block block-w3">
                            <div class="starbox small ghosting"> </div>
                        </div>
                        <p class="in-pa"> {!! $Product->Info !!} </p>
                        <ul class="social-top">
                            <li><a href="https://www.facebook.com/profile.php?id=100013698812957" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a></li>
                            <li><a href="#" class="icon twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a></li>
                            <li><a href="#" class="icon pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i><span></span></a></li>
                            <li><a href="#" class="icon dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i><span></span></a></li>
                        </ul>
                        <div class="add add-3">
                            <?php $idProductTemp = $Product->id -1; ?>
                            <button onclick="getAddItemToCart(<?php echo $idProductTemp; ?>)" class="btn btn-default">
                                Add to Cart
                            </button>
                        </div>
                        <?php if(\Illuminate\Support\Facades\Auth::check()){ ?>
                        <div class="add add-3">
                            <button class="btn btn-danger my-cart-btn my-cart-b" onclick="addItemToWishList({{$Product->id}})" >Add to WishList</button>
                        </div>
                        <?php }else{} ?>
                        <div class="clearfix"> </div>
                    </div>


                </div>
                <div class="clearfix"> </div>
            </div>


        </div>
    </div>
    <!---->
    <div class="content-top offer-w3agile">
        <div class="container ">
            <div class="spec ">
                <h3>Special Offers</h3>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
            </div>
            <div class=" con-w3l wthree-of">
                @foreach($ProductOffers as $PO)
                <div class="col-md-3 pro-1">
                    <div class="col-m">
                        <a href="#" data-toggle="modal" data-target="#myModal{{$PO->id}}" class="offer-img">
                            <img src="upload/Product/{{$PO->ImgProduct}}" class="img-responsive" alt="{{$PO->NameProduct}}">
                            <div class="offer"><p><span>Offer</span></p></div>
                        </a>
                        <div class="mid-1">
                            <div class="women">
                                <h6><a href="Single/{{$PO->id}}">{{$PO->NameProduct}}</a></h6>
                            </div>
                            <div class="mid-2">
                                <p ><label>${{$PO->Price}}</label><em class="item_price">$<?php echo ($PO->Price/100)*(100-$PO->Sales); ?></em></p>
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="add">
                                <button onclick="getAddItemToCart({{$PO->id}})" class="btn btn-danger">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!-- Hop thoai modal cho san pham, khi click vao hinh anh thi hien thi hop thoai nay -->
    @foreach($ProductOffers as $PO)
    <div class="modal fade" id="myModal{{$PO->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-info">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body modal-spa">
                    <div class="col-md-5 span-2">
                        <div class="item">
                            <img src="upload/Product/{{$PO->ImgProduct}}" class="img-responsive" alt="{{$PO->NameProduct}}">
                        </div>
                    </div>
                    <div class="col-md-7 span-1 ">
                        <h3>{{$PO->NameProduct}}</h3>
                        <p class="in-para"><?php echo trimText($PO->Info,30); ?> </p>
                        <div class="price_single">
                            <span class="reducedfrom "><del>${{$PO->Price}}</del> - $<?php echo ($PO->Price/100)*(100-$PO->Sales); ?></span>

                            <div class="clearfix"></div>
                        </div>
                        <h4 class="quick">Quick Overview:</h4>
                        <p class="quick_desc"> {!! $PO->Info !!}</p>
                        <div class="add-to">
                            <button onclick="getAddItemToCart({{$PO->id}})" class="btn btn-default">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
