<div id="panel_text">

    <div id="login_text_border_right"></div>
    <div id="panel_box">
        <div id="q_boxs">
            <div id="q1_box" class="q_box">
                <span>گزارش خرید مشتری را اینجا تایید می کنید تا بتواند در قرعه کشی شرکت کند.</span>
            </div>
            <div id="q2_box" class="q_box">
                <span>آگهی های خود را در اینجا ثبت و ارسال می کنید تا جیرجیرک تاییدشان کند.</span>
            </div>
            <div id="q3_box" class="q_box">
                <span>ویرایش آگهی ها و قرار دادن گالری عکس و ویرایش ان در اینجا انجام می شود</span>
            </div>
            <div id="q4_box" class="q_box">
                <span>در صورت نیاز می توانید حساب کاربری خود را اینجا شارژ کنید.</span>
            </div>
            <div id="q5_box" class="q_box">
                <span>نام جیرجیرکی و شماره تلفن همراه خود را می توانید اینجا تغیی دهید.</span>
            </div>
        </div>
    </div>
    <div id="login_text_border_left"></div>
</div>

<div class="form" id="panel">
    <div id="panel_header">
        <img src="static/image/48488796-young-man-using-a-laptop-building-online-business-making-money-dollar-bills-cash-falling-down-money-.jpg">
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
                    <li><a onclick="show_content(1)">مشتری های من</a></li>
                    <li><a onclick="show_content(2)">ثبت آگهی</a></li>
                    <li><a onclick="show_content(3)">آگهی های من</a></li>
                    <li><a onclick="show_content(4)">کیف پول من</a></li>
                    <li><a onclick="show_content(5)">مشخصات من</a></li>
                </ul>
            </div>
        </div>
        <div id="panel_bottom">
            <span>کاربری محمد 24</span>
        </div>
    </div>

    <div id="panel_footer">
        <a href="">خروج از جیرجیرک</a>
    </div>
</div>

<script>

    $(document).ready(function () {
        fade_out_q();

        $('#panel_sidebar ul li i.fa').click(function () {

            $('#panel_sidebar ul li i.fa').stop();
            $('.q_box').stop();
            $(this).toggleClass('active');
            var q_index = $(this).parent().index();
            var w_box = parseInt($('#q' + (q_index + 1) + '_box').css('left'));
            if (w_box < 0) {
                $('#q' + (q_index + 1) + '_box').animate({'left': '0'}, 600);
            } else {
                $('#q' + (q_index + 1) + '_box').animate({'left': '-100%'}, 600);
            }
        });


        $('#panel_list ul li').find('a').click(function () {

            $('#panel_list ul li').removeClass('active');

            $(this).parent().addClass('active');
        });
    });

    function fade_out_q() {
        setTimeout(function () {
            $('.q_box').animate({'left': '-100%'}, 800);
            $('#panel_sidebar ul li i.fa').removeClass('active');

        }, 6000);

    }

    function show_content(item) {

        $('#content3 #panel_box').html('');

        $('#content3  #panel_box').load("<?php echo $baseUrl?>index/load_item/"+item);

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


    function show_box_question(tag) {
        var index=$(tag).index();
    }

</script>