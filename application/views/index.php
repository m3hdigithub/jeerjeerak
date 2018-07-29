<?php include_once 'header.php'; ?>


<div id="loader">
    <img src="static/image/loader.png">
</div>

<div id="main">

    <div class="container-fluid">

        <div class="main_item" id="item1">
            <div class="inter" id="inter1" onclick="item_fade_out_first()"><h1>قرعه کشی</h1></div>
            <div id="content1">
                <?php
                include_once "item1/panel.php";
                ?>
            </div>

        </div>

        <div class=" main_item" id="item2">
            <div class="inter" onclick="item_fade_out_center()" id="inter2">
                <!--   <span id="logo"><i class="fa fa-star"></i></span>-->
                <span id="logo"><img src="static/image/logo.png"></span>
                <h1>جیر جیرک</h1>
            </div>
            <div id="content2">
                <?php
                include_once "item2/ads.php";
                include_once "item2/map.php";
                ?>
            </div>
        </div>

        <div class="main_item " id="item3">
            <div class="inter" id="inter3" onclick="item_fade_out_last();">
                <h1>ثبت شغل / آگهی</h1>
            </div>
            <div id="content3">

                <?php
                include_once "item3/login_form.php";
                // include_once "item3/register_form.php";
                // include_once "item3/inter.php";
                //include_once "item3/panel.php";
                ?>
            </div>
        </div>

    </div>
</div>


<?php include_once 'footer.php'; ?>


