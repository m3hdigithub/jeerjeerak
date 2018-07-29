<style>
    #my_profile_chance_account {
        height: 85%;
    }

    #my_profile_chance_account .container-fluid {
        padding: 0;
        height: 100%;
    }

    #my_profile_chance_account .container-fluid .row {
        margin: 0;
        height: 100%;
    }

    #my_profile_chance_account .item {
        border: 2px solid #fff;
        height: 100%;
        padding: 0;
    }

    #my_profile_chance_account .item .title {
        display: flex;
        width: 100%;
        height: 100%;
        padding: 13px;
        font-size: 16px;
        line-height: 28px;
        align-items: center;
        justify-content: center;

    }

    #my_profile_chance_account .text_item {
        border: 2px solid #fff;
        padding: 25px;
        background-color: var(--yellow);
        color: #000;
        line-height: 25px;
        height: 25%;
    }

    #my_profile_chance_account_form {
        float: none;
        width: 90%;
        padding: 30px;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        position: relative;
        margin: auto;
    }

    #my_profile_chance_account_form .form_title {
        display: block;
        text-align: right;
        color: #fff;
        font-size: 17px;
        width: 76%;
        margin: 7px auto;
    }

    #my_profile_chance_account_form .input_text {
        width: 250px;
        height: 47px;
        border: none;
        background-color: #07070e;
        outline: none;
        box-shadow: inset 0 0 16px black;
        margin-top: 10px;
        padding: 0 10px;
        color: #fff;
    }

    #my_profile_chance_account_form .input_div {
        margin: 25px 0;
    }

    #my_profile_chance_account_form input[type=checkbox] {
        float: right;
        margin-right: 0;
        background-color: #fff;
        width: 18px;
        margin-top: 6px;
    }

    #my_profile_chance_account_form #forget_name {
        color: var(--yellow);
    }

    #my_profile_chance_account_form button[type=submit] {
        width: 250px;
        height: 47px;
        border: none;
        background-color: #07070e;
        outline: none;
        box-shadow: inset 0 0 16px black;
        margin-top: 10px;
        padding: 0 10px;
        color: #fff;
        font-size: 22px;
    }


</style>


<div id="my_profile_chance_account">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 item">
                <div class="col-md-12 text_item">
                    <span class="title">
                        برای شرکت در قرعه کشی ها با از کسی خرید کنید که در سایت جیرجیرک باشد.
                    </span>
                </div>

                <div class="col-md-12 text_item">
                       <span class="title">

پس از خرید
                    <br>

 روی برگه و یا دفترجه ای که قبلا به فروشنده داده شده است یک نام جیرجیرکی دلخواه و مبلغ خریدتان را بنویسید

<br>

مرحه بعد
                       </span>
                </div>

                <div class="col-md-12 text_item">
                    <span class="title">
به صفحه آگهی متعلق به آن فروشنده در سایت جیرجیرک بروید
                    </span>

                </div>

                <div class="col-md-12 text_item">
                    <span class="title">
آن نام جیرجیرکی و مبلغ را در داخل سایت نیز وارد نمایید و در آخر به صفحه فعلی بیایید
                    </span>

                </div>

            </div>

            <div class="col-md-6 item">
                <div id="my_profile_chance_account_form">
                    <form action="">
                        <div class="input_div">
                            <span class="form_title">نام جیرجیرکی</span>
                            <input type="text" class="input_text">
                        </div>
                        <div class="input_div">
                            <span class="form_title">شماره تلفن همراه</span>
                            <input type="text" class="input_text">
                        </div>

                        <div class="input_div">
                            <input type="checkbox">
                            <span class="form_title">مرا به خاطر داشته باش!</span>

                            <a id="forget_name" href="">نام جیرجیرکی ام را فراموش کرده ام</a>
                        </div>

                        <div class="input_div">
                            <button type="submit">ورود</button>
                        </div>


                    </form>

                </div>
            </div>

        </div>
    </div>
</div>