


<style>
    #my_cart {
        height: 100%;
        border-bottom: 15px solid var(--yellow);
    }

    #my_cart .tabs {
        background-color: var(--yellow);
        float: right;
        height: 60px;
        width: 100%;
    }

    #my_cart .tabs ul {
        padding: 0;
        margin: 0;
        float: right;
        width: 100%;
        height: 100%;
    }

    #my_cart .tabs ul li {
        width: 50%;
        float: right;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #000;
        height: 100%;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
    }

    #my_cart .tabs ul li.active {
        color: red;
        background-color: #00000017;
    }

    #my_cart .txt {
        background: var(--gray);
        margin-top: 39px;
        padding: 5px 0;
        color: #fff;
        font-size: 15px;
        font-weight: bold;
        height: 55px;
        display: flex;
        align-items: center;
        justify-content:center;
    }
    #my_cart .txt a{
        height: 100%;
        padding: 0 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #000;
        background-color: #fff;
        font-size: 13px;
        margin: 0 15px;
        transition: all 0.6s;
    }

    #my_cart #txt1 a.change{
        background-color: var(--red);
        color: #fff;
        transition: all 0.6s;
    }


</style>

<div id="my_cart">
    <div class="container-fluid">
        <div class="row">
            <div class="tabs">
                <ul>
                    <li class="active">موجودی حساب جیرجیرکی</li>
                    <li>آرشیو پرداخت های جیرجیرکی</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-xs-10 col-md-offset-1">
                <div id="my_cart_sections">
                    <section class="active" id="my_cart_sec2">
                        <span class="txt" id="txt1">موجدی حساب جیرجیرکی شما در این لحظه برابر است با <a class="active">200000</a>تومان</span>
                        <br>
                        <span style="margin: 3px 0" class="txt">برای تایید گزارش تایید خرید مشتریانتان لازم است که حساب جیرجیرکی تان خالی نباشد.</span>
                        <span style="margin: 3px 0" class="txt"> پیش از آن که مشتریتان خریدش را ثبت کند لازم است حساب خود را<a id="pay_btn">شارژ</a>نمایید</span>
                        <a id="alert" style="display: none" class="alert alert-warning">در حال اتصال به درگاه بانگ....</a>
                    </section>

                </div>
            </div>
        </div>

    </div>
</div>


<script>
  $(document).ready(function () {
      $('.tabs').find('li').click(function () {

          $('.tabs').find('li').removeClass('active');
          $(this).addClass('active');
        var index=$(this).index();
        $('#my_cart_sections').find('section').fadeOut(0);
        $('#my_cart_sections').find('section').eq(index).fadeIn(300);
      });

      if($('#txt1').find('a').hasClass('active')){


          setInterval(function () {
              $('#txt1').find('a').toggleClass('change');
          },700);
      }

      $('#pay_btn').click(function () {
          $('#alert').fadeIn(600,function () {
              window.location.href = "pay.php";
          });

      });

  });

</script>