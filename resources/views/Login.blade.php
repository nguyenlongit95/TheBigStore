<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 7/14/18
 * Time: 8:47 PM
 */
?>
@extends('index')
@section('content')
<!--banner-->
<div class="banner-top">
    <div class="container">
        <h3 >Login</h3>
        <h4><a href="index">Home</a><label>/</label>Login</h4>
        <div class="clearfix"> </div>
    </div>
</div>
<!--login-->

<div class="login">

    <div class="main-agileits">
        <div class="form-w3agile">
            <h3>Login</h3>
            @include('layouts.alert')
            <form action="Login" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="key">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <input type="text" placeholder="Username" name="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                    <div class="clearfix"></div>
                </div>
                <div class="key">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Password" name="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
                    <div class="clearfix"></div>
                </div>
                <input type="submit" value="Login">
            </form>
        </div>
        <div class="forg">
            <a href="#" class="forg-left">Forgot Password</a>
            <a href="Register" class="forg-right">Register</a>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection