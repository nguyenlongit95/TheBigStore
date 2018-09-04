<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 5/23/18
 * Time: 4:14 PM
 */
?>
<nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="upload/Avatar/<?php echo \Illuminate\Support\Facades\Auth::user()->avatar; ?>" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h4">BigStore</h1>
            <p><?php echo \Illuminate\Support\Facades\Auth::user()->username; ?></p>
        </div>
    </div>
    <!-- End Sidebar Header -->
    <!-- Sidebar Navidation Menus -->
    <span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="active"> <a href="admin/DashBoard"><i class="icon-home"></i>Home</a></li>
        <li><a href="#dashvariants" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Main Ingredient </a>
            <ul id="dashvariants" class="collapse list-unstyled">
                <li><a href="admin/Categories/List">Category & Main Category</a></li>
                <li><a href="admin/Product/List">Product</a></li>
                <li><a href="admin/Users/List">Users</a></li>
                <li><a href="admin/Contact/List">Contact</a></li>
                <li><a href="admin/WishList/List">WishList</a></li>
                <li><a href="admin/BigStoreOrder/List">BigStore Order</a></li>
            </ul>
        </li>
    </ul>
    <span class="heading">Statistics</span>
    <ul class="list-unstyled">
        <li> <a href="admin/FAQ/List"> <i class="icon-interface-windows"></i>Faqs </a></li>
        <!-- Extras se tien hanh quan ly cac thanh phan nang cao cua wen(About,Contact,Email...) -->
    </ul>
    </ul><span class="heading">Extras</span>
    <ul class="list-unstyled">
        <li> <a href="admin/Info/List"> <i class="icon-flask"></i>Info Of Site </a></li>
        <li> <a href="admin/Linked/List"> <i class="icon-mail"></i>Linked </a></li>
        <li> <a href="admin/Slide/List"> <i class="icon-picture"></i>Slider </a></li>
        <li> <a href="admin/Banner/List"> <i class="icon-picture"></i>Banner </a></li>
    </ul>
</nav>
