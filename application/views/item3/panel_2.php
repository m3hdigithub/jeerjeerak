<?php
define('url_upload', 'upload');
define('URL', 'http://localhost/jirjirak/');
?>


<style>
    .h100 {
        height: 100%;
    }

    #tabs {
        height: 50px;
        width: 100%;
        background-color: #d8c16c
    }

    #tabs ul {
        padding: 0;
        margin: 0;
        list-style-type: none;
        height: 100%;
        float: right;
        width: 100%;
    }

    #tabs ul li {
        float: right;
        height: 100%;
        text-align: center;
        color: #000;
        font-size: 14px;
        font-weight: bold;
        display: flex;
        align-items: center;
        width: 16.66666667%;
        justify-content: center;
        transition: all 0.5s;
    }

    #tabs ul li {
        float: right;
        height: 100%;
        text-align: center;
        color: #000;
        font-size: 14px;
        font-weight: bold;
        display: flex;
        align-items: center;
        width: 16.66666667%;
        justify-content: center;
        transition: all 0.5s;
    }

    #tabs #pay_li {
        display: none;
        opacity: 0;
    }

    #tabs ul li.active {
        color: var(--red);
        background-color: rgba(150, 150, 150, 0.15);
    }

    #client_result {
        padding: 10px;
        float: right;
        height: 100%;
        border-bottom: 66px solid var(--yellow);;
    }

    #client_result section {
        position: relative;
        display: none;
        height: 100%;
    }

    #sec1 .goto_next {
        position: absolute;
        bottom: 0;
        width: 80%;
        left: 0;
        right: 0;
        margin: auto;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        background-color: #000;
    }

    #sec1 .goto_next button {
        font-size: 16px;
        font-weight: bold;
        cursor: not-allowed;
        background-color: transparent;
        border: none;
        outline: none;
        color: #655e5e;
    }

    #sec1 #ads_type {
        float: right;
        margin-top: 50px;
        height: 55px;
        background-color: var(--gray);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 5px;
        width: 100%;
    }

    #sec1 #category {
        float: right;
        margin-top: 50px;
        height: 55px;
        background-color: var(--gray);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 5px;
        width: 100%;
    }

    #sec1 .select_box_title {
        color: #fff;
        font-size: 13px;
    }

    #sec1 .text_show {
        position: relative;
        height: 100%;
        background-color: #fff;
        cursor: pointer;

    }

    #sec1 .text_show.active {
        background-color: var(--yellow);
    }

    #sec1 .text_show > ul {

        position: absolute;
        color: #fff;
        left: 0;
        right: 0;
        width: 100%;
        height: auto;
        top: 46px;
        padding: 0;
        margin: 0;
        list-style-type: none;
        display: none;
        z-index: 9999;
        box-shadow: 0px 4px 7px #949494;
    }

    #sec1 .text_show > ul > li {
        color: #fff;
        background-color: var(--yellow);
        padding: 7px;
        border-bottom: 1px solid var(--gray);
        position: relative;
    }

    #sec1 .text_show > ul > li span {
        display: block;
        color: var(--gray);
    }

    #sec1 .text_show > span {
        display: flex;
        height: 100%;
        align-items: center;
        justify-content: center;
        padding: 13px;
        color: var(--gray);;
    }

    #sec1 .text_show > i.fa {
        position: absolute;
        right: 3px;
        color: #fff;
        font-size: 17px;
        padding: 4px;
        background-color: #a77c23;
        border-radius: 5px;
        top: 10px;
    }

    #sec1 .text_show > ul > li > i {
        position: absolute;
        right: 3px;
        color: #fff;
        font-size: 17px;
        padding: 4px;
        background-color: #a77c23;
        border-radius: 5px;
        transition: all 0.5s;
        top: 5px;
    }

    #sec1 .text_show > ul > li > i.active {
        transform: Rotate(180deg);
        transition: all 0.5s;
    }

    #sec1 .text_show > ul > li > ul {
        display: none;
        padding: 0;
        margin: 10px 0;
        position: relative;
        top: 5px;
        width: 100%;
        height: auto;
    }

    #sec1 .text_show > ul > li > ul > li {
        color: #fff;
        background-color: var(--yellow);;
        padding: 7px;
        position: relative;
    }

    #sec2 .select_box_div {
        float: right;
        margin-top: 50px;
        width: 100%;
        height: 55px;
        display: flex;
        align-items: center;
        background-color: var(--gray);
        padding: 5px;
    }

    #sec2 .select_box_title {
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        height: 100%;
        width: 100%;
    }

    #sec2 .text_show {
        position: relative;
        height: 100%;
        background-color: #fff;
        cursor: pointer;
    }

    #sec2 .text_show > i.fa {
        position: absolute;
        right: 3px;
        color: #fff;
        font-size: 17px;
        padding: 4px;
        background-color: #a77c23;
        border-radius: 5px;
        top: 10px;
    }

    #sec2 .text_show > ul {
        position: absolute;
        color: #fff;
        left: 0;
        right: 0;
        width: 100%;
        height: auto;
        top: 46px;
        padding: 0;
        margin: 0;
        list-style-type: none;
        display: none;
        z-index: 9999;
        box-shadow: 0px 4px 7px #949494;
    }

    #sec2 .text_show > ul > li {
        color: #fff;
        background-color: var(--yellow);
        padding: 7px;
        border-bottom: 1px solid var(--gray);
        position: relative;
    }

    #sec2 .text_show.active {
        background-color: var(--yellow);
    }

    #sec2 .text_show > ul > li span {
        display: block;
        color: var(--gray);
    }

    #sec2 .text_show > span {
        display: flex;
        height: 100%;
        align-items: center;
        justify-content: center;
        padding: 13px;
        color: var(--gray);
    }

    #sec2 #map_content {
        position: absolute;
        bottom: 67px;
        top: 17%;
        left: 0;
        right: 0;
        margin: auto;
        width: 100%;
    }

    #sec2 #map_content .row {
        padding: 15px 0;
        height: 100%;
    }

    #sec2 #map {
        margin-top: 15px;
        height: 100%;
        padding: 0;
    }

    #sec2 #map div {
        height: 100%;
    }

    #sec2 #map iframe {
        width: 100%;
        height: 100%;
    }

    #sec2 #map_title {
        font-size: 13px;
        position: relative;
        top: -4px;
        color: var(--red);
        font-weight: bold;
    }

    #sec2 .goto_next {
        position: absolute;
        bottom: 0;
        width: 80%;
        left: 0;
        right: 0;
        margin: auto;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        background-color: #000;
    }

    #sec2 .goto_next button {
        font-size: 16px;
        font-weight: bold;
        cursor: not-allowed;
        background-color: transparent;
        border: none;
        outline: none;
        color: #655e5e;
    }

    /*******************************/

    #sec3 .goto_next {
        position: absolute;
        bottom: 0;
        width: 80%;
        left: 0;
        right: 0;
        margin: auto;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        background-color: #000;
    }

    #sec3 .goto_next button {
        font-size: 16px;
        font-weight: bold;
        cursor: not-allowed;
        background-color: transparent;
        border: none;
        outline: none;
        color: #655e5e;
    }

    #sec3 #property_content {
        position: absolute;
        right: 0;
        left: 0;
        bottom: 50px;
        top: 0;
    }

    #sec3 .container-fluid div {
        height: 100%;
    }

    #sec3 #property {
        background-color: var(--gray);
        height: 90%;
        float: right;
        width: 100%;
        padding-top: 50px;
    }

    #property_content_title {
        background-color: var(--gray);
        margin: 0 0 3px 0;
        padding: 7px 0;
        color: #fff;
        font-size: 14px;
        text-align: center;
    }

    #all_check_box div {
        height: auto !important;
        margin-bottom: 15px;
    }

    #all_check_box .title {
        color: var(--yellow);
        font-size: 14px;
        margin-right: 5px;
    }

    #sec3 #listـprop {
        height: auto !important;
    }

    #sec3 #listـprop div {
        height: auto !important;
    }

    #sec3 #listـprop .list_prop {
        height: auto !important;
        margin-bottom: 15px;
    }

    #sec3 #listـprop .list_prop select {
        background-color: #fff;
        height: 35px;
        width: 60%;
        border: 2px solid #fff;
        font-size: 13px;
        outline: none;
    }

    #sec3 #listـprop .list_prop select.active {
        background-color: var(--yellow);
    }

    /**********************************/
    #sec4 #ads_title {
        background-color: #616e75;
        margin: 0;
        padding: 0 10px;
        color: #fff;
        font-size: 13px;
        width: 100%;
        height: 100%;
        border: none;
        outline: none;
        text-align: right;
    }

    #sec4 #ads_title::placeholder {
        color: #cdcdcd;
    }

    #sec4 #title {
        height: 45px;
        background-color: #233d4d;
        margin-bottom: 5px;
        padding: 5px;
    }

    #sec4 #input_hint {
        color: #fff;
        font-size: 10px;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
    }

    #sec4 .goto_next {
        position: absolute;
        bottom: 0;
        width: 80%;
        left: 0;
        right: 0;
        margin: auto;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        background-color: #000;
    }

    #sec4 .goto_next button {
        font-size: 16px;
        font-weight: bold;
        cursor: not-allowed;
        background-color: transparent;
        border: none;
        outline: none;
        color: #655e5e;
    }

    #sec4 #text {
        height: 90%;
        padding: 5px;
        background-color: var(--gray);
    }

    #sec4 #text textarea {
        width: 100%;
        height: 100%;
        border: none;
        outline: none;
        background-color: #ffffff80;
        padding: 20px;
        color: #fff;
        font-size: 14px;
        line-height: 35px;
    }

    #sec4 #text textarea::placeholder {
        color: #eeeeee;
    }

    /*********************************/

    #sec5 #add_img {
        border: 2px solid var(--gray);
        margin-bottom: 20px;
    }

    #sec5 #add_img img {
        height: 200px;
        width: 100%;
    }

    #sec5 #add_img .select_img{
        position: relative;
    }

    #sec5 #add_img .select_img input{
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        opacity: 0;
        cursor: pointer;
    }

    #sec5 #add_video .select_video{
        position: relative;
    }

    #sec5 #add_video .select_video video{
        display: none;
    }

    #sec5 #add_video .select_video input{
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        opacity: 0;
        cursor: pointer;
    }

    #sec5 #add_img input[type=text] {
        width: 95%;
        height: 35px;
        padding: 5px;
        font-size: 12px;
        margin-bottom: 8px;
    }

    #sec5 #add_video {
        border: 2px solid var(--gray);
    }

    #sec5 #add_video img {
        height: 200px;
        width: 100%;
    }

    #sec5 #add_video input[type=text] {
        width: 95%;
        height: 35px;
        padding: 5px;
        font-size: 12px;
        margin-bottom: 8px;
    }

    #sec5 #add_video select {
        position: absolute;
        right: 6px;
        background-color: var(--gray);
        height: 35px;
        color: #fff;
        font-size: 12px;
        outline: none;
    }

    #sec5 #btn_add_video {
        cursor: pointer;
        width: 289px;
        height: 35px;
        background-color: var(--yellow);
        color: var(--gray);
        font-size: 17px;
        position: absolute;
        bottom: 127px;
        transform: rotate(90deg);
        right: -170px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        border-radius: 5px;
    }

    #sec5 #btn_add_video i {
        position: absolute;
        left: 12px;
        transform: rotate(180deg);
        font-size: 18px;
        padding: 5px;
        background-color: var(--red);
        border-radius: 5px;
        color: #fff;
    }

    #sec5 #btn_add_img {
        cursor: pointer;
        width: 289px;
        height: 35px;
        background-color: var(--yellow);
        color: var(--gray);
        font-size: 17px;
        position: absolute;
        top: 127px;
        transform: rotate(90deg);
        right: -170px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        border-radius: 5px;
    }

    #sec5 #btn_add_img i {
        position: absolute;
        left: 12px;
        transform: rotate(180deg);
        font-size: 18px;
        padding: 5px;
        background-color: var(--red);
        border-radius: 5px;
        color: #fff;
    }

    #sec5 .img_box {
        height: 87px;
        background-color: var(--gray);
        position: relative;
    }

    #sec5 .img_box img {
        width: 100%;
        height: 100%;
        display: none;
    }

    #sec5 .img_box .fa {
        display: none;
        position: absolute;
        top: 0;
        right: 0;
        width: 20px;
        height: 20px;
        background-color: var(--red);
        /* display: flex;*/
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        z-index: 999;
    }

    #sec5 .video_box {
        height: 287px;
        background-color: var(--gray);
        position: relative;
    }

    #sec5 .video_box .fa {
        display: none;
        position: absolute;
        top: 0;
        right: 0;
        width: 20px;
        height: 20px;
        background-color: var(--red);
        /* display: flex;*/
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        z-index: 999;
    }

    #sec5 .goto_next {
        position: absolute;
        bottom: 0;
        width: 80%;
        left: 0;
        right: 0;
        margin: auto;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        background-color: #000;
    }

    #sec5 .goto_next button {
        font-size: 16px;
        font-weight: bold;
        cursor: not-allowed;
        background-color: transparent;
        border: none;
        outline: none;
        color: #655e5e;
    }

    /*********************************/
    #sec6 .goto_next {
        position: absolute;
        bottom: 0;
        width: 80%;
        left: 0;
        right: 0;
        margin: auto;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        background-color: #000;
    }

    #sec6 .goto_next button {
        font-size: 16px;
        font-weight: bold;
        cursor: not-allowed;
        background-color: transparent;
        border: none;
        outline: none;
        color: #655e5e;
    }

    #sec6 #share_jeerjeerak {
        background-color: #000;
        padding: 5px;
    }

    #sec6 #share_jeerjeerak .content {
        background-color: var(--gray);
        height: 100%;
        width: 100%;
        padding: 35px;
        color: #fff;
    }

    #sec6 #accept_law {
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--gray);
        font-size: 13px;
        font-weight: bold;
    }

    #sec6 #accept_law input {
        margin-left: 5px;
    }

    #sec6 #slider_div {
        width: 80%;
        margin: 10% auto 10%;
        height: 120px;
        background-color: #000;
        padding: 7px;
    }

    #sec6 #slider_div .chance_title {
        display: block;
        padding-top: 5px;
        color: var(--yellow);
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 24px;
    }

    #sec6 .slider {
        -webkit-appearance: none;
        width: 100%%;
        height: 20px;
        background: #233d4d;
        outline: none;
        opacity: 0.7;
        -webkit-transition: .2s;
        transition: opacity .2s;
        border: 6px solid #fff;
        margin: auto;
        direction: ltr;
    }

    #sec6 .slider:hover {
        opacity: 1;
    }

    #sec6 #slider {
        width: 90%;
        margin: auto;
        position: relative;
    }

    #sec6 #slider #min {
        position: absolute;
        left: 0;
        border: 2px;
    }

    #sec6 #slider #max {
        position: absolute;
        right: 0;
        border: 2px;
    }

    #sec6 .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 25px;
        height: 25px;
        background: var(--red);
        cursor: pointer;
    }

    #sec6 .slider::-moz-range-thumb {
        width: 25px;
        height: 25px;
        background: var(--red);
        cursor: pointer;
    }

    /********************************/
    #sec7 .goto_next {
        position: absolute;
        bottom: 0;
        width: 80%;
        left: 0;
        right: 0;
        margin: auto;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        background-color: #000;
    }

    #sec7 .goto_next button {
        font-size: 16px;
        font-weight: bold;
        cursor: not-allowed;
        background-color: transparent;
        border: none;
        outline: none;
        color: #655e5e;
    }

    #sec7 .pay_box {
        background-color: var(--gray);
        padding: 10px;
        position: relative;
        overflow: hidden;
    }

    #sec7 .pay_box .content {
        background-color: #000;
        height: auto;
        padding: 6px;
        color: #fff;
        font-size: 13px;
        overflow: hidden;
    }

    #sec7 .box_stars {
        float: right;
        width: 100%;
        height: 83px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #sec7 .pay_box_title {
        display: block;
        width: 100%;
        height: 40px;
    }

    #sec7 .pay_box ul {
        padding: 0;
        margin: 0;
        width: 100%;
        height: 100%;
    }

    #sec7 .pay_box ul li {
        padding: 10px 0;
        text-align: right;
    }

    #sec7 .pay_box ul li input {
        vertical-align: sub;
        cursor: pointer;
        width: 16px;
        height: 18px;
    }

    #sec7 .pay_box ul li .name {
        margin: 0 13px;
        font-size: 14px;
        color: var(--yellow);
        font-weight: bold;
    }

    #sec7 .pay_box ul li .price {
        margin: 0 13px;
        font-size: 14px;
        font-weight: bold;
    }

    #sec7 .box_stars img {
        float: right;
        width: 33.333%;
        height: 100%;
    }

    #sec7 .goto_pay {
        position: absolute;
        bottom: 0;
        width: 100%;
        left: 0;
        right: 0;
        height: 55px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        color: #000;
        background: var(--yellow);
        font-weight: bold;
        cursor: pointer;
    }

    #sec7 #box1 .content {
        position: relative;
        top: 17px;
        padding: 15px;
    }

    #msg_send {
        height: 100%;
        background-color: #000;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #msg_send span {
        padding: 120px;
        display: block;
        width: 90%;
        background-color: var(--yellow);
        color: #000;
        font-size: 16px;
        font-weight: bold;
    }
