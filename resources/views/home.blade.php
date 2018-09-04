<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 7/11/18
 * Time: 9:11 PM
 */
?>

@extends('index')
@section('content')
    {{--Video cua content--}}
    @include('layouts.video')

    @include('JSFrame.JSVideo')

<!-- Begin Content -->
@include('layouts.alert')
<div class="content-top ">
    <div class="container ">
        <div class="spec ">
            <h3>Special Offers</h3>
            <div class="ser-t">
                <b></b>
                <span><i></i></span>
                <b class="line"></b>
            </div>
        </div>
        <div class="tab-head ">
            <nav class="nav-sidebar">
                <ul class="nav tabs ">
                    <?php
                        /*
                         * Tao 1 bien ngau nhien de lay duoc danh muc 1 cach ngau nhien thuoc count cua Categories
                         * */
                        $i=1;
                    ?>
                    @foreach($Categories as $C)
                            <li class="<?php if($i == 1){echo "active";}else{} ?>"><a href="#tab{{$i}}" data-toggle="tab">{{$C->Categories}}</a></li>
                        <?php $i++; ?>
                    @endforeach
                </ul>
            </nav>
            <div class=" tab-content tab-content-t ">
                <div class="tab-pane active text-style" id="tab1">
                    <div class=" con-w3l">
                        <?php
                            foreach ($Product as $P){
                                if($P->idCategories == 1){
                        ?>
                        <div class="col-md-3 col-lg-offset-4" style="margin-left:38%;">
                            <div class="col-m">
                                <a href="Single/{{$P->id}}" data-toggle="modal" data-target="#myModal1" class="offer-img">
                                    <img src="upload/Product/{{$P->ImgProduct}}" class="img-responsive" alt="">
                                    <div class="offer"><p><span>Offer</span></p></div>
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="Single/{{$P->id}}">{{$P->NameProduct}}</a>(1 kg)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p ><label>${{$P->Price}}</label><em class="item_price">$<?php echo ($P->Price/100)*(100-$P->Sales);  ?></em></p>
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
                        <?php
                                }
                            }
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="tab-pane  text-style" id="tab2">
                    <div class=" con-w3l">
                        <?php
                        foreach ($Product as $P){
                        if($P->idCategories == 2){
                        ?>
                        <div class="col-md-3 col-lg-offset-4" style="margin-left:38%;">
                            <div class="col-m">
                                <a href="Single/{{$P->id}}" data-toggle="modal" data-target="#myModal1" class="offer-img">
                                    <img src="upload/Product/{{$P->ImgProduct}}" class="img-responsive" alt="">
                                    <div class="offer"><p><span>Offer</span></p></div>
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="Single/{{$P->id}}">{{$P->NameProduct}}</a>(1 kg)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p ><label>${{$P->Price}}</label><em class="item_price">$<?php echo ($P->Price/100)*(100-$P->Sales);  ?></em></p>
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
                        <?php
                        }
                        }
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="tab-pane text-style" id="tab3">
                    <div class=" con-w3l">
                        <?php
                        foreach ($Product as $P){
                        if($P->idCategories == 3){
                        ?>
                        <div class="col-md-3 col-lg-offset-4" style="margin-left:38%;">
                            <div class="col-m">
                                <a href="Single/{{$P->id}}" data-toggle="modal" data-target="#myModal1" class="offer-img">
                                    <img src="upload/Product/{{$P->ImgProduct}}" class="img-responsive" alt="">
                                    <div class="offer"><p><span>Offer</span></p></div>
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="Single/{{$P->id}}">{{$P->NameProduct}}</a>(1 kg)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p ><label>${{$P->Price}}</label><em class="item_price">$<?php echo ($P->Price/100)*(100-$P->Sales);  ?></em></p>
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
                        <?php
                        }
                        }
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="tab-pane  text-style" id="tab4">
                    <div class=" con-w3l">
                        <?php
                        foreach ($Product as $P){
                        if($P->idCategories == 4){
                        ?>
                        <div class="col-md-3 col-lg-offset-4" style="margin-left:38%;">
                            <div class="col-m">
                                <a href="Single/{{$P->id}}" data-toggle="modal" data-target="#myModal1" class="offer-img">
                                    <img src="upload/Product/{{$P->ImgProduct}}" class="img-responsive" alt="">
                                    <div class="offer"><p><span>Offer</span></p></div>
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="Single/{{$P->id}}">{{$P->NameProduct}}</a>(1 kg)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p ><label>${{$P->Price}}</label><em class="item_price">$<?php echo ($P->Price/100)*(100-$P->Sales);  ?></em></p>
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
                        <?php
                        }
                        }
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<!--content-->
<div class="content-mid">
    <div class="container">

        <div class="col-md-4 m-w3ls">
            <div class="col-md1 ">
                <a href="MainCategories/1">
                    <img src="images/co1.jpg" class="img-responsive img" alt="">
                    <div class="big-sa">
                        <h6>New Collections</h6>
                        <h3>Season<span>ing </span></h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority </p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 m-w3ls1">
            <div class="col-md ">
                <a href="MainCategories/2">
                    <img src="images/co.jpg" class="img-responsive img" alt="">
                    <div class="big-sale">
                        <div class="big-sale1">
                            <h3>Big <span>Sale</span></h3>
                            <p>It is a long established fact that a reader </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 m-w3ls">
            <div class="col-md2 ">
                <a href="MainCategories/3">
                    <img src="images/co2.jpg" class="img-responsive img1" alt="">
                    <div class="big-sale2">
                        <h3>Cooking <span>Oil</span></h3>
                        <p>It is a long established fact that a reader </p>
                    </div>
                </a>
            </div>
            <div class="col-md3 ">
                <a href="MainCategories/4">
                    <img src="images/co3.jpg" class="img-responsive img1" alt="">
                    <div class="big-sale3">
                        <h3>Vegeta<span>bles</span></h3>
                        <p>It is a long established fact that a reader </p>
                    </div>
                </a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!--content-->
<!-- Carousel
  ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php $numSlide = 0; ?>
        <li data-target="#myCarousel" data-slide-to="0" ></li>
        <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">

        @foreach($Slide as $S)
        <div class="item <?php if($numSlide == 1){echo "active";}else{} ?>">
            <a href="MainCategories/1"> <img class="first-slide" src="upload/Slide/{{$S->Slide}}" alt="First slide"></a>
        </div>
            <?php $numSlide++; ?>
        @endforeach
    </div>
</div><!-- /.carousel -->

<div class="product">
    <div class="container">
        <div class="spec ">
            <h3>Special Offers</h3>
            <div class="ser-t">
                <b></b>
                <span><i></i></span>
                <b class="line"></b>
            </div>
        </div>
        <div class=" con-w3l">
            @foreach($SpecialOffers as $SO)
            <div class="col-md-3 pro-1">
                <div class="col-m">
                    <a href="Single/{{$SO->id}}" data-toggle="modal" data-target="#myModa{{$SO->id}}" class="offer-img">
                        <img src="upload/Product/{{$SO->ImgProduct}}" class="img-responsive" alt="">
                    </a>
                    <div class="mid-1">
                        <div class="women">
                            <h6><a href="Single/{{$SO->id}}">{{$SO->NameProduct}}</a></h6>
                        </div>
                        <div class="mid-2">
                            <p ><label>${{$SO->Price}}</label><em class="item_price">$<?php echo ($SO->Price/100)*(100-$SO->Sales);  ?></em></p>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="add add-2">
                            <button onclick="getAddItemToCart({{$SO->id}})" class="btn btn-default">
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

<!-- End Content -->
@endsection