<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 5/23/18
 * Time: 4:15 PM
 */
?>
@if(count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
            {{$err}}
        @endforeach
    </div>
@endif
@if(session('thong_bao'))
    <div class="alert alert-danger">
        {{session('thong_bao')}}
    </div>
@endif