</style>


<div id="tabs" class="contanier-fluid">
    <ul class="row">
        <li class="active">دسته بندی اگهی</li>
        <li>موقعیت مکانی</li>
        <li>ویژگی ها/ امکانات</li>
        <li>عنوان/متن آکهی</li>
        <li>افزودن تصویر</li>
        <li>درصد جیرجیرک</li>
        <li id="pay_li"> پرداخت</li>
    </ul>
</div>

<div id="client_result">


    <section id="sec1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-10 col-md-offset-1">
                    <div class="select_box_div" id="ads_type">
                        <div class="text_show col-xs-6">
                            <span id="ads_type_text"> </span>
                            <i class="fa fa-arrow-down"></i>
                            <input type="hidden" name="" id="ads_type_input">
                            <ul>
                                <li onclick="ads_type1()" data-id="3">
                                    <span> کالا یا خدماتی برای فروش یا ارائه دارم </span><i
                                            class="fa fa-arrow-down"></i>
                                    <ul>
                                        <li data-id="1"><span>می خواهم شغل و کسب و کارم را ثبت کنم</span></li>
                                        <li data-id="2"><span>این آکهی ، شغل و یا کسب و کارم نیست</span></li>
                                    </ul>
                                </li>
                                <li onclick="ads_type2()" data-id="4"><span>به دنبال کالا یا خدمات خاصی می گردم</span>
                                </li>
                            </ul>
                        </div>

                        <div class="col-xs-6">
                            <span class="select_box_title">لطفا ابتدا نوع آگهی خود را انتخاب کنید.</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-10 col-md-offset-1">
                    <div class="select_box_div" id="category">
                        <div class="text_show col-xs-6">
                            <span id="category_text"> </span>
                            <i class="fa fa-arrow-down"></i>
                            <input type="hidden" name="" id="category_input">
                            <ul>
                                <li data-id="3"><span>دسته 1</span><i class="fa fa-arrow-down"></i>
                                    <ul>
                                        <li data-id="1"><span>زیر دسته 1</span></li>
                                        <li data-id="2"><span>زیر دسته 2</span></li>
                                    </ul>
                                </li>
                                <li data-id="4"><span>دسته 2</span></li>
                                <li data-id="3"><span>دسته 1</span><i class="fa fa-arrow-down"></i>
                                    <ul>
                                        <li data-id="1"><span>زیر دسته 1</span></li>
                                        <li data-id="2"><span>زیر دسته 2</span></li>
                                    </ul>
                                </li>
                                <li data-id="4"><span>دسته 2</span></li>
                                <li data-id="3"><span>دسته 1</span><i class="fa fa-arrow-down"></i>
                                    <ul>
                                        <li data-id="1"><span>زیر دسته 1</span></li>
                                        <li data-id="2"><span>زیر دسته 2</span></li>
                                    </ul>
                                </li>
                                <li data-id="4"><span>دسته 2</span></li>
                                <li data-id="3"><span>دسته 1</span><i class="fa fa-arrow-down"></i>
                                    <ul>
                                        <li data-id="1"><span>زیر دسته 1</span></li>
                                        <li data-id="2"><span>زیر دسته 2</span></li>
                                    </ul>
                                </li>
                                <li data-id="4"><span>دسته 2</span></li>
                                <li data-id="3"><span>دسته 1</span><i class="fa fa-arrow-down"></i>
                                    <ul>
                                        <li data-id="1"><span>زیر دسته 1</span></li>
                                        <li data-id="2"><span>زیر دسته 2</span></li>
                                    </ul>
                                </li>


                            </ul>
                        </div>

                        <div class="col-xs-6">
                            <span class="select_box_title">لطفا دسته بندی مربوطه را انتخاب کنید.</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="goto_next">
            <button disabled onclick="goto_next(2)">مرحله بعد - 1 از 6</button>
        </div>
    </section>


    <section id="sec2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-10 col-md-offset-1">
                    <div class="col-md-6">
                        <div class="select_box_div" id="location_state">
                            <div class="col-md-4 h100">
                                <span class="select_box_title">انتخاب شهر</span>
                            </div>
                            <div class="col-md-8 h100">
                                <div class="text_show h100">
                                    <span id="location_state_text"> </span>
                                    <i class="fa fa-arrow-down"></i>
                                    <input type="hidden" name="" id="location_state_input">
                                    <ul>
                                        <li data-id="3"><span> تهران </span></li>
                                        <li data-id="4"><span>کرج</span></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="select_box_div" id="location_city">

                            <div class="col-md-8 h100">
                                <div class="text_show h100">
                                    <span id="location_city_text"> </span>
                                    <i class="fa fa-arrow-down"></i>
                                    <input type="hidden" name="" id="location_city_input">
                                    <ul>
                                        <li data-id="3"><span> تهران </span></li>
                                        <li data-id="4"><span>کرج</span></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-4 h100">
                                <span class="select_box_title">انتخاب محله</span>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="container-fluid" id="map_content">
            <div class="row">
                <div class="col-xs-10 col-md-offset-1" id="map">
                    <div class="col-md-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d207371.97794527843!2d51.48990373215488!3d35.69701178617529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e00491ff3dcd9%3A0xf0b3697c567024bc!2z2KrZh9ix2KfZhtiMINin2LPYqtin2YYg2KrZh9ix2KfZhtiMINin24zYsdin2YY!5e0!3m2!1sfa!2s!4v1532270572360"
                                frameborder="0" style="border:0" allowfullscreen></iframe>
                        <span id="map_title">موقعیت مکانی / ادرس خود را یافته و برروی ان ضربه کنید.</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="goto_next">
            <button disabled onclick="goto_next(3)">مرحله بعد - 2 از 6</button>
        </div>
    </section>


    <section id="sec3">
        <div class="container-fluid" id="property_content">
            <div class="row">
                <div style="padding: 0" class="col-xs-10 col-md-offset-1">
                    <div class="col-md-12">
                        <p id="property_content_title">با توجه به امکانات و ویژگی ها آگهی /شغل خود را تکمیل نمایید :</p>
                        <div id="property">
                            <div class="col-md-7" id="all_check_box">
                                <div class="col-md-6">
                                    <div>
                                        <input type="checkbox">
                                        <span class="title">داری سونا</span>
                                    </div>

                                    <div>
                                        <input type="checkbox">
                                        <span class="title">داری سونا</span>
                                    </div>
                                    <div>
                                        <input type="checkbox">
                                        <span class="title">داری سونا</span>
                                    </div>
                                    <div>
                                        <input type="checkbox">
                                        <span class="title">داری سونا</span>
                                    </div>


                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <input type="checkbox">
                                        <span class="title">داری سونا</span>
                                    </div>

                                    <div>
                                        <input type="checkbox">
                                        <span class="title">داری سونا</span>
                                    </div>
                                    <div>
                                        <input type="checkbox">
                                        <span class="title">داری سونا</span>
                                    </div>
                                    <div>
                                        <input type="checkbox">
                                        <span class="title">داری سونا</span>
                                    </div>


                                </div>

                            </div>
                            <div class="col-md-5" id="listـprop">
                                <div class="list_prop">
                                    <select onchange="select_active(this)">
                                        <option value="0">نوع اپارتمان</option>
                                        <option value="">ویلای</option>
                                        <option value="">مسکونی</option>
                                        <option value="">ویلای</option>
                                        <option value="">مسکونی</option>

                                    </select>
                                </div>

                                <div class="list_prop">
                                    <select onchange="select_active(this)">
                                        <option value="0">نوع اپارتمان</option>
                                        <option value="">ویلای</option>
                                        <option value="">مسکونی</option>
                                        <option value="">ویلای</option>
                                        <option value="">مسکونی</option>

                                    </select>
                                </div>

                                <div class="list_prop">
                                    <select onchange="select_active(this)">
                                        <option value="0">نوع اپارتمان</option>
                                        <option value="">ویلای</option>
                                        <option value="">مسکونی</option>
                                        <option value="">ویلای</option>
                                        <option value="">مسکونی</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="goto_next">
            <button disabled onclick="goto_next(4)">مرحله بعد - 3 از 6</button>
        </div>
    </section>


    <section id="sec4">
        <div class="container-fluid" id="ads_text" style="height: 90%">
            <div class="row h100">
                <div class="col-xs-10 col-md-offset-1 h100">
                    <div class="col-md-12" id="title">
                        <div class="col-md-10 h100">
                            <input onkeydown="check_active4()" onkeyup="check_active4();" id="ads_title" type="text"
                                   placeholder="نام مغازه/نام کسب و کار/موضوع آگهی">
                        </div>
                        <div class="col-md-2 h100" style="padding-left: 0;">
                            <span id="input_hint">(محدودیت 10 کلمه)</span>
                        </div>

                    </div>
                    <div id="text" class="col-md-12 h100">
                        <textarea onkeydown="check_active4()" onkeyup="check_active4();" onkeypress="check_active4();"
                                  placeholder="توضیحات خود را اینجا بنویسید."></textarea>
                    </div>
                </div>
            </div>
        </div>


        <div class="goto_next">
            <button disabled onclick="goto_next(5)">مرحله بعد - 4 از 6</button>
        </div>
    </section>


    <section style="display: block" id="sec5">
        <div class="container-fluid" style="height: 88%">
            <div class="row h100">
                <div class="col-xs-10 col-md-offset-1">

                    <div class="col-xs-12" style="padding: 0;margin-bottom: 15px">
                        <div class="col-md-7 col-xs-12" style="padding: 0;">
                            <div class="col-xs-12" style="padding: 0;margin-bottom: 15px">

                                <div class="col-xs-12 col-md-4" style="padding: 5px">

                                    <div class="img_box">
                                        <img src="">
                                        <i class="fa fa-times"></i>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xs-12" style="padding: 0">
                                <div class="col-xs-12 col-md-6" style="padding: 5px">
                                    <div class="video_box">

                                        <i class="fa fa-times"></i>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6" style="padding: 5px">
                                    <div class="video_box">

                                        <i class="fa fa-times"></i>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div style="padding: 0;position: relative" class="col-md-4 col-xs-12  col-md-offset-1">
                              <span id="btn_add_img">
                                    ثبت
                                    <i class="fa fa-angle-down"></i>
                                </span>

                            <div id="add_img">
                                <div class="select_img">
                                    <form action="" method="post" enctype="multipart/form-data" id="form_1">
                                        <input name="image" type="file" accept="image/*" onchange="preview_image(event,this)">
                                    </form>
                                    <img src="static/image/no_picture.png">
                                </div>
                                <div class="input_box">
                                    <input type="text" placeholder="عنوان  مثلا  گوشی سامسونگ کارکرده">
                                    <input type="text" placeholder="قیمت مثلا 550,000 تومان">
                                </div>
                            </div>

                            <div id="add_video">
                                <div class="select_video">
                                    <form action="" method="post" enctype="multipart/form-data" id="form_2">
                                        <input name="video" type="file"  onchange="preview_video(event,this)">
                                    </form>
                                    <img src="static/image/no_video.png">
                                    <video  style="width: 100%;height:192px" controls>
                                        <source src="" type="video/mp4">
                                        <source src="" type="video/ogg">

                                        Your browser does not support the video tag.
                                    </video>
                                </div>

                                <div class="input_box" style="position: relative">
                                    <input type="text" placeholder="عنوان  مثلا 50 متری میدان 50">
                                    <input style="padding-right: 70px" type="text"
                                           placeholder="قیمت مثلا 70 میلیو تومان">
                                    <select>
                                        <option value="قیمت">قیمت</option>
                                        <option value="رهن">رهن</option>
                                        <option value="اجاره">اجاره</option>
                                    </select>
                                </div>

                            </div>

                            <span id="btn_add_video">
                                    ثبت
                                    <i class="fa fa-angle-down"></i>
                                </span>


                        </div>


                    </div>


                </div>
            </div>
        </div>


        <div class="goto_next">
            <button disabled onclick="goto_next(6)">مرحله بعد - 5 از 6</button>
        </div>
    </section>


    <section id="sec6">
        <div class="container-fluid" style="height: 88%">
            <div class="row h100">
                <div class="col-xs-10 col-md-offset-1" style="height: 96%">
                    <div id="share_jeerjeerak" class="h100">
                        <div class="content">
                            <p>پس از خرید مشتری از شما ،درصدی از آن مبلغ (در اینجا تعیین کرده اید ) به جیرجیرک منتقل می
                                شود و جیرجیرک آن را به علاوه مبالغ سایر فروشندگان در قرعه کشی های بسیار بزرگ و بسیار
                                متعدد خود به مشتری ها می رساند.</p>
                            <p>به همین راحتی برای کالا و خدماتتان ، قرعه کشی و انگیزه ایجاد کنید.</p>

                            <p>سهم جیرجیرک از هر خرید در قسمت زیر تعیین می شود که بعدا نیز قابل تغییر است

                                پس از ثبت آگهی می توانید این درصد را برای برخی از اجناس خود متفاوت قرار دهید
                                این درصد هر چه بیشتر باشد،
                            </p>

                            <div id="slider_div">
                                <span class="chance_title">شانس مردم برای خریدشان ازشما=<b></b> برابر</span>
                                <div id="slider">
                                    <span id="min"></span>
                                    <span id="value"></span>
                                    <span id="max"></span>
                                    <input type="range" min="1" max="10" value="5" class="slider" id="myRange">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accept_law">
                        <input type="checkbox" onchange="active_sec6(this)">
                        <span>موراد بالا و <a style="color:var(--red);" href="">قوانین جیرجیرک </a> را مطالعه کردم و آن ها را می پذیرم</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="goto_next">
            <button data-type="" disabled>ثبت و ارسال</button>
        </div>
    </section>

    <section id="sec7">
        <div class="container-fluid" style="height: 88%">
            <div class="row h100">
                <div class="col-xs-10 col-md-offset-1" style="height: 96%">

                    <div class="col-md-6 h100">
                        <div class="pay_box h100">
                            <div class="content h100 " style="height: 100%;">
                                <p>ستاره هایتان که به <span style="color: var(--yellow);">100 ستاره</span> برسد مشتریان
                                    شما می توانند برای شما بازاریابی کرده و مشتری جذب کنند.</p>
                                <br>

                                <p>پس از ثبت هر خرید از افرادی که توسط مشتریان قبلی جذب شده اندپس از ثبت هری که توسط
                                    مشتریان قبلی جذب شده اندپس از ثبت هر خرید از افرادی که توسط مشتریان قبلی جذب شده
                                    اندپس از ثبت هر خرید از افرادی که توسط مشتریان قبلی جذب شده اند</p>

                                <br>
                                <p>پس از ثبت هر خرید از افرادی که توسط مشتریان قبلی جذب شده اندپس از ثبت هر خرید از
                                    افرادی که توسط مشتریرید از افرادی که توسط مشتریان قبلی جذب شده اند</p>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 h100">
                        <div class="pay_box h100" id="box1">
                            <div class="box_stars">
                                <img src="static/image/star.png">
                                <img src="static/image/star.png">
                                <img src="static/image/star.png">
                            </div>

                            <div class="content">
                                <span class="pay_box_title">با چمد ستاره شغلتان را ثبت می کنید?</span>
                                <ul>
                                    <li>
                                        <input type="radio" name="r1">
                                        <span class="name">3 ستاره</span>
                                        <span class="price">10,000 تومان</span>
                                    </li>

                                    <li>
                                        <input type="radio" name="r1">
                                        <span class="name">3 ستاره</span>
                                        <span class="price">10,000 تومان</span>
                                    </li>

                                    <li>
                                        <input type="radio" name="r1">
                                        <span class="name">3 ستاره</span>
                                        <span class="price">10,000 تومان</span>
                                    </li>

                                    <li>
                                        <input type="radio" name="r1">
                                        <span class="name">3 ستاره</span>
                                        <span class="price">10,000 تومان</span>
                                    </li>
                                </ul>
                            </div>
                            <a href="" class="goto_pay">پرداخت</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="goto_next">
            <button disabled>پرداخت</button>
        </div>
    </section>


