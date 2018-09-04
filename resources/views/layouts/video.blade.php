<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 7/11/18
 * Time: 9:09 PM
 */
?>
<div data-vide-bg="video/video">
    <div class="container">
        <div class="banner-info">
            <h3>BigStore provides all products for the family, health care and counseling services for all homes. </h3>
            <div class="search-form">
                <form action="Search" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="text" placeholder="Search..." name="KeySearch">
                    <input type="submit" value=" " >
                </form>
            </div>
        </div>
    </div>
</div>
