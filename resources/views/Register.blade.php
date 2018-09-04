<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 7/14/18
 * Time: 9:24 PM
 */
?>
@extends('index')
@section('content')
    <!--banner-->
    <div class="banner-top">
        <div class="container">
            <h3 >Register</h3>
            <h4><a href="index.html">Home</a><label>/</label>Register</h4>
            <div class="clearfix"> </div>
        </div>
    </div>

    <!--login-->

    <div class="login">
        @include('layouts.alert')
        <div class="main-agileits">
            <div class="form-w3agile form1">
                <h3>Register</h3>
                <form action="Register" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="key">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input  type="text" value="Username" name="username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" required="">
                        <div class="clearfix"></div>
                    </div>
                    <div class="key">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input type="text" value="Email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                        <div class="clearfix"></div>
                    </div>
                    <div class="key">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input type="password" value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
                        <div class="clearfix"></div>
                    </div>
                    <div class="key">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input  type="password" value="Confirm Password" name="ConfirmPassword" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Confirm Password';}" required="">
                        <div class="clearfix"></div>
                    </div>
                    <div class="key">
                        <i class="fas fa-map-marker" aria-hidden="true"></i>
                        <input type="text" value="Address" name="address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your address';}" required="">
                        <div class="clearfix"></div>
                    </div>
                    Chose a image:
                    <input type="file" name="avatar" class="form-control">
                    <br>
                    <input type="submit" value="Submit">
                </form>
            </div>

        </div>
    </div>
    <!--footer-->
@endsection