</div>

<div id="msg_send">
    <span>با موفقیت جهت تایید جیرجیرک ارسال شد.</span>
</div>

<script>
    $(document).ready(function () {
        //$('#client_result').find('section').eq(0).fadeIn(200);

        $('#tabs ul').find('li').eq(0).addClass('active');

        $('.text_show').hover(function () {
            $(this).find('ul:first').stop();
            $(this).find('ul:first').slideDown(600);

        }, function () {
            $(this).find('ul:first').stop();
            $(this).find('ul').slideUp(600);
            $('.text_show> ul >li>i').removeClass('active');
        });


        $('.text_show> ul >li>i').click(function () {
            $(this).stop();
            $(this).parent().find('ul').stop();
            $(this).parent().find('ul').slideToggle(500);
            $(this).toggleClass('active');
        });

        ads_type = 0;
        category = 0;
        state = 0;
        city = 0;

        $('#ads_type .text_show li span').click(function () {
            var id = $(this).parent().attr('data-id');
            var li_txt = $(this).text();
            console.log(li_txt);
            $('#ads_type_input').val(id);
            $('#ads_type_text').text(li_txt);
            $('#ads_type .text_show').addClass('active');
            ads_type = 1;
            check_active1(ads_type, category);
        });

        $('#category .text_show li span').click(function () {
            var id = $(this).parent().attr('data-id');
            var li_txt = $(this).text();
            console.log(li_txt);
            $('#category_input').val(id);
            $('#category_text').text(li_txt);
            $('#category .text_show').addClass('active');
            category = 1;
            check_active1(ads_type, category);
        });


        $('#location_state .text_show li span').click(function () {
            var id = $(this).parent().attr('data-id');
            var li_txt = $(this).text();
            console.log(li_txt);
            $('#location_state_input').val(id);
            $('#location_state_text').text(li_txt);
            $('#location_state .text_show').addClass('active');
            state = 1;
            check_active2(state, city);
        });

        $('#location_city .text_show li span').click(function () {
            var id = $(this).parent().attr('data-id');
            var li_txt = $(this).text();
            console.log(li_txt);
            $('#llocation_city_input').val(id);
            $('#location_city_text').text(li_txt);
            $('#location_city .text_show').addClass('active');
            city = 1;
            check_active2(state, city);
        });


        $('#ads_title').keypress(function (e) {
            var txt = $(this).val();
            var txt_len = txt.split(' ').length;
            check_active4();
            if (txt_len > 10) {
                e.preventDefault();
            }
        });

        $('#ads_title').bind("cut copy paste", function (e) {
            e.preventDefault();
        });
        slider = $('.slider');

        var min_slider = slider.attr('min');
        var max_slider = slider.attr('max');
        $('#min').text(min_slider + '%');
        $('#max').text(max_slider + '%');
        var val_slider = slider.attr('value');
        $('#value').text(val_slider + '%');
        $('.chance_title').find('b').text(val_slider);


        var slider = document.getElementById("myRange");
        slider.oninput = function () {
            $('#value').text(this.value + '%');
            $('.chance_title').find('b').text(this.value);
        };


        $('#sec6').find('.goto_next button').click(function () {
            var type = $(this).attr('data-type');

            if (type == 'pay') {
                goto_next(7);
            } else {
                $('#client_result').fadeOut(400, function () {
                    $('#msg_send').fadeIn(300);
                    $('#tabs').fadeOut(0);
                });
            }

        });




        $('#form_1').on('submit', (function (e) {
            e.preventDefault();
            $.ajax({
                url: "upload/ajax_php_file.php", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,        // To send DOMDocument or non processed data file it is set to false
                success: function (data)   // A function to be called if request succeeds
                {

                }
            });
        }));

        $('#form_2').on('submit', (function (e) {
            e.preventDefault();
            $.ajax({
                url: "upload/ajax_php_file.php", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,        // To send DOMDocument or non processed data file it is set to false
                success: function (data)   // A function to be called if request succeeds
                {

                }
            });
        }));

    });

    function check_active1(check_1='', check_2='') {
        if (check_1 === 1 && check_2 === 1) {
            $('#sec1').find('.goto_next button').removeAttr('disabled').css({
                'color': '#fff',
                'cursor': 'pointer'
            });
        }
    }

    function check_active2(check_1='', check_2='') {
        if (check_1 === 1 && check_2 === 1) {
            $('#sec2').find('.goto_next button').removeAttr('disabled').css({
                'color': '#fff',
                'cursor': 'pointer'
            });
        }
    }

    function check_active3(check_1='') {
        if (check_1 === 1) {
            $('#sec3').find('.goto_next button').removeAttr('disabled').css({
                'color': '#fff',
                'cursor': 'pointer'
            });
        }
    }

    function check_active4() {
        var t1 = '';
        var t2 = '';
        t1 = $('#text').find('textarea').val();
        t2 = $('#ads_title').val();
        if (t1 != '' && t2 != '') {
            $('#sec4').find('.goto_next button').removeAttr('disabled').css({
                'color': '#fff',
                'cursor': 'pointer'
            });
        } else {
            $('#sec4').find('.goto_next button').attr('disabled', true).css({
                'color': '#655e5e',
                'cursor': 'not-allowed'
            });
        }


    }


    function select_active(tag) {
        var val = $(tag).find('option:selected').val();
        $(tag).removeClass('active');
        console.log(val);
        if (val !== 0) {
            $(tag).addClass('active');
            check_active3(1);
        }

    }

    function active_sec6(tag) {
        if ($(tag).is(':checked')) {
            $('#sec6').find('.goto_next button').removeAttr('disabled').css({
                'color': '#fff',
                'cursor': 'pointer'
            });
        } else {
            $('#sec6').find('.goto_next button').attr('disabled', true).css({
                'color': '#655e5e',
                'cursor': 'not-allowed'
            });
        }
    }

    function preview_image(event, tag) {
        var reader = new FileReader();
        reader.onload = function () {
            $(tag).parents('.select_img').find('img').attr('src', reader.result);
            $(tag).parents('form').submit();
        };
        reader.readAsDataURL(event.target.files[0]);

        /*$('#sec5').find('.goto_next button').removeAttr('disabled').css({
            'color': '#fff',
            'cursor': 'pointer'
        });*/
    }

    function preview_video(event, tag) {
        var reader = new FileReader();
        reader.onload = function () {
            $(tag).parents('.select_video').find('video').find('source').attr('src', reader.result);
            $(tag).parents('.select_video').find('video').find('source').attr('src', reader.result);

            $(tag).parents('.select_video').find('img').fadeOut(0);
            $(tag).parents('.select_video').find('video').fadeIn(200);
            //$(tag).parents('.select_video').find('video').src(result);
            $(tag).parents('.select_video').find('video').load();
            $(tag).parents('.select_video').find('video').play();


            $(tag).parents('form').submit();
        };
        reader.readAsDataURL(event.target.files[0]);

        /*$('#sec5').find('.goto_next button').removeAttr('disabled').css({
         'color': '#fff',
         'cursor': 'pointer'
         });*/
    }

    function delete_img(tag) {
        $(tag).parents('.add_img_box').find('img').attr('src', 'static/image/no-picture-thumbnail.png');
        $(tag).parents('.add_img_box').find('input').val('');
        $(tag).parents('.add_img_box').find('.add_img').fadeIn(300);
        $(tag).parents('.add_img_box').find('.title').fadeIn(300);
        $(tag).parents('.add_img_box').find('.delete_img').fadeOut(300);
        var img_url_delete = $(tag).attr('data-url');

        var url = "<?=URL . url_upload?>/ajax_php_file.php";
        var data = {'url_delete': img_url_delete};
        $.post(url, data, function (msg) {
            console.log(msg);
        })


    }

    function ads_type1() {
        $('#tabs').find('li').animate({'width': '14.285714%'}, 0, function () {
            $('#pay_li').css({
                'display': 'flex'
            });
            $('#pay_li').animate({'opacity': '1'});
        });

        $('#sec6').find('.goto_next button').attr('data-type', 'pay');
    }

    function ads_type2() {
        $('#tabs').find('li').animate({'width': '16.66666667%'}, 0, function () {
            $('#pay_li').css({
                'display': 'none'
            });
            $('#pay_li').animate({'opacity': '0'}, 300);
        });
        $('#sec6').find('.goto_next button').attr('data-type', '');
    }


</script>


<!--<div class="add_img_box">

    <i class="add_img fa fa-plus"></i>
    <span class="title"> افوزدن تصویر</span>
    <i onclick="delete_img(this)" class="delete_img fa fa-times" data-url=""></i>
    <img src="static/image/no-picture-thumbnail.png">

</div>-->


