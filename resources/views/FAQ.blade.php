<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 7/17/18
 * Time: 9:47 AM
 */
?>
@extends('index')

@section('content')

    <!--banner-->
    <div class="banner-top">
        <div class="container">
            <h3 >Faqs</h3>
            <h4><a href="index">Home</a><label>/</label>Faqs</h4>
            <div class="clearfix"> </div>
        </div>
    </div>

    <!-- faqs -->
    <div class="faq-w3 main-grid-border">
        <div class="container">

            <div class="spec ">
                <h3>FAQs</h3>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
            </div>
            <div class="panel-group" id="accordion">

                <!-- Panel FAQ -->
                @foreach($UserQuestion as $UQ)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title" data-toggle="collapse" data-target="#collapseOne">
                            <span><img src="upload/Avatar/{{$UQ->avatar}}" height="30px" width="30px" alt="{{$UQ->username}}">.</span> <?php echo trimText($UQ->Question,70); ?>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                            <!-- User Question -->
                            <p>{!! $UQ->Question !!}</p>
                            <p>{{$UQ->created_at}}</p>
                        </div>
                        <h4 class="panel-title" data-toggle="collapse" data-target="#collapseOne">
                            <span>Answers</span>
                        </h4>
                        @foreach($Answers as $A)
                            <?php if($UQ->id == $A->idQuestion){ ?>
                        <div class="panel-body">
                            <!-- User Question -->
                            <p>{!! $A->Answers !!}</p>
                            <p>{{$A->created_at}}</p>
                        </div>
                            <?php } ?>
                        @endforeach
                        <?php
                            if(\Illuminate\Support\Facades\Auth::check()){
                                if(\Illuminate\Support\Facades\Auth::user()->level == 1){
                                ?>
                        @include('layouts.alert')
                        <form action="FAQ/{{$UQ->idQuestion}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <textarea name="Answers" class="form-control ckeditor" id="" cols="20" rows="5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, consectetur distinctio eum facilis nobis officia possimus ullam! Animi consequuntur doloremque, earum eos fuga fugit labore minus officia quia, ratione reiciendis!</textarea>
                            <input type="submit" class="form-control" value="Answers">
                            <input type="hidden" name="idUser" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                        </form>
                                <?php
                                }
                            }else{

                        }
                        ?>
                    </div>
                </div>
                @endforeach
                <!-- End Panel FAQ -->
                {!! $UserQuestion->render() !!}
            </div>
        </div>
    </div>
    <!-- // Terms of use -->


@endsection
