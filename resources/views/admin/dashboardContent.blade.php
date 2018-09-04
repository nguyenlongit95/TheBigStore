<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 5/23/18
 * Time: 4:18 PM
 */
?>
@extends('admin.DashBoard')
@section('content')
@include('admin.layout.DrawCharts')
<section class="dashboard-counts no-padding-bottom">
    @include('layouts.alert')
    <div class="container-fluid">
        <div class="row bg-white has-shadow">
            <!-- Item -->
            <div class="col-xl-3 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="icon-user"></i></div>
                    <div class="title"><span>All<br>Users</span>
                        <div class="progress">
                            <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                        </div>
                    </div>
                    <div class="number"><strong>{{$TotalUser}}</strong></div>
                </div>
            </div>
            <!-- Item -->
            <div class="col-xl-3 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="fas fa-shopping-cart"></i></div>
                    <div class="title"><span>Work<br>Orders</span>
                        <div class="progress">
                            <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                        </div>
                    </div>
                    <div class="number"><strong>{{$TotalOrder}}</strong></div>
                </div>
            </div>
            <!-- Item -->
            <div class="col-xl-3 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-green"><i class="fab fa-product-hunt"></i></div>
                    <div class="title"><span>All<br>Products</span>
                        <div class="progress">
                            <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                        </div>
                    </div>
                    <div class="number"><strong>{{$TotalProduct}}</strong></div>
                </div>
            </div>
            <!-- Item -->
            <div class="col-xl-3 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-orange"><i class="fas fa-compress"></i></div>
                    <div class="title"><span>All<br>Contact</span>
                        <div class="progress">
                            <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
                        </div>
                    </div>
                    <div class="number"><strong>{{$TotalContact}}</strong></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dashboard Header Section -->
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="row">
            <!-- Statistics -->
            <div class="statistics col-lg-3 col-12">
                <div class="statistic d-flex align-items-center bg-white has-shadow" style="padding: 20px 15px 25px;">
                    <div class="icon bg-red"><i class="fa fa-tasks"></i></div>
                    <div class="text"><strong>{{$TotalProduct}}</strong><br><small>Product</small></div>
                </div>
                <div class="statistic d-flex align-items-center bg-white has-shadow" style="padding: 20px 15px 25px;">
                    <div class="icon bg-green"><i class="fa fa-calendar-o"></i></div>
                    <div class="text"><strong>{{$TotalAnwers}}</strong><br><small>Answer</small></div>
                </div>
                <div class="statistic d-flex align-items-center bg-white has-shadow" style="padding: 20px 15px 25px;">
                    <div class="icon bg-orange"><i class="fa fa-paper-plane-o"></i></div>
                    <div class="text"><strong>{{$OrderDeliverd}}</strong><br><small>Delivered Order</small></div>
                </div>
            </div>
            <!-- Line Chart -->
            <div class="chart col-lg-6 col-12">
                <div class="line-chart bg-white d-flex align-items-center justify-content-center has-shadow">
                    <canvas id="lineCahrt"></canvas>
                </div>
            </div>
            <div class="chart col-lg-3 col-12">
                <!-- Bar Chart -->
                <div class="bar-chart has-shadow bg-white">
                    <div class="title"><strong class="text-violet">{{$TotalProduct}} Product</strong><br><small>Categories with the most products</small></div>
                    <canvas id="barChartHome"></canvas>
                </div>
                <!-- Numbers -->
                <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-green"><i class="fa fa-line-chart"></i></div>
                    <div class="text"><strong>~<?php $number = ($OrderDeliverd/$TotalOrder)*100; echo number_format($number); ?>%</strong><br><small>Order Send Success</small></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End DashBoard Header Section -->

<!-- Client Section -->
<section class="client no-padding-top">
    <div class="container-fluid">
        <div class="row">
            <!-- Work Amount  -->
            <div class="col-lg-4">
                <div class="work-amount card">
                    <div class="card-close">
                        <div class="dropdown">
                            <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                            <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3>Dounts Chart Order</h3><small>Order Deliverd / Order Details</small>
                        <div class="chart text-center">
                            <div class="text"><strong>{{$TotalOrder}}</strong><br><span>Orders</span></div>
                            <canvas id="pieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Client Profile -->
            <div class="col-lg-4">
                <div class="client card">
                    <div class="card-close">
                        <div class="dropdown">
                            <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                            <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <div class="client-avatar"><img src="upload/Avatar/{{\Illuminate\Support\Facades\Auth::user()->avatar}}" alt="..." class="img-fluid rounded-circle">
                            <div class="status bg-green"></div>
                        </div>
                        <div class="client-title">
                            <h3>{{\Illuminate\Support\Facades\Auth::user()->username}}</h3><span>Adminstator</span><a href="https://www.facebook.com/profile.php?id=100013698812957">Follow</a>
                        </div>
                        <div class="client-info">
                            <div class="row">
                                <div class="col-4"><strong>{{$TotalImg}}</strong><br><small>Photos</small></div>
                                <div class="col-4"><strong>{{$TotalSlide}}</strong><br><small>Slider</small></div>
                                <div class="col-4"><strong>{{$TotalAnwers}}</strong><br><small>Answers</small></div>
                            </div>
                        </div>
                        <div class="client-social d-flex justify-content-between"><a href="https://www.facebook.com/profile.php?id=100013698812957" target="_blank"><i class="fa fa-facebook"></i></a><a href="#" target="_blank"><i class="fa fa-twitter"></i></a><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a><a href="#" target="_blank"><i class="fa fa-instagram"></i></a><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></div>
                    </div>
                </div>
            </div>
            <!-- Total Overdue             -->
            <div class="col-lg-4">
                <div class="overdue card">
                    <div class="card-close">
                        <div class="dropdown">
                            <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                            <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3>Product Price</h3><small>The total number of products in the price range.</small>
                        <div class="number text-center" style="margin: 31px 0;">${{$ABGPrice}}</div>
                        <div class="chart">
                            <canvas id="lineChart1"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Client Section -->
        </div>
    </div>
</section>

@endsection
