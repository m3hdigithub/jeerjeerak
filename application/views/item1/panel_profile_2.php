<style>

    #panel_2 {
        height: 100%;
        background-color: #eaeaea;
        position: relative;
    }

    #panel_2 ul {
        padding: 0;
        margin: 0;
        height: 90%;
        width: 100%;
    }

    #panel_2 ul li {
        padding: 18px 0;
        border-bottom: 2px solid #fff;
        background-color: var(--gray);
        color: #fff;
        font-size: 15px;
        font-weight: bold;
        float: right;
        width: 100%;
    }

    #panel_2 ul li .my_sale_txt {
        float: right;
        width: 25%;
        height: 100%;
        display: block;
    }

    #panel_2 ul li .my_sale_ok {
        color: var(--green);
    }

    #panel_2 ul li .my_sale_not {
        color: var(--red);
    }

    #panel_2 .my_last_sale {
        height: 10%;
        display: flex;
        align-items: center;
        color: var(--gray);
        justify-content: center;
        font-size: 17px;
        font-weight: bold;
        border-top: 0;
        background-color: #ccc;
        cursor: pointer;
    }

    #panel_2 .show_question {
        cursor: pointer;
        color: var(--yellow) !important;

    }

    #show_question {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        z-index: 999;
        background-color: var(--gray);
        padding: 15px;
        display: none;
    }

    #show_question .fa {
        position: absolute;
        right: 10px;
        top: 10px;
        background-color: var(--red);
        border-radius: 5px;
        cursor: pointer;
        color: #fff;
        font-size: 31px;
        display: flex;
        height: 40px;
        width: 40px;
        align-items: center;
        justify-content: center;
        padding-bottom: 3px;
        box-shadow: 0 0 14px #131212;
    }

    #show_question .alert_q {
        display: block;
        padding: 15px 0;
        color: #ccc;
        font-size: 16px;
        font-weight: bold;
    }

    #show_question .box {
        width: 70%;
        margin: 10% auto;
        height: 58%;
        background-color: #1e2e38;
        padding: 7px;
    }

    #show_question .box .q_item {
        margin-bottom: 10px;
    }

    #show_question .q_title {
        display: block;
        padding: 11px 0;
        color: #ccc;
        font-size: 16px;
        font-weight: bold;
    }

    #show_question .q_btns {
        width: 90%;
        height: 45px;
        margin: auto;
    }

    #show_question .q_btn_yes {
        float: right;
        width: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: #000;
        background-color: #6bd42559;
        font-size: 18px;
        font-weight: bold;
    }

    #show_question .q_btn_yes span {
        width: 83%;
        height: 88%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--green);
        cursor: pointer;
    }

    #show_question .q_btn_no {
        float: right;
        width: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: #000;
        background-color: #f1502578;
        font-size: 18px;
        font-weight: bold;
    }

    #show_question .q_btn_no span {
        width: 83%;
        height: 88%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--red);
        cursor: pointer;
    }


    #show_question .q_btn_yes.active{
        background-color: var(--green);
    }

    #show_question .q_btn_no.active{
        background-color: var(--red);
    }

    #q_message {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        z-index: 999;
        background-color: var(--gray);
        padding: 15px;
        display: none;
        align-items: center;
        justify-content:center;
    }

    #q_message p{
        font-size: 19px;
        color: #fff;
    }

    #q_message .fa {
        position: absolute;
        right: 10px;
        top: 10px;
        background-color: var(--red);
        border-radius: 5px;
        cursor: pointer;
        color: #fff;
        font-size: 31px;
        display: flex;
        height: 40px;
        width: 40px;
        align-items: center;
        justify-content: center;
        padding-bottom: 3px;
        box-shadow: 0 0 14px #131212;
    }



</style>


<div id="panel_2">
    <ul>
        <li>
            <span class="my_sale_txt">موبایل فروشی احسان</span>
            <span class="my_sale_txt">45,500  تومان</span>
            <span class="my_sale_txt my_sale_ok ">تایید شد</span>
            <span onclick="show_box_question(this)" class="my_sale_txt show_question">پاسخ به سوال</span>

        </li>

        <li>
            <span class="my_sale_txt">موبایل فروشی احسان</span>
            <span class="my_sale_txt">45,500  تومان</span>
            <span class="my_sale_txt my_sale_not">رد شد</span>
            <span onclick="show_box_question(this)" class="my_sale_txt show_question">پاسخ به سوال</span>
        </li>


    </ul>

    <a href="" class="my_last_sale">خرید های گذشته من</a>
</div>

<div id="show_question">
    <i onclick="close_box_question();" class="fa fa-times"></i>
    <span class="alert_q">فروشنده از پاسخ شما اطلاعی نخواهد یافت</span>

    <div class="box">
        <div class="q_item">
            <span class="q_title">آیا از اخلاق و رفتارشان راضی بودید؟</span>
            <div class="q_btns">
                <a class="q_btn_yes"><span>بله</span></a>
                <a class="q_btn_no"><span>خیر</span></a>
            </div>
        </div>

        <div class="q_item">
            <span class="q_title">آیا قیمتشان منصفانه بود؟</span>
            <div class="q_btns">
                <a class="q_btn_yes"><span>بله</span></a>
                <a class="q_btn_no"><span>خیر</span></a>
            </div>
        </div>

        <div class="q_item">
            <span class="q_title">آیا ایشان را به دیگران توصیه می کنید؟</span>
            <div class="q_btns">
                <a class="q_btn_yes"><span>بله</span></a>
                <a class="q_btn_no"><span>خیر</span></a>
            </div>
        </div>
    </div>
</div>

<div id="q_message">
    <i class="fa fa-times"></i>
    <p><span style="color: var(--yellow);">  25 شانس</span>  در قرعه کشی 25/5/97 به دست اوردید.</p>
</div>




<script>


    $(document).ready(function () {
        $('#q_message').find('.fa').click(function () {
           $(this).parent().fadeOut(300);
           $('#panel_2').html('');
           $('#panel_2').load('index/load_panel_3/2_list');
        });


       $('#show_question .q_btns').find('a').click(function () {
           $(this).parent().find('a').removeClass('active');
           $(this).addClass('active');

           var q_1=$('#show_question .q_btns').eq(0).find('a').hasClass('active');
           var q_2=$('#show_question .q_btns').eq(1).find('a').hasClass('active');
           var q_3=$('#show_question .q_btns').eq(2).find('a').hasClass('active');

           if(q_1 && q_2 && q_3){
               show_message();
               $('#show_question .q_btns').find('a').removeClass('active');
           }
       })
    });

    function close_box_question() {
        $('#show_question').fadeOut(300);
    }
    function show_box_question(tag) {
        $('#show_question').fadeIn(300);
    }

    function show_message() {
        close_box_question();
        $('#q_message').css('display','flex');
    }


</script>