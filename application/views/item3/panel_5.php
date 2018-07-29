<style>
    .h100 {
        height: 100%;
    }

    #profile_data {
        float: right;
        width: 100%;
        height: 300px;
        margin-top: 12%;
        background: var(--gray);
        color: #fff;
        padding: 20px;
    }

    #profile_data .profile_data_title {
        display: block;
        text-align: right;
        color: var(--yellow);
        font-size: 15px;
        font-weight: bold;
        margin-bottom: 60px;
    }

    #profile_data .input_title {
        display: block;
        text-align: right;
        margin-bottom: 11px;
    }

    #profile_data .input_value {
        display: block;
        text-align: center;
        margin: 10px 0;
        padding: 7px;
        border:2px solid #fff;
        height: 41px;
    }
    #profile_data .input_div {
        display: block;
        text-align: center;
        margin: 10px 0;
        padding: 7px;
        background-color: black;
        height: 41px;
        box-shadow: inset 0 0 13px black;
    }
    #profile_data .input_div input{
        height: 100%;
        width: 100%;
        outline: none;
        background-color: transparent;
        border: none;
        color: #fff;
        font-size: 15px;
    }

    #submit_form{
        display: block;
        width: 100%;
        margin: 10px 0;
        background-color: var(--gray);
        float: right;
        padding: 14px 0;
        cursor: pointer;
        color: #fff;
        font-size: 15px;
    }
</style>


<div class="h100">

    <div class="container-fluid h100">
        <div class="row h100">
            <div class="col-xs-10 col-md-offset-1">
                <div id="profile_data">
                    <div class="col-md-6 h100">
                        <span class="profile_data_title">تعویض مشخصات کاربری</span>

                        <div class="input">
                            <span class="input_title">نام جیرجیرکی فعلی شما</span>
                            <span class="input_value">ali 13265</span>
                        </div>

                        <div class="input">
                            <span class="input_title">شماره موبایل فعلی شما</span>
                            <span class="input_value">09223173902</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input">
                            <span class="input_title">نام جیرجیرکی  </span>
                            <div class="input_div">
                                <input type="text" placeholder="مثال 12345 Ali">
                            </div>

                        </div>

                        <div class="input">
                            <span class="input_title">تکرار نام جیرجیرکی  </span>
                            <div class="input_div">
                                <input type="text" placeholder="مثال 12345 Ali">
                            </div>

                        </div>

                        <div class="input">
                            <span class="input_title">شماره موبایل </span>
                            <div class="input_div">
                                <input type="text" placeholder="مثال 09223173902">
                            </div>

                        </div>

                    </div>
                </div>
                <a id="submit_form">تعویض مشخصات کاربری</a>
            </div>
        </div>
    </div>


</div>