<div id="login_text">
    <div id="login_text_border_right"></div>
    <p>متقاضیان محترم می‌توانند رزومه خود را به آدرس ایمیل زیر ارسال و یا جهت کسب اطلاعات بیشتر با شماره
        تلفن زیر تماس حاصل نمایند تا پس از بررسی صلاحیت های فردی و تطابق آن با اهداف و برنامه های کاری
        شرکت، جهت مصاحبه و دعوت به همکاری با آن ها تماس گرفته شود.متقاضیان محترم می‌توانند رزومه خود را
        به آدرس ایمیل زیر ارسال و یا جهت کسب اطلاعات بیشتر با شماره تلفن زیر تماس حاصل نمایند تا پس از
        بررسی صلاحیت های فردی و تطابق آن با اهداف و برنامه های کاری شرکت، جهت مصاحبه و دعوت به همکاری با
        آن ها تماس گرفته شود.متقاضیان محترم می‌توانند رزومه خود را به آدرس ایمیل زیر ارسال و یا جهت کسب
        اطلاعات بیشتر با شماره تلفن زیر تماس حاصل نمایند تا پس از بررسی صلاحیت های فردی و تطابق آن با
        اهداف و برنامه های کاری شرکت، جهت مصاحبه و دعوت به همکاری با آن ها تماس گرفته شود.</p>
    <div id="login_text_border_left"></div>
</div>

<div id="register_form" class="form">
    <form action="">
        <div class="input_div">
                            <span class="form_title"> نام جیرجیرکی  <i id="q1" class="fa fa-question"></i>
                                 <div  id="q1_text" class="q_text">
                                <span class="q_text_title">نام جیرجیرکی شما :</span>
                                <p>می تواند شامل عدد،حروف کوچک یا برزگ فارسی و انگلیسی و غیره باشد.</p>

                              <span class="q_text_title">نام جیرجیرکی شما :</span>
                                <p>باید راحت و سریع خواندده شود.</p>
                                <p>باید ترکیبی از عدد وحروف باشد.</p>
                            </div>
                            </span>
            <input type="text" class="input_text" placeholder="مثال 1234 Ali">
        </div>

        <div class="input_div">
            <span class="form_title">تکرار نام جیرجیرکی</span>
            <input type="text" class="input_text" placeholder="مثال 1234 Ali">
        </div>
        <div class="input_div">
                            <span class="form_title"> شماره موبایل<i id="q2" class="fa fa-question"></i>
                                  <div  id="q2_text" class="q_text">
                                <span class="q_text_title">شماره موبایل شما :</span>
                                <p>پل ارتباطی مابین ما و شماست و نزد ما محفوظ می ماند.</p>

                                <span class="q_text_title">شماره موبایل شما :</span>
                                <p>باید حتما شماره شخصی شما باشد.</p>
                            </div>
                            </span>

            <input type="text" class="input_text" placeholder="مثال 0937666666">
        </div>


        <div class="input_div">
            <button type="submit" class="submit">ثبت نام</button>
        </div>


        <div class="div_errors">
            <span>این اطلاعات بعدا در قسمت مشخصات کاربری قابل تغیرر است</span>
        </div>




    <div class="input_div">
        <a onclick="show_form(1);" id="login_button" class="submit">ورود</a>
    </div>

    </form>
</div>

<script>
    $(document).ready(function () {
        $('#q2').hover(function () {
            $('#q2_text').stop();
            $('#q2_text').fadeIn(300);
        }, function () {
            $('#q2_text').stop();
            $('#q2_text').fadeOut(300);
        });
        $('#q1').hover(function () {
            $('#q1_text').stop();
            $('#q1_text').fadeIn(300);
        }, function () {
            $('#q1_text').stop();
            $('#q1_text').fadeOut(300);
        });
    })
</script>