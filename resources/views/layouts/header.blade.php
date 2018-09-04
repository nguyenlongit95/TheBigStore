<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 7/11/18
 * Time: 9:08 PM
 */
?>
<div class="header">
    <div class="container">
        <div class="logo">
            <h1 ><a href="index"><b>T<br>H<br>E</b>Big Store<span>The Best Supermarket</span></a></h1>
        </div>
        <div class="head-t">
            <ul class="card">
                <li><a href="Wishlist" ><i class="fa fa-heart" aria-hidden="true"></i>Wishlist</a></li>
                @if(\Illuminate\Support\Facades\Auth::check())
                    @if(\Illuminate\Support\Facades\Auth::user()->level == 1)
                        <li><a href="Logout">
                            <img height="15px" width="15px" src="upload/Avatar/{{\Illuminate\Support\Facades\Auth::user()->avatar}}"> Logout </a> /
                            <a href="AdminLogin">Go To Admin Area</a></li>

                    @else
                        <li><img height="15px" width="15px" src="upload/Avatar/{{\Illuminate\Support\Facades\Auth::user()->avatar}}"><a href="Account/{{\Illuminate\Support\Facades\Auth::user()->id}}" >  {{\Illuminate\Support\Facades\Auth::user()->username}} </a>/ <a href="Logout" > Logout </a></li>
                    @endif
                    @else
                    <li><a href="Login" ><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
                    <li><a href="Register" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>
                @endif
                <li><a href="ShoppingCart" ><i class="fa fa-file-text-o" aria-hidden="true"></i>Order History</a></li>
                <li><a href="Contact" ><i class="fa fa-ship" aria-hidden="true"></i>Contact Us</a></li>
            </ul>
        </div>

        <div class="header-ri">
            <ul class="social-top">
                <li><a href="#" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a></li>
                <li><a href="#" class="icon twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a></li>
                <li><a href="#" class="icon pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i><span></span></a></li>
                <li><a href="#" class="icon dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i><span></span></a></li>
            </ul>
        </div>


        <div class="nav-top">
            <nav class="navbar navbar-default">

                <div class="navbar-header nav_2">
                    <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                </div>
                <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                    <ul class="nav navbar-nav ">
                        <li class=" active"><a href="index" class="hyper "><span>Home</span></a></li>
                        <!-- Hien thi categories o day -->
                        <?php $i=0; ?>
                        @foreach($MainCategories as $key=>$valueMainCategories)
                        <li class="dropdown ">
                            <a href="#" class="dropdown-toggle  hyper" data-toggle="dropdown" ><span>{{$valueMainCategories->MainCategories}}<b class="caret"></b></span></a>
                            <ul class="dropdown-menu multi">
                                <div class="row">
                                    @foreach($Categories as $key=>$valueCategories)
                                        <?php if($valueCategories->idMainCategories == $valueMainCategories->id){ ?>
                                    <div class="col-sm-3">
                                        <ul class="multi-column-dropdown">

                                            <li><a href="Product/{{$valueCategories->id}}"><i class="fa fa-angle-right" aria-hidden="true"></i>{{$valueCategories->Categories}}</a></li>

                                        </ul>
                                    </div>
                                        <?php } ?>
                                    @endforeach
                                    <div class="col-sm-3 w3l">
                                        @foreach($showBanner as $sB)
                                            <?php if($sB->idMainCategories == $valueMainCategories->id){ ?>
                                        <a href="MainCategories/{{$valueMainCategories->id}}"><img src="upload/Banner/{{$sB->Banner}}" class="img-responsive" alt=""></a>
                                            <?php break; }else{} ?>
                                        @endforeach
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </ul>
                        </li>
                            <?php $i++; ?>
                        @endforeach

                        <li><a href="Offers" class="hyper"> <span>Special Offer</span></a></li>
                    </ul>
                </div>
            </nav>
            <div class="cart" >
                <a href="ShoppingCart"><span class="fa fa-shopping-cart"><span class="badge ">{{$CartCount}}</span></span></a>
            </div>
            <div class="clearfix"></div>
        </div>

    </div>
</div>
<!---->
