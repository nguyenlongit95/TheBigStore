<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 7/18/18
 * Time: 10:43 AM
 */
?>

@extends('index')
@section('content')

    <div class="" id="my-cart-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: block; padding-right: 0px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</h4>
                </div>
                <div class="modal-body">
                    @include('layouts.alert')
                    <table class="table table-hover table-responsive" id="my-cart-table">
                        <tbody>
                        @foreach($ShowCart as $SC)
                        <form action="ChangeCart" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <tr title="summary {{$SC->id}}" data-id="{{$SC->id}}" data-price="{{$SC->price}}">
                            <input type="hidden" name="rowId" value="{{$SC->rowId}}" >
                            <td class="text-center" style="width: 30px;"><img width="30px" height="30px" src="upload/Product/{{$SC->options->img}}"></td>
                            <td>{{$SC->name}}</td>
                            <td title="Unit Price">${{$SC->price}}</td>
                            <td title="Quantity"><input type="number" min="1" name="qty" style="width: 70px;" class="my-product-quantity" value="{{$SC->qty}}"></td>
                            <td title="Total" class="my-product-total">$<?php echo $SC->qty * $SC->price; ?></td>
                            <td title="Update from Cart" class="text-center" style="width: 30px;"><input type="submit" name="updateCart" class="btn btn-xs btn-success my-product-remove" value="V"></td>
                            <td title="Remove from Cart" class="text-center" style="width: 30px;"><input type="submit" name="updateCart" class="btn btn-xs btn-danger my-product-danger" value="X"></td>
                        </tr>
                        </form>
                        @endforeach
                        <tr>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td></td>
                            <td></td>
                            <td><strong id="my-cart-grand-total">${{$CartTotal}}</strong></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <?php if(\Illuminate\Support\Facades\Auth::check()){ ?>
                <p class="alert text-center" style="color:blue;">Customer Information</p>
                <form style="padding-left:20%;padding-right:20%;" class="form-group" action="SendOrder" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <label for="alert">Your Account:</label>
                    <input class="form-control" type="text" name="account" value="<?php echo \Illuminate\Support\Facades\Auth::user()->username; ?>">
                    <label for="alert">Your Name:</label>
                    <input class="form-control" type="text" value="Name" name="Name" required="">
                    <label for="alert">Your Email:</label>
                    <input class="form-control" type="text" name="email" value="<?php echo \Illuminate\Support\Facades\Auth::user()->email; ?>">
                    <label for="alert">Your Address:</label>
                    <textarea class="form-control" name="AddressShip" required=""><?php echo \Illuminate\Support\Facades\Auth::user()->address; ?></textarea>
                    <div class="modal-footer"><button type="submit" class="btn btn-default" data-dismiss="modal">Send Order</button></div>
                </form>
                <?php
                    }else{
                    ?>
                    <p class="alert" style="color:red;">Login to the system to be able to purchase</p>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>

@endsection
