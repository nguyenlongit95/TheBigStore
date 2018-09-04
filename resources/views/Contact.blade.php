<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 7/14/18
 * Time: 3:46 PM
 */
?>
@extends('index')

@section('content')
    <!--banner-->
    <div class="banner-top">
        <div class="container">
            <h3 >Contact</h3>
            <h4><a href="index">Home</a><label>/</label>Contact</h4>
            <div class="clearfix"> </div>
        </div>
    </div>

    <!-- contact -->
    <div class="contact">
        <div class="container">
            <div class="spec ">
                <h3>Contact</h3>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
            </div>
            <div class=" contact-w3">
                <div class="col-md-5 contact-right">
                    <img src="images/cac.jpg" class="img-responsive" alt="">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4109.534774544524!2d105.77186534987875!3d20.989595989170347!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345337c82e1d37%3A0x366afa47c2ec5a9a!2zbMOgbmcgTmfhu41jIFRy4bulYywgxJDhuqFpIE3hu5csIE5hbSBU4burIExpw6ptLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1531558556241" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-md-7 contact-left">
                    <h4>Contact Information</h4>
                    <p>
                        BigStore is a mini supermarket operating on many countries, we provide all essential products for home appliances such as: canned food, fresh food, fast food etc.</p>
                    </p>
                    <ul class="contact-list">
                        <li> <i class="fa fa-map-marker" aria-hidden="true"></i> Ngoc Truc Stret, Nam Tu Liem County,  Ha Noi Capital in Viet Nam</li>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:example@mail.com">BigStore@gmail.com</a></li>
                        <li> <i class="fa fa-phone" aria-hidden="true"></i>+84169 380 3548</li>
                    </ul>
                    <div id="container">
                        <!--Horizontal Tab-->
                        <div id="parentHorizontalTab">
                            <ul class="resp-tabs-list hor_1">
                                <li><i class="fa fa-envelope" aria-hidden="true"></i></li>
                                <li> <i class="fa fa-map-marker" aria-hidden="true"></i> </span></li>
                                <li> <i class="fa fa-phone" aria-hidden="true"></i></li>
                            </ul>
                            <div class="resp-tabs-container hor_1">
                                <div>
                                    @include('layouts.alert')
                                    <form action="Contact" method="post">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="text" value="Name" name="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
                                        <input type="email" value="Email" name="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                                        <textarea name="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
                                        <div class="g-recaptcha" data-sitekey="Site key"></div>
                                        <input type="submit" value="Submit" >
                                    </form>
                                </div>
                                <div>
                                    <div class="map-grid">
                                        <h5>Our Branches</h5>
                                        <ul>
                                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i>Ngoc Truc Stret, Nam Tu Liem County,  Ha Noi Capital in Viet Nam</li>
                                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i>Km 10 Nguyen Trai Stret, Thanh Xuan County,  Ha Noi Capital in Viet Nam</li>
                                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i>756 global Place, Mosscow in Russia.</li>
                                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i>889 diamond street, USA.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <div class="map-grid">
                                        <h5>Contact Me Through</h5>
                                        <ul>
                                            <li>Mobile No : +84169 380 3548</li>
                                            <li>Office No : +123 222 2222</li>
                                            <li>Home No : +123 456 7890</li>
                                            <li>Fax No : +123 456 7890</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Plug-in Initialisation-->
                    <script type="text/javascript">
                        $(document).ready(function() {
                            //Horizontal Tab
                            $('#parentHorizontalTab').easyResponsiveTabs({
                                type: 'default', //Types: default, vertical, accordion
                                width: 'auto', //auto or any width like 600px
                                fit: true, // 100% fit in a container
                                tabidentify: 'hor_1', // The tab groups identifier
                                activate: function(event) { // Callback function if tab is switched
                                    var $tab = $(this);
                                    var $info = $('#nested-tabInfo');
                                    var $name = $('span', $info);
                                    $name.text($tab.text());
                                    $info.show();
                                }
                            });

                            // Child Tab
                            $('#ChildVerticalTab_1').easyResponsiveTabs({
                                type: 'vertical',
                                width: 'auto',
                                fit: true,
                                tabidentify: 'ver_1', // The tab groups identifier
                                activetab_bg: '#fff', // background color for active tabs in this group
                                inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
                                active_border_color: '#c1c1c1', // border color for active tabs heads in this group
                                active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
                            });

                            //Vertical Tab
                            $('#parentVerticalTab').easyResponsiveTabs({
                                type: 'vertical', //Types: default, vertical, accordion
                                width: 'auto', //auto or any width like 600px
                                fit: true, // 100% fit in a container
                                closed: 'accordion', // Start closed if in accordion view
                                tabidentify: 'hor_1', // The tab groups identifier
                                activate: function(event) { // Callback function if tab is switched
                                    var $tab = $(this);
                                    var $info = $('#nested-tabInfo2');
                                    var $name = $('span', $info);
                                    $name.text($tab.text());
                                    $info.show();
                                }
                            });
                        });
                    </script>
                    <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#horizontalTab').easyResponsiveTabs({
                                type: 'default', //Types: default, vertical, accordion
                                width: 'auto', //auto or any width like 600px
                                fit: true   // 100% fit in a container
                            });
                        });
                    </script>
                    <!-- //tabs -->
                    <!-- smooth scrolling -->
                    <script type="text/javascript">
                        $(document).ready(function() {
                            /*
                                var defaults = {
                                containerID: 'toTop', // fading element id
                                containerHoverID: 'toTopHover', // fading element hover id
                                scrollSpeed: 1200,
                                easingType: 'linear'
                                };
                            */
                            $().UItoTop({ easingType: 'easeOutQuart' });
                        });
                    </script>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- //contact -->
@endsection
