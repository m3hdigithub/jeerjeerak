<style>
    #may_ads {
        padding: 5px;
        height: 100%;
        width: 100%;
        background-color: #eee;
    }

    #my_ads_head {
        background-color: var(--gray);
        height: 50px;
        width: 100%;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 14px;

    }

    #my_ads_body {
        height: 90%;
        width: 100%;
    }

    .bg_dark {
        background-color: #000;
    }

    .bg_white {
        background-color: #ccc;
        height: 100%;
    }

    #may_ads .stat_icon {
        display: block;
        height: 50px;
        width: 50px;
        margin: 10px auto;
        cursor: pointer;
    }

    #my_ads_body .my_ads_item {
        margin-bottom: 10px;
    }

    #my_ads_body .my_ads_item .img_content {
        padding: 5px;

    }

    .padding {
        padding: 10px 5px;
        height: 160px;
    }

    #my_ads_body .my_ads_item .my_ads_state {
        display: block;
        text-align: right;
        padding-right: 27px;
        padding-top: 7px;
        font-size: 15px;
        color: #000;
        font-weight: bold;
        margin-bottom: 10px;
    }

    #my_ads_body .my_ads_item .my_ads_title {
        display: inline-block;
        float: right;
        margin-right: 22px;
        height: 35px;
        border: 2px solid #9c9999;
        padding: 5px;
        background-color: #fff;
        width: 300px;
        overflow: hidden;
    }

    #my_ads_body .my_ads_item .Upgrade, .edit, .gallery {
        display: inline-block;
        float: right;
        height: 35px;
        margin: 0 5px;
        border: 2px solid #9c9999;
        padding: 5px 10px;
        background-color: #fff;
        overflow: hidden;
        cursor: pointer;
    }

    #my_ads_body .my_ads_item .text_content_2 {
        background-color: var(--gray);
        height: 100%;
        width: 100%;
        padding: 25px;
        color: var(--yellow);
        font-size: 15px;
        display: none;
        line-height: 31px;
    }

    #my_ads_body .my_ads_item .link_content_2 {
        background-color: #000;
        height: 100%;
        width: 100%;
        padding: 10px;
        display: none;
    }

    #my_ads_body .my_ads_item .stat_text {
        height: 100%;
        background-color: var(--yellow);
        padding: 15px;
        color: #000;
        font-size: 15px;
        line-height: 26px;
        font-weight: bold;
        position: relative;
        display: none;
    }

    #my_ads_body .my_ads_item .stat_text span.text {
        display: block;
        width: 62%;
        margin: auto;
        padding-top: 15px;
    }

    #my_ads_body .my_ads_item .stat_text .text_bottom {
        position: absolute;
        width: 100%;
        right: 0;
        left: 0;
        bottom: 0;
        font-size: 12px;
        height: 21px;
        line-height: 20px;
        background-color: #0000000d;
    }

    #my_ads_body .my_ads_item .stat_chart {
        height: 100%;
        background-color: var(--yellow);
        color: #000;
        font-size: 15px;
        line-height: 26px;
        font-weight: bold;
        position: relative;
        display: none;
    }

    #my_ads_body .my_ads_item .stat_chart .text_bottom {
        position: absolute;
        width: 100%;
        right: 0;
        left: 0;
        bottom: 0;
        font-size: 9px;
        height: 16px;
        line-height: 20px;
        background-color: #0000000d;
    }

    #my_ads_body .my_ads_item .link_content_2 .top_list, #my_ads_body .my_ads_item .link_content_2 .tamdid {
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #fff;
        background-color: var(--yellow);
        margin-bottom: 15px;
        color: #000;
        font-size: 17px;
        cursor: pointer;
    }

    .stat_chart .charts {
        padding: 0;
        margin: 0;
        height: 86%;
        width: 100%;
        position: relative;
    }

    .stat_chart .charts li {
        height: 78%;
        width: 24%;
        display: flex;
        align-items: center;
        flex-direction: column;
        position: relative;
        bottom: -33px;
        float: right;
    }

    .stat_chart .charts li .chart_title {
        position: absolute;
        top: -28px;
        font-size: 2px;
        transform: rotate(-90deg);
        z-index: 4;
        background-color: #f9c80e;
    }

    .stat_chart .charts li .chart_progress {
        position: absolute;
        bottom: 0;
        width: 72%;
        height: 50%;
        background-color: var(--gray);
        z-index: 2;
        opacity: 1;
        transition: all 0.4s;
        box-shadow: 0 0 11px #636363;
        cursor: pointer;
    }

    .stat_chart .charts li .chart_progress.active {
        background-color: #a59352;
    }

    .stat_chart .charts li .chart_progress:hover {
        opacity: 0.8;
        transition: all 0.4s;
    }

    .stat_chart .charts li .line {
        display: block;
        height: 100%;
        width: 2px;
        position: absolute;
        top: 0;
        bottom: 0;
        background-color: #d4b338;
        z-index: 0;
    }

    .stat_chart .charts li .chart_progress .curent_val {

        position: absolute;
        left: 0;
        right: 0;
        font-size: 7px;
        bottom: 84%;
        margin: 0;
        padding: 0;
        color: #FFFFFF;
    }

    .stat_chart_2 {
        display: none;
        height: 100%;
        width: 100%;
        background-color: var(--yellow);
        padding: 0;
        position: relative;
    }

    .stat_chart_2 .text_bottom {
        position: absolute;
        width: 100%;
        right: 0;
        left: 0;
        bottom: 0;
        font-size: 12px;
        height: 21px;
        line-height: 20px;
        background-color: #0000000d;
    }

    .stat_chart_2 .charts {
        padding: 0;
        margin: 0;
        height: 86%;
        width: 100%;
        position: relative;
        direction: ltr;
        overflow: hidden;
    }

    .stat_chart_2 .charts li {
        height: 100%;
        width: 55px;
        display: flex;
        align-items: center;
        flex-direction: column;
        position: relative;
        bottom: 0;
        float: right;
    }

    .stat_chart_2 .charts li .chart_title {
        position: absolute;
        top: -28px;
        font-size: 2px;
        transform: rotate(-90deg);
        z-index: 4;
        background-color: #f9c80e;
    }

    .stat_chart_2 .charts li .chart_progress {
        position: absolute;
        bottom: 0;
        width: 72%;
        height: 50%;
        background-color: var(--gray);
        z-index: 2;
        opacity: 1;
        transition: all 0.4s;
        box-shadow: 0 0 11px #636363;
        cursor: pointer;
    }

    .stat_chart_2 .charts li .chart_progress.active {
        background-color: #a59352;
    }

    .stat_chart_2 .charts li .chart_progress:hover {
        opacity: 0.8;
        transition: all 0.4s;
    }

    .stat_chart_2 .charts li .line {
        display: block;
        height: 100%;
        width: 2px;
        position: absolute;
        top: 0;
        bottom: 0;
        background-color: #d4b338;
        z-index: 0;
    }

    .stat_chart_2 .charts li .chart_progress .curent_val {

        position: absolute;
        left: 0;
        right: 0;
        font-size: 7px;
        bottom: 84%;
        margin: 0;
        padding: 0;
        color: #FFFFFF;
    }

    .stat_chart_2 .charts div {
        direction: ltr;
    }

    #my_ads_item .owl-prev.owl-next, .owl-dot, .owl-nav {
        display: none !important;
    }

    .owl-item {
        height: 100%;
        float: right;
    }

    .owl-loaded {
        height: 100%;
    }

    .owl-stage-outer {
        height: 100%;
    }

    .owl-stage {
        height: 100%;
    }

    @media screen and (max-width: 1450px) {
        #my_ads_body .my_ads_item .my_ads_title {
            display: inline-block;
            float: right;
            margin-right: 22px;
            height: 35px;
            border: 2px solid #9c9999;
            padding: 5px;
            background-color: #fff;
            width: 225px;
            overflow: hidden;
        }

    }
