<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 7/17/18
 * Time: 3:47 PM
 */
?>

@extends('index')
@section('content')
    <div class="container" style="margin-top:1%;">
    <table class="table">
        <tr>
            <th class="t-head head-it ">Products</th>
            <th class="t-head">Price</th>
            <th class="t-head">Purchase</th>
        </tr>
        @foreach($WishList as $WL)
            @foreach($Product as $P)
                <?php if($WL->idProduct == $P->id){ ?>
        <tr class="cross">
            <td class="ring-in t-data">
                <a href="Single/{{$P->id}}" class="at-in">
                    <img height="100px" width="100px" src="upload/Product/{{$P->ImgProduct}}" class="img-responsive" alt="{{$P->NameProduct}}">
                </a>
                <div class="sed">
                    <h5>{{$P->NameProduct}}</h5>
                </div>
                <div class="clearfix"> </div>
                <div class="close1" onclick="deleteItemWishList({{$P->id}});"><i class="fa fa-times" aria-hidden="true"></i></div>
            </td>
            <td class="t-data"><span style="text-decoration: line-through;">${{$P->Price}}</span> - $<?php echo ($P->Price/100)*(100-$P->Sales); ?></td>

            <td>
            <div class="add-to" style="margin-top:15%;">
                <button onclick="getAddItemToCart({{$P->id}})" class="btn btn-default">
                    Add to Cart
                </button>
            </div>
            </td>
        </tr>
                <?php }else{} ?>
             @endforeach
        @endforeach
    </table>
    </div>
@endsection