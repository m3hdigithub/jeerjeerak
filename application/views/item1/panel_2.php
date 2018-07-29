<style>


    #chance_stat {
        width: 95%;
        height: 85%;
        background-color: #eee;
        position: relative;
    }

    #chance_stat .container-fluid {
        padding: 0;
    }

    #chance_stat .row {
        margin: 0;
    }

    #content_head span {
        height: 110px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 23px;
        font-weight: bold;
        color: var(--gray);
    }

    #content_body .container-fluid {
        padding: 0;
    }

    #content_body .container-fluid .col-md-4 {
        padding: 0;
    }

    #content_body .row {
        margin: 0;
    }

    #content_body .col_title {
        height: 110px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        font-weight: bold;
        color: var(--gray);
        border: 2px solid #fff;
    }

    #content_footer span {
        height: 110px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 23px;
        font-weight: bold;
        color: var(--gray);
    }

    #stat_char {
        position: absolute;
        right: 0;
        left: 0;
        bottom: 0;
        height: 130px;
    }

    #stat_char .stat_title {
        display: flex;
        width: 100%;
        text-align: center;
        justify-content: center;
        align-items: center;
        height: 130px;
        font-size: 20px;
        color: var(--red);
        font-weight: bold;
        background-color: var(--gray);
        border: 4px solid #fff;
    }

    #stat_char div {
        padding: 0;
    }

    #stat_char .box_num {
        height: 120px;
        border: 2px solid var(--gray);
        margin-top: 5px;
        background-color: var(--red);
        color: #fff;
        font-size: 20px;
    }

    #stat_char .stat_num {
        height: 75%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 50px;
    }

    #stat_char .stat_unit {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        color: var(--gray);
        font-weight: bold;
    }

</style>


<div id="chance_stat">
    <div id="content">
        <div id="content_head">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <span style="color: var(--red);" class="txt1">برای شرکت در قرعه کشی ها</span>

                    </div>

                    <div class="col-md-8">
                        <span class="txt2">باید از کسی خرید کنید که داخل سایت جیرجیرک باشد.</span>
                    </div>
                </div>
            </div>
        </div>

        <div id="content_body">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-4">
                        <span class="col_title">پش از خرید</span>
                    </div>

                    <div class="col-md-4">
                        <span class="col_title">روی برگه یا دفترچه که نزد فروشمده است</span>
                    </div>

                    <div class="col-md-4">
                        <span class="col_title">یک <a style="color: var(--red)">نام جیرجیرکی</a> دلخواه و مبلغ خریدتان را بنویسید</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <span class="col_title">مرحله بعد</span>
                    </div>

                    <div class="col-md-4">
                        <span class="col_title">به آگهی متعلق به آن فروشنده در سایت بروید</span>
                    </div>

                    <div class="col-md-4">
                        <span class="col_title"> آن نام جیرجیرکی و مبلغ را در داخل سایت نیز وارد نمایید</span>
                    </div>
                </div>


            </div>
        </div>

        <div id="content_footer">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-4">
                        <span style="color: var(--red);" class="txt1">و در اخر برای ثبت نام</span>

                    </div>
                    <div class="col-md-8">
                        <span class="txt2">به صفحه <a style="color: var(--red)">قرعه کشی/ کسب درامد</a> وارد شوید</span>
                    </div>

                </div>
            </div>
        </div>

        <div id="stat_char">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-8 box_txt">
                            <span class="stat_title" style="border-left: 0">مبلغ قرعه کشی</span>
                        </div>

                        <div class="col-md-4 box_num" style="border-left: 2px solid #fff;">
                            <span class="stat_num">868</span>
                            <span class="stat_unit">میلیون</span>
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="col-md-4 box_num" style="border-right: 2px solid #fff;">
                            <span class="stat_num">564</span>
                            <span class="stat_unit">هزار</span>
                        </div>


                        <div class="col-md-8 box_txt">
                            <span class="stat_title" style="border-right: 0">تعداد شرکت کنندگان</span>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>