</style>


<div id="may_ads">
    <div id="my_ads_head">
        <span>محل نمایش خطلا ها و پیغام ها</span>
    </div>

    <div id="my_ads_body">
        <div class="my_ads_item">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1 bg_dark padding">
                        <div class="img_content bg_white">
                            <img class="stat_icon" src="static/image/stat.png">
                            <img class="stat_icon" src="static/image/chnce.png">
                        </div>
                    </div>

                    <div class="col-md-8 bg_dark padding">
                        <div class="text_content bg_white">
                            <span class="my_ads_state">درحال بررسی</span>
                            <span class="my_ads_title">قاپ ایفون کاملا سالم</span>
                            <a class="Upgrade">ارتقا</a>
                            <a class="edit">ویرایش</a>
                        </div>
                        <div class="text_content_2">
                            <span>مبلغی که برای پرتاپ آگهی تان به ابتدای لیست آگهی ها یا تمدید آگهی تان پس از انقضاء می پردازید، تبدیل به شانس قرعه کشی برای خریدارتان می شود.</span>
                        </div>
                        <div class="stat_text">
                            <span class="text">
                                روی یک ستون از نمودار میله ای مقابل ضربه بزنید تا آمار پربیننده ترین آگهی های مشابه ظاهر شود
                            </span>
                            <span class="text_bottom">آمار بازدید از رقبای شما</span>
                        </div>
                        <div class="stat_chart_2">
                            <ul class="charts">
                                <li>
                                    <div onclick="add_active_class(this)" class="chart_progress">
                                        <span class="curent_val">20</span>
                                    </div>
                                    <i class="line"></i>
                                </li>
                                <li>
                                    <div onclick="add_active_class(this)" class="chart_progress">
                                        <span class="curent_val">20</span>
                                    </div>
                                    <i class="line"></i>
                                </li>
                                <li>
                                    <div onclick="add_active_class(this)" class="chart_progress">
                                        <span class="curent_val">20</span>
                                    </div>
                                    <i class="line"></i>
                                </li>
                                <li>
                                    <div onclick="add_active_class(this)" class="chart_progress">
                                        <span class="curent_val">20</span>
                                    </div>
                                    <i class="line"></i>
                                </li>
                                <li>
                                    <div onclick="add_active_class(this)" class="chart_progress">
                                        <span class="curent_val">20</span>
                                    </div>
                                    <i class="line"></i>
                                </li>
                                <li>
                                    <div onclick="add_active_class(this)" class="chart_progress">
                                        <span class="curent_val">20</span>
                                    </div>
                                    <i class="line"></i>
                                </li>
                                <li>
                                    <div onclick="add_active_class(this)" class="chart_progress">
                                        <span class="curent_val">20</span>
                                    </div>
                                    <i class="line"></i>
                                </li>
                                <li>
                                    <div onclick="add_active_class(this)" class="chart_progress">
                                        <span class="curent_val">20</span>
                                    </div>
                                    <i class="line"></i>
                                </li>
                                <li>
                                    <div onclick="add_active_class(this)" class="chart_progress">
                                        <span class="curent_val">20</span>
                                    </div>
                                    <i class="line"></i>
                                </li>
                                <li>
                                    <div onclick="add_active_class(this)" class="chart_progress">
                                        <span class="curent_val">20</span>
                                    </div>
                                    <i class="line"></i>
                                </li>
                                <li>
                                    <div onclick="add_active_class(this)" class="chart_progress">
                                        <span class="curent_val">20</span>
                                    </div>
                                    <i class="line"></i>
                                </li>
                                <li>
                                    <div onclick="add_active_class(this)" class="chart_progress">
                                        <span class="curent_val">20</span>
                                    </div>
                                    <i class="line"></i>
                                </li>
                                <li>
                                    <div onclick="add_active_class(this)" class="chart_progress">
                                        <span class="curent_val">20</span>
                                    </div>
                                    <i class="line"></i>
                                </li>
                                <li>
                                    <div onclick="add_active_class(this)" class="chart_progress">
                                        <span class="curent_val">20</span>
                                    </div>
                                    <i class="line"></i>
                                </li>
                                <li>
                                    <div onclick="add_active_class(this)" class="chart_progress">
                                        <span class="curent_val">20</span>
                                    </div>
                                    <i class="line"></i>
                                </li>
                                <li>
                                    <div onclick="add_active_class(this)" class="chart_progress">
                                        <span class="curent_val">20</span>
                                    </div>
                                    <i class="line"></i>
                                </li>
                                <li>
                                    <div onclick="add_active_class(this)" class="chart_progress">
                                        <span class="curent_val">20</span>
                                    </div>
                                    <i class="line"></i>
                                </li>
                                <li>
                                    <div onclick="add_active_class(this)" class="chart_progress">
                                        <span class="curent_val">20</span>
                                    </div>
                                    <i class="line"></i>
                                </li>


                            </ul>
                            <span class="text_bottom">روی هر ستون بزنید تا ببینید متعلق به کدام آگهی است.</span>
                        </div>

                    </div>

                    <div class="col-md-3 bg_dark padding">
                        <div class="text_content bg_white">
                            <span class="my_ads_state">درحال بررسی</span>
                            <a class="gallery">گالری</a>
                            <a class="edit">ویرایش</a>
                        </div>
                        <div class="link_content_2 bg_white">
                            <a class="top_list">بالابر</a>
                            <a class="tamdid">تمدید</a>
                        </div>
                        <div class="stat_chart">
                            <ul class="charts">
                                <li>
                                    <span class="chart_title">امروز</span>
                                    <div class="chart_progress">
                                        <span class="curent_val">20</span>
                                    </div>
                                    <i class="line"></i>
                                </li>
                                <li>
                                    <span class="chart_title">دیروز</span>
                                    <div class="chart_progress">
                                        <span class="curent_val">20</span>
                                    </div>
                                    <i class="line"></i>
                                </li>
                                <li>
                                    <span class="chart_title">هفته قبل</span>
                                    <div class="chart_progress">
                                        <span class="curent_val">20</span>
                                    </div>
                                    <i class="line"></i>
                                </li>
                                <li>
                                    <span class="chart_title">ماه قبل</span>
                                    <div class="chart_progress">
                                        <span class="curent_val">20</span>
                                    </div>
                                    <i class="line"></i>
                                </li>

                            </ul>
                            <span class="text_bottom">آمار بازدید از آکهی شما</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<script>
    $(document).ready(function () {

        $("#my_ads_body").mCustomScrollbar({
            autoHideScrollbar: true,
            theme: "dark"
        });


        $('.Upgrade').click(function () {
            var tag = $(this);
            $(tag).parents('.my_ads_item').find('.text_content').fadeOut(0);
            $(tag).parents('.my_ads_item').find('.text_content_2').fadeIn(300);
            $(tag).parents('.my_ads_item').find('.link_content_2').fadeIn(300);
        });

        $('.stat_icon').click(function () {
            var tag = $(this);
            $(tag).parents('.my_ads_item').find('.text_content').fadeOut(0);
            $(tag).parents('.my_ads_item').find('.text_content_2').fadeOut(0);
            $(tag).parents('.my_ads_item').find('.link_content_2').fadeOut(0);
            $(tag).parents('.my_ads_item').find('.stat_chart_2').fadeOut(0);
            $(tag).parents('.my_ads_item').find('.stat_text').fadeIn(300);
            $(tag).parents('.my_ads_item').find('.stat_chart').fadeIn(300);
        });

        $('.stat_chart .charts li .chart_progress').click(function () {

            $('.stat_chart .charts li .chart_progress').removeClass('active');
            $(this).addClass('active');

            $(this).parents('.my_ads_item').find('.stat_text').fadeOut(0);
            $(this).parents('.my_ads_item').find('.stat_chart_2').fadeIn(300);

        });


        $('.stat_chart_2 .charts').owlCarousel({
            margin: 0,
            items: 10

        });
    });

    function add_active_class(tag) {
        $('.stat_chart_2').find('.chart_progress').removeClass('active');
        $(tag).addClass('active');
    }
</script>