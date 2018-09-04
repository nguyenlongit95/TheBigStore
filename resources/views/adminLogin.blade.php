<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 7/14/18
 * Time: 9:57 PM
 */
?>
@include('layouts.alert')
<form action="AdminLogin" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="text" name="username" placeholder="Username Admin">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Go To Admin Area">
</form>
