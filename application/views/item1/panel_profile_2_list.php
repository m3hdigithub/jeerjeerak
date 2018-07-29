<style>

    #my_sale_list .head span {
        display: flex;
        height: 55px;
        align-items: center;
        justify-content: center;
        color: #000;
        font-size: 17px;
        font-weight: bold;
    }

    #my_sale_list .my_sale_list_item > li {
        height: 55px;
        background-color: #fff;
        padding: 0;
        float: none;
    }

    #my_sale_list .my_sale_list_item > li .container-fluid {
        padding: 0;
        height: 100%;
    }

    #my_sale_list .my_sale_list_item > li .container-fluid .row {
        padding: 0;
        height: 100%;
    }

    #my_sale_list .my_sale_list_item > li .container-fluid .row .col-md-4 {
        padding: 0;
        height: 100%;
    }

    #my_sale_list .my_sale_list_item > li .txt {
        display: flex;
        align-items: center;
        justify-content: center;
        color: #000;
        font-size: 16px;
        font-weight: bold;
        background-color: var(--yellow);
        height: 100%;
    }

    #my_sale_list .my_sale_list_item > li .txt > .fa {
        position: relative;
        width: 40px;
        height: 40px;
        right: -54px;
        color: #fff;
        background-color: var(--gray);
        border-radius: 5px;
        cursor: pointer;
        box-shadow: 0 0 7px #3a3a3a;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        transition: all 0.5s;
    }

    #my_sale_list .my_sale_list_item > li .txt > .fa.active {
        position: relative;
        width: 40px;
        height: 40px;
        right: -54px;
        color: #fff;
        background-color: var(--red);
        border-radius: 5px;
        cursor: pointer;
        box-shadow: 0 0 7px #3a3a3a;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        transform: rotate(180deg);
        transition: all 0.5s;
    }

    #my_sale_list .my_sale_list_item > li .sub_list {

        width: 100%;
        margin: 0;
        padding: 0;
        display: none;
    }

    #my_sale_list .my_sale_list_item > li .sub_list li {
        background-color: #fff;
        color: #000;
        font-size: 15px;
        font-weight: bold;
        border-bottom: 2px solid #000;
        float: none;
    }

    #my_sale_list .my_sale_list_item > li .sub_list li span {
        height: 100%;
        display: block;
        text-align: center;
    }

    #chance_code {
        padding: 5px;
        height: 100%;
        background-color: var(--gray);
        display: none;
        position: relative;
    }

    #chance_code .title {
        display: block;
        width: 100%;
        color: var(--yellow);
        font-size: 17px;
        padding-top: 25%;
        font-weight: bold;
        margin-bottom: 15px;

    }

    #chance_code .code {
        display: inline-block;
        color: var(--yellow);
        width: 25%;
        font-size: 13px;
        font-weight: bold;
        margin: 10px 0;
    }

    #chance_code .fa {
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


<div id="my_sale_list">
    <div class="head"><span>خرید های امروز من</span></div>
    <div class="my_sale_list">
        <ul class="my_sale_list_item">
            <li>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                              <span class="txt">
                <i class="fa fa-arrow-down show_sub_list"></i>
            2 خرید
            </span>
                        </div>
                        <div class="col-xs-12 col-md-4">
                              <span class="txt">
24,000 تومان
            </span>
                        </div>
                        <div class="col-xs-12 col-md-4">
                               <span class="txt">
                31/6/97
            </span>
                        </div>
                        <div class="col-xs-12 col-md-12">
                            <ul class="sub_list">
                                <li>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-4">
                                                <span>قاپ ایفون کاملا سالم</span>
                                            </div>
                                            <div class="col-xs-12 col-md-4">
                                                <span>12000 تومان</span>
                                            </div>
                                            <div class="col-xs-12 col-md-4">
                                                <span onclick="show_code(this)" style="color: var(--red);cursor: pointer">کد های شانس</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


            </li>

        </ul>
    </div>

</div>


<div id="chance_code">
    <i onclick="close_code();" class="fa fa-times"></i>
    <span class="title">کد های شانس حاصل شده :</span>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <span class="code">1234567889</span>
                <span class="code">1234567889</span>
                <span class="code">1234567889</span>
                <span class="code">1234567889</span>
                <span class="code">1234567889</span>
                <span class="code">1234567889</span>
                <span class="code">1234567889</span>
                <span class="code">1234567889</span>
                <span class="code">1234567889</span>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('.show_sub_list').click(function () {
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                $(this).parents('li').find('ul').slideUp(300);
            } else {
                $(this).addClass('active');
                $(this).parents('li').find('ul').slideDown(300);
            }

        })
    });

    function show_code(tag) {
        $('#my_sale_list').fadeOut(0,function () {
           $('#chance_code').fadeIn(300);
        });
    }

    function close_code() {
        $('#chance_code').fadeOut(0,function () {
            $('#my_sale_list').fadeIn(300);
        });
    }

</script>