
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

<div class="form" id="inter">
    <form action="">
        <div  id="user_data" class="input_div">
            <span class="inter_title">نام جیرجیرکی :</span>
           <span class="inter_value">رضا sdbfsd</span>
        </div>

        <div  id="user_data2" class="input_div">
            <span class="inter_title">شماره موبایل :</span>
            <span class="inter_value">09223173902</span>
        </div>

        <div class="input_div">
           <span  style="font-size: 17px;color: var(--red);" class="msg1">این دوتا بعدا قابل تغیر است.</span>
        </div>

        <div id="wellcome_msg" class="input_div">
          <span class="msg2">نام جیرجیرکی شما به شماره موبایلتان پیامک شد. آنرا به خاطر بسپارید.</span>
        </div>

        <div id="div_error" class="input_div">
            <span class="msg3">ثبت نام شما با موفقیت انجام شد.</span>
        </div>

        <div  class="input_div">
            <button id="inter_btn" class="submit">ورود</button>
        </div>


    </form>


</div>

<script>
    $(document).ready(function () {
        setInterval(function () {
            $('#inter_btn').toggleClass('active');
        },500);
    })
</script>