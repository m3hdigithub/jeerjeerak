<style>
    .adver_item .details{
        display: none;
        float: right;
        height: 350px;
        position: absolute;
        top: 6px;
        background-color: #b4e493;
        z-index: 999999;
        box-shadow: 0 0 12px black;
        padding: 10px;
    }
    .adver_item .details .remove_details {
        position: absolute;
        left: 5px;
        color: var(--red);
        font-size: 20px;
        top: 3px;
        padding: 10px;
        cursor: pointer;
    }
</style>




<div id="advers">
    <div id="adver_head">
        <i id="menu_icon" class="fa fa-bars"></i>
        <div id="menu">
            <i id="hide_menu" class="fa fa-bars"></i>
            <ul>
                <li><a href="">درباره جیرجیرک</a></li>
                <li><a href="">ارتباط با جیرجیرک</a></li>
                <li><a href="">قوانین جیرجیرک</a></li>
            </ul>
        </div>

        <div class="select" id="adver_category">
            <select onchange="append_item(this)">
                <option value="0">دسته بندی ها</option>
                <option value="11">دسته 1</option>
                <option value="12">دسته 2</option>
                <option value="13">دسته 3</option>
                <option value="14">دسته 4</option>

            </select>
        </div>
        <div class="select" id="adver_location">
            <select onchange="append_item(this)">
                <option value="0">َشهر/محله</option>
                <option value="1">تهران</option>
                <option value="2">َهمدان</option>
                <option value="3">َکردستان</option>
                <option value="4">َکرج</option>

            </select>
        </div>
        <div class="select" id="adver_list">
            <select onchange="append_item(this)">
                <option value="">ترتیب نمایش</option>
            </select>
        </div>

        <div id="adver_search">
            <input type="text" placeholder="دنبال چی می گردی؟">
            <button>جستجو</button>
        </div>
    </div>
    <div id="search_result">

    </div>
    <div id="adver_body" >

        <div class="adver_item type1">
            <div class="adver_sidebar">
                <i class="fa fa-times"></i>
                <i class="fa fa-share-alt"></i>
            </div>
            <div class="adver_body">
                <div class="adver_item_head">
                    <div class="head_right">
                        <h3 class="adver_title">قاپ آبفون کاملا سالم</h3>
                        <span class="adver_location_text">نوبنیاد-دقایقی پیش</span>
                    </div>
                    <div class="head_left">
                        <div class="box_1">
                            <span class="title">25 شانس</span>
                            <span class="sub_title">شانسی که به شما می دهد</span>
                        </div>

                        <div class="box_2">
                            <span class="title">130 هزار تومان</span>
                            <span class="sub_title">قیمت</span>
                        </div>
                    </div>
                </div>
                <div class="adver_item_txt">
                    <div class="adver_text">
                        <p>خانه ویلایی حیاط خلوت پارکینگ (حیاط)
                            در فردوسیه شهریار
                            جای شیک و دنج با همسایه های ارام و ساکت
                            مناسب برای زندگی و یا ساخت و ساز
                            قیمت هر متر: ١٤٥٠</p>
                        <a class="read_more" onclick="show_details(this)" >ادامه...</a>
                    </div>

                    <div class="adver_img owl-carousel">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">


                    </div>

                </div>

            </div>
            <div class="details">
                <i class="fa fa-times-circle remove_details" onclick="hide_details(this)"></i>
                 <div class="container-fluid">
                     <div class="row">
                         <div class="col-md-9">
                             <p>خانه ویلایی حیاط خلوت پارکینگ (حیاط) در فردوسیه شهریار جای شیک و دنج با همسایه های ارام و ساکت مناسب برای زندگی و یا ساخت و ساز قیمت هر متر: ١٤٥٠
                                 خانه ویلایی حیاط خلوت پارکینگ (حیاط) در فردوسیه شهریار جای شیک و دنج با همسایه های ارام و ساکت مناسب برای زندگی و یا ساخت و ساز قیمت هر متر: ١٤٥٠</p>
                         </div>
                         <div class="col-md-3">

                         </div>
                     </div>
                 </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="owl-carousel">
                            <img src="static/image/-usams-66s.jpg">
                            <img src="static/image/-usams-66s.jpg">
                            <img src="static/image/-usams-66s.jpg">
                            <img src="static/image/-usams-66s.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="adver_item type2">

            <div class="adver_sidebar">
                <i class="fa fa-times"></i>
                <i class="fa fa-share-alt"></i>
            </div>
            <div class="adver_body">
                <div class="adver_item_head">
                    <div class="head_right">
                        <h3 class="adver_title">قاپ آبفون کاملا سالم</h3>
                        <span class="adver_location_text">نوبنیاد-دقایقی پیش</span>
                    </div>
                    <div class="head_left">
                        <div class="box_3">
                            <span class="title">-</span>
                            <span class="sub_title">مشتری ثابت</span>
                        </div>
                        <div class="box_3">
                            <span class="title">8</span>
                            <span class="sub_title">مشتری گذری</span>
                        </div>
                    </div>
                </div>
                <div class="adver_item_txt">
                    <div class="adver_text">
                        <div class="slider_item">
                            <!--<i class="icon_squre"></i>-->
                            <input name="1" class="icon_squre" type="radio" value="">

                            <span class="slider_item_title"> آیا از رفتار و اخلاقشان راضی بوده اید؟</span>
                            <div class="progress">
                              <div class="col_1">
                                  <span>خیر</span>
                              </div>

                                <div class="col_2"><span></span></div>

                                <div class="col_3">
                                    <span>بله</span>
                                </div>
                            </div>
                        </div>
                        <div class="slider_item">
                            <input name="1" class="icon_squre" type="radio" value="">
                            <span class="slider_item_title">آیا قیمتشان منصفانه بود ؟</span>
                            <div class="progress">
                                <div class="col_1">
                                    <span>خیر</span>
                                </div>

                                <div class="col_2"><span style="width: 10%"></span></div>

                                <div class="col_3">
                                    <span>بله</span>
                                </div>
                            </div>
                        </div>
                        <div class="slider_item">
                            <input name="1" class="icon_squre" type="radio" value="">
                            <span class="slider_item_title">آیا ایشان را به دیگران توصیه می کنید؟</span>
                            <div class="progress">
                                <div class="col_1">
                                    <span>خیر</span>
                                </div>

                                <div class="col_2"><span></span></div>

                                <div class="col_3">
                                    <span>بله</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="adver_img owl-carousel">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">


                    </div>
                </div>

            </div>
        </div>

        <div class="adver_item type1">
            <div class="adver_sidebar">
                <i class="fa fa-times"></i>
                <i class="fa fa-share-alt"></i>
            </div>
            <div class="adver_body">
                <div class="adver_item_head">
                    <div class="head_right">
                        <h3 class="adver_title">قاپ آبفون کاملا سالم</h3>
                        <span class="adver_location_text">نوبنیاد-دقایقی پیش</span>
                    </div>
                    <div class="head_left">
                        <div class="box_1">
                            <span class="title">25 شانس</span>
                            <span class="sub_title">شانسی که به شما می دهد</span>
                        </div>

                        <div class="box_2">
                            <span class="title">130 هزار تومان</span>
                            <span class="sub_title">قیمت</span>
                        </div>
                    </div>
                </div>
                <div class="adver_item_txt">
                    <div class="adver_text">
                        <p>خانه ویلایی حیاط خلوت پارکینگ (حیاط)
                            در فردوسیه شهریار
                            جای شیک و دنج با همسایه های ارام و ساکت
                            مناسب برای زندگی و یا ساخت و ساز
                            قیمت هر متر: ١٤٥٠</p>
                        <a class="read_more" onclick="show_details(this)" >ادامه...</a>
                    </div>

                    <div class="adver_img owl-carousel">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">


                    </div>

                </div>

            </div>
            <div class="details">
                <i class="fa fa-times-circle remove_details" onclick="hide_details(this)"></i>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <p>خانه ویلایی حیاط خلوت پارکینگ (حیاط) در فردوسیه شهریار جای شیک و دنج با همسایه های ارام و ساکت مناسب برای زندگی و یا ساخت و ساز قیمت هر متر: ١٤٥٠
                                خانه ویلایی حیاط خلوت پارکینگ (حیاط) در فردوسیه شهریار جای شیک و دنج با همسایه های ارام و ساکت مناسب برای زندگی و یا ساخت و ساز قیمت هر متر: ١٤٥٠</p>
                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="owl-carousel">
                            <img src="static/image/-usams-66s.jpg">
                            <img src="static/image/-usams-66s.jpg">
                            <img src="static/image/-usams-66s.jpg">
                            <img src="static/image/-usams-66s.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="adver_item type1">
            <div class="adver_sidebar">
                <i class="fa fa-times"></i>
                <i class="fa fa-share-alt"></i>
            </div>
            <div class="adver_body">
                <div class="adver_item_head">
                    <div class="head_right">
                        <h3 class="adver_title">قاپ آبفون کاملا سالم</h3>
                        <span class="adver_location_text">نوبنیاد-دقایقی پیش</span>
                    </div>
                    <div class="head_left">
                        <div class="box_1">
                            <span class="title">25 شانس</span>
                            <span class="sub_title">شانسی که به شما می دهد</span>
                        </div>

                        <div class="box_2">
                            <span class="title">130 هزار تومان</span>
                            <span class="sub_title">قیمت</span>
                        </div>
                    </div>
                </div>
                <div class="adver_item_txt">
                    <div class="adver_text">
                        <p>خانه ویلایی حیاط خلوت پارکینگ (حیاط)
                            در فردوسیه شهریار
                            جای شیک و دنج با همسایه های ارام و ساکت
                            مناسب برای زندگی و یا ساخت و ساز
                            قیمت هر متر: ١٤٥٠</p>
                        <a class="read_more" onclick="show_details(this)" >ادامه...</a>
                    </div>

                    <div class="adver_img owl-carousel">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">


                    </div>

                </div>

            </div>
            <div class="details">
                <i class="fa fa-times-circle remove_details" onclick="hide_details(this)"></i>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <p>خانه ویلایی حیاط خلوت پارکینگ (حیاط) در فردوسیه شهریار جای شیک و دنج با همسایه های ارام و ساکت مناسب برای زندگی و یا ساخت و ساز قیمت هر متر: ١٤٥٠
                                خانه ویلایی حیاط خلوت پارکینگ (حیاط) در فردوسیه شهریار جای شیک و دنج با همسایه های ارام و ساکت مناسب برای زندگی و یا ساخت و ساز قیمت هر متر: ١٤٥٠</p>
                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="owl-carousel">
                            <img src="static/image/-usams-66s.jpg">
                            <img src="static/image/-usams-66s.jpg">
                            <img src="static/image/-usams-66s.jpg">
                            <img src="static/image/-usams-66s.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="adver_item type1">
            <div class="adver_sidebar">
                <i class="fa fa-times"></i>
                <i class="fa fa-share-alt"></i>
            </div>
            <div class="adver_body">
                <div class="adver_item_head">
                    <div class="head_right">
                        <h3 class="adver_title">قاپ آبفون کاملا سالم</h3>
                        <span class="adver_location_text">نوبنیاد-دقایقی پیش</span>
                    </div>
                    <div class="head_left">
                        <div class="box_1">
                            <span class="title">25 شانس</span>
                            <span class="sub_title">شانسی که به شما می دهد</span>
                        </div>

                        <div class="box_2">
                            <span class="title">130 هزار تومان</span>
                            <span class="sub_title">قیمت</span>
                        </div>
                    </div>
                </div>
                <div class="adver_item_txt">
                    <div class="adver_text">
                        <p>خانه ویلایی حیاط خلوت پارکینگ (حیاط)
                            در فردوسیه شهریار
                            جای شیک و دنج با همسایه های ارام و ساکت
                            مناسب برای زندگی و یا ساخت و ساز
                            قیمت هر متر: ١٤٥٠</p>
                        <a class="read_more" onclick="show_details(this)" >ادامه...</a>
                    </div>

                    <div class="adver_img owl-carousel">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">


                    </div>

                </div>

            </div>
            <div class="details">
                <i class="fa fa-times-circle remove_details" onclick="hide_details(this)"></i>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <p>خانه ویلایی حیاط خلوت پارکینگ (حیاط) در فردوسیه شهریار جای شیک و دنج با همسایه های ارام و ساکت مناسب برای زندگی و یا ساخت و ساز قیمت هر متر: ١٤٥٠
                                خانه ویلایی حیاط خلوت پارکینگ (حیاط) در فردوسیه شهریار جای شیک و دنج با همسایه های ارام و ساکت مناسب برای زندگی و یا ساخت و ساز قیمت هر متر: ١٤٥٠</p>
                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="owl-carousel">
                            <img src="static/image/-usams-66s.jpg">
                            <img src="static/image/-usams-66s.jpg">
                            <img src="static/image/-usams-66s.jpg">
                            <img src="static/image/-usams-66s.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="adver_item type1">
            <div class="adver_sidebar">
                <i class="fa fa-times"></i>
                <i class="fa fa-share-alt"></i>
            </div>
            <div class="adver_body">
                <div class="adver_item_head">
                    <div class="head_right">
                        <h3 class="adver_title">قاپ آبفون کاملا سالم</h3>
                        <span class="adver_location_text">نوبنیاد-دقایقی پیش</span>
                    </div>
                    <div class="head_left">
                        <div class="box_1">
                            <span class="title">25 شانس</span>
                            <span class="sub_title">شانسی که به شما می دهد</span>
                        </div>

                        <div class="box_2">
                            <span class="title">130 هزار تومان</span>
                            <span class="sub_title">قیمت</span>
                        </div>
                    </div>
                </div>
                <div class="adver_item_txt">
                    <div class="adver_text">
                        <p>خانه ویلایی حیاط خلوت پارکینگ (حیاط)
                            در فردوسیه شهریار
                            جای شیک و دنج با همسایه های ارام و ساکت
                            مناسب برای زندگی و یا ساخت و ساز
                            قیمت هر متر: ١٤٥٠</p>
                        <a class="read_more" onclick="show_details(this)" >ادامه...</a>
                    </div>

                    <div class="adver_img owl-carousel">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">


                    </div>

                </div>

            </div>
            <div class="details">
                <i class="fa fa-times-circle remove_details" onclick="hide_details(this)"></i>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <p>خانه ویلایی حیاط خلوت پارکینگ (حیاط) در فردوسیه شهریار جای شیک و دنج با همسایه های ارام و ساکت مناسب برای زندگی و یا ساخت و ساز قیمت هر متر: ١٤٥٠
                                خانه ویلایی حیاط خلوت پارکینگ (حیاط) در فردوسیه شهریار جای شیک و دنج با همسایه های ارام و ساکت مناسب برای زندگی و یا ساخت و ساز قیمت هر متر: ١٤٥٠</p>
                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="owl-carousel">
                            <img src="static/image/-usams-66s.jpg">
                            <img src="static/image/-usams-66s.jpg">
                            <img src="static/image/-usams-66s.jpg">
                            <img src="static/image/-usams-66s.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="adver_item type1">
            <div class="adver_sidebar">
                <i class="fa fa-times"></i>
                <i class="fa fa-share-alt"></i>
            </div>
            <div class="adver_body">
                <div class="adver_item_head">
                    <div class="head_right">
                        <h3 class="adver_title">قاپ آبفون کاملا سالم</h3>
                        <span class="adver_location_text">نوبنیاد-دقایقی پیش</span>
                    </div>
                    <div class="head_left">
                        <div class="box_1">
                            <span class="title">25 شانس</span>
                            <span class="sub_title">شانسی که به شما می دهد</span>
                        </div>

                        <div class="box_2">
                            <span class="title">130 هزار تومان</span>
                            <span class="sub_title">قیمت</span>
                        </div>
                    </div>
                </div>
                <div class="adver_item_txt">
                    <div class="adver_text">
                        <p>خانه ویلایی حیاط خلوت پارکینگ (حیاط)
                            در فردوسیه شهریار
                            جای شیک و دنج با همسایه های ارام و ساکت
                            مناسب برای زندگی و یا ساخت و ساز
                            قیمت هر متر: ١٤٥٠</p>
                        <a class="read_more" onclick="show_details(this)" >ادامه...</a>
                    </div>

                    <div class="adver_img owl-carousel">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">


                    </div>

                </div>

            </div>
            <div class="details">
                <i class="fa fa-times-circle remove_details" onclick="hide_details(this)"></i>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <p>خانه ویلایی حیاط خلوت پارکینگ (حیاط) در فردوسیه شهریار جای شیک و دنج با همسایه های ارام و ساکت مناسب برای زندگی و یا ساخت و ساز قیمت هر متر: ١٤٥٠
                                خانه ویلایی حیاط خلوت پارکینگ (حیاط) در فردوسیه شهریار جای شیک و دنج با همسایه های ارام و ساکت مناسب برای زندگی و یا ساخت و ساز قیمت هر متر: ١٤٥٠</p>
                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="owl-carousel">
                            <img src="static/image/-usams-66s.jpg">
                            <img src="static/image/-usams-66s.jpg">
                            <img src="static/image/-usams-66s.jpg">
                            <img src="static/image/-usams-66s.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="adver_item type1">
            <div class="adver_sidebar">
                <i class="fa fa-times"></i>
                <i class="fa fa-share-alt"></i>
            </div>
            <div class="adver_body">
                <div class="adver_item_head">
                    <div class="head_right">
                        <h3 class="adver_title">قاپ آبفون کاملا سالم</h3>
                        <span class="adver_location_text">نوبنیاد-دقایقی پیش</span>
                    </div>
                    <div class="head_left">
                        <div class="box_1">
                            <span class="title">25 شانس</span>
                            <span class="sub_title">شانسی که به شما می دهد</span>
                        </div>

                        <div class="box_2">
                            <span class="title">130 هزار تومان</span>
                            <span class="sub_title">قیمت</span>
                        </div>
                    </div>
                </div>
                <div class="adver_item_txt">
                    <div class="adver_text">
                        <p>خانه ویلایی حیاط خلوت پارکینگ (حیاط)
                            در فردوسیه شهریار
                            جای شیک و دنج با همسایه های ارام و ساکت
                            مناسب برای زندگی و یا ساخت و ساز
                            قیمت هر متر: ١٤٥٠</p>
                        <a class="read_more" onclick="show_details(this)" >ادامه...</a>
                    </div>

                    <div class="adver_img owl-carousel">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">
                        <img src="static/image/-usams-66s.jpg">


                    </div>

                </div>

            </div>
            <div class="details">
                <i class="fa fa-times-circle remove_details" onclick="hide_details(this)"></i>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <p>خانه ویلایی حیاط خلوت پارکینگ (حیاط) در فردوسیه شهریار جای شیک و دنج با همسایه های ارام و ساکت مناسب برای زندگی و یا ساخت و ساز قیمت هر متر: ١٤٥٠
                                خانه ویلایی حیاط خلوت پارکینگ (حیاط) در فردوسیه شهریار جای شیک و دنج با همسایه های ارام و ساکت مناسب برای زندگی و یا ساخت و ساز قیمت هر متر: ١٤٥٠</p>
                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="owl-carousel">
                            <img src="static/image/-usams-66s.jpg">
                            <img src="static/image/-usams-66s.jpg">
                            <img src="static/image/-usams-66s.jpg">
                            <img src="static/image/-usams-66s.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div style="display: none" id="empty_result_search">
            <span class="title">موردی یافت نشد!</span>
            <span class="sub_title">محدوده جستجوی خود را بزرگتر کنید.</span>
        </div>


    </div>
</div>


<script>
    function hide_details(tag) {
        $(tag).parents('.details').fadeOut(400)
    }

    function show_details(tag) {
        $(tag).parents('.adver_item').find('.details').fadeIn(400)
    }
</script>


