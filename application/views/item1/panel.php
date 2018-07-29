<style>


    #content1 .form {
        float: left;
        width: 29%;
        height: 100%;
        background-color: var(--gray);
        border: 2px solid var(--yellow);
        border-bottom: 0;
        border-top: 0;
    }

    #content1 .form .form_title {
        display: block;
        margin: 10px 0;
        color: #fff;
        font-size: 15px;
        text-align: right;
        padding-right: 84px;
        font-weight: bold;
        position: relative;
    }

    #content1 .form .form_title .q_text {
        width: 63%;
        margin: 10px auto;
        padding: 9px;
        background-color: #ccc;
        position: absolute;
        left: 0;
        right: 0;
        font-size: 12px;
        display: none;
        z-index: 999;
    }

    #content1 .form .form_title .q_text .q_text_title {
        color: #1c1c81;
        font-weight: bold;
        display: block;
    }

    #content1 .form .form_title .q_text p {
        line-height: 20px;
        text-shadow: 1px 0px 9px #797777;
    }

    #content1 .form .input_text {
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

    #content1 .form .input_div {
        margin: 25px 0;
    }

    #content1 .form input[type=checkbox] {
        float: right;
        margin-right: 60px;
        background-color: #fff;
        width: 18px;
    }

    #content1 .form #forget_name {
        color: var(--yellow);
    }

    #content1 .form button[type=submit] {
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

    #content1 #panel {
        position: relative;
        z-index: 99;
    }

    #content1 #panel #panel_header {
        float: right;
        width: 100%;
        height: 25%;
        overflow: hidden;
        border-bottom: 2px solid var(--yellow);
    }

    #content1 #panel #panel_header img {
        width: 100%;
        height: 100%;
    }

    #content1 #panel #panel_body {
        float: right;
        width: 100%;
        height: 65%;
        border-bottom: 2px solid var(--yellow);
    }

    #content1 #panel #panel_body #panel_top {
        float: right;
        width: 100%;
        height: 70%;
        border-bottom: 2px solid var(--yellow);
    }

    #content1 #panel #panel_body #panel_bottom {
        float: right;
        width: 100%;
        height: 46%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
        color: var(--yellow);
        overflow: hidden;
    }

    #content1 #panel #panel_body #panel_bottom img {
        width: 100%;
        height: 100%;
    }

    #content1 #panel_sidebar {
        float: left;
        width: 15%;
        height: 100%;
        border-right: 2px solid var(--yellow);
    }

    #content1 #panel_sidebar ul {
        padding: 0;
        margin: 0;
        height: 100%;
        width: 100%;
        float: right;
    }

    #content1 #panel_sidebar ul li {
        height: 20%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #content1 #panel_sidebar ul li i.fa {
        color: #fff;
        width: 40px;
        height: 40px;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--red);
    }

    #content1 #panel_sidebar ul li i.fa.active {
        color: #fff;
        width: 40px;
        height: 40px;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #ccc;
    }

    #content1 #panel_list {
        float: right;
        width: 85%;
        height: 100%;
    }

    #content1 #panel_list ul {
        padding: 0;
        margin: 0;
        height: 100%;
        width: 100%;
    }

    #content1 #panel_list ul li {
        height: 20%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        color: #fff;
        background-color: var(--red);
    }

    #content1 #panel_list ul li.active a {
        color: #000;
    }

    #content1 #panel_list ul li a {
        display: block;
        color: #fff;
        cursor: pointer;
    }

    #content1 #panel_list ul li:nth-child(even) {
        background-color: #f15025a8;
    }

    #content1 #panel_footer {
        float: right;
        width: 100%;
        height: 10%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
    }

    #content1 #panel_footer a {
        color: var(--red);
    }

    #content1 #panel_text {
        position: relative;
        float: left;
        width: 71%;
        height: 100%;
    }

    #content1 #panel_text #panel_box {
        width: 92%;
        margin: auto;
        height: 100%;
        overflow: hidden;
        position: relative;
        background-color: var(--gray);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #content1 #panel_text #panel_box > div {
        width: 95%;
    }

    #content1 #panel_text #panel_box .q_box {
        height: 98px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--yellow);
        margin-bottom: 18px;
        color: #000;
        font-size: 15px;
        box-shadow: 0px 1px 6px #949292;
        float: left;
        width: 100%;
        overflow: hidden;
        position: relative;
    }

    #content1 #panel_text #panel_box .q_box:last-child {
        margin-bottom: 0;
    }


</style>

<div id="panel_text">
    <div id="login_text_border_right"></div>
    <div id="panel_box">
        <?php
        include_once "panel_profile.php";
        ?>
    </div>
    <div id="login_text_border_left"></div>
</div>

<div class="form" id="panel">
    <div id="panel_header">
        <img src="static/image/568341.jpg">
    </div>

    <div id="panel_body">
        <div id="panel_top">
            <div id="panel_sidebar">
                <ul>
                    <li><i class="fa fa-question active"></i></li>
                    <li><i class="fa fa-question active"></i></li>
                    <li><i class="fa fa-question active"></i></li>
                    <li><i class="fa fa-question active"></i></li>
                    <li><i class="fa fa-question active"></i></li>
                </ul>
            </div>
            <div id="panel_list">
                <ul>
                    <li class="active"><a onclick="show_content_1(1)">آرشیو برندگا قبلی جیرجیرک</a></li>
                    <li><a onclick="show_content_1(2)">آمار قرعه کشی پسفردا تا این لحظه</a></li>
                    <li><a onclick="show_content_1(3)">آمار قرعه کشی تیر 97 تا این لحظه</a></li>
                    <li><a onclick="show_content_1(4)">آمار قرعه کسی پایان سال 97 تا این لحظه</a></li>
                    <li><a onclick="show_content_1(5)">صفحه قرعه کشی/کسب درامد</a></li>
                </ul>
            </div>
        </div>
        <div id="panel_bottom">
            <img src="static/image/48488796-young-man-using-a-laptop-building-online-business-making-money-dollar-bills-cash-falling-down-money-.jpg">
        </div>
    </div>


</div>

<script>

    $(document).ready(function () {
        
        $('#panel_list ul li').click(function () {
            $('#panel_list ul li').removeClass('active');
            $(this).addClass('active');
        });

       // show_content_1(1);
    });

    function show_content_1(item) {

        $('#content1 #panel_box').html('');

        $('#content1 #panel_box').load("<?= $baseUrl ?>index/load_item_2/"+item);

    }

    function show_tab(tag) {
        var index = $(tag).index();
        $('#tabs ul li').removeClass('active');
        $(tag).addClass('active');
        $('#client_result').find('section').fadeOut(0);
        $('#client_result').find('section').eq(index).fadeIn(300);
    }


    function goto_next(item) {
        $('#client_result').find('section').fadeOut(0);
        $('#sec' + item).fadeIn(200);
        $('#tabs').find('li').removeClass('active');
        $('#tabs').find('li').eq(item - 1).addClass('active');
    }


</script>