<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 7/11/18
 * Time: 9:10 PM
 */
?>
<div class="footer">
    <div class="container">
        <div class="col-md-3 footer-grid">
            <h3>About Us</h3>
            <p>
                BigStore is a mini supermarket operating on many countries, we provide all essential products for home appliances such as: canned food, fresh food, fast food etc..</p>
        </div>
        <div class="col-md-3 footer-grid ">
            <h3>Menu</h3>
            <ul>
                <li><a href="index">Home</a></li>
                @foreach($MainCategories as $MC)
                <li><a href="MainCategories/{{$MC}}">{{$MC->MainCategories}}</a></li>
                @endforeach
                <li><a href="Contact">Contact</a></li>
            </ul>
        </div>
        <div class="col-md-3 footer-grid ">
            <h3>Customer Services</h3>
            <ul>
                <li><a href="ShoppingCart">Shipping</a></li>
                <li><a href="FAQ">Faqs</a></li>
                <li><a href="Contact">Contact</a></li>
                <li><a href="Offers">Offers</a></li>
            </ul>
        </div>
        <div class="col-md-3 footer-grid">
            <h3>My Account</h3>
            <ul>
                <?php if(\Illuminate\Support\Facades\Auth::check()){
                    ?>
                    <li><a href="Logout"><?php echo \Illuminate\Support\Facades\Auth::user()->username; ?></a></li>
                <?php
                }else{ ?>
                <li><a href="Login">Login</a></li>
                <li><a href="Register">Register</a></li>
                <?php } ?>
                <li><a href="Wishlist">Wishlist</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
        <div class="footer-bottom">
            <h2 ><a href="index"><b>T<br>H<br>E</b>Big Store<span>The Best Supermarket</span></a></h2>
            <p class="fo-para">
                BigStore is a mini supermarket operating on many countries, we provide all essential products for home appliances such as: canned food, fresh food, fast food etc.</p>
            <ul class="social-fo">
                <li><a href="#" class=" face"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#" class=" twi"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#" class=" pin"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                <li><a href="#" class=" dri"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
            </ul>
            <div class=" address">
                <div class="col-md-4 fo-grid1">
                    <p><i class="fa fa-home" aria-hidden="true"></i>Ngoc Truc Stret, Nam Tu Liem County,  Ha Noi Capital in Viet Nam</p>
                </div>
                <div class="col-md-4 fo-grid1">
                    <p><i class="fa fa-phone" aria-hidden="true"></i>+841693803548 , +841296438768</p>
                </div>
                <div class="col-md-4 fo-grid1">
                    <p><a href="mailto:info@example.com"><i class="fa fa-envelope-o" aria-hidden="true"></i>BigStore@gmail.com</a></p>
                </div>
                <div class="clearfix"></div>

            </div>
        </div>
        <div class="copy-right">
            <p> &copy; 2018-2019 Big store. All Rights Reserved | Design by  <a href="https://www.facebook.com/profile.php?id=100013698812957"> LongNguyen</a></p>
        </div>
    </div>
</div>
