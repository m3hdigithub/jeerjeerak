<style>
    #my_chance {
        height: 100%;
        padding: 15px;
        background-color: #eee;
        position: relative;
    }

    #my_chance .message {
        padding: 14px;
        width: 75%;
        margin: auto;
        min-height: 124px;
        border: 2px solid var(--gray);
        margin-bottom: 50px;
    }
    #my_chance .body span {
        display: block;
        text-align: center;
        padding: 19px 0;
        font-size: 17px;
        font-weight: bold;
        color: var(--gray);
    }
    #my_chance .body span a {
       color: var(--red);
    }

    #my_chance  .footer{
        position: absolute;
        bottom: 0;
        width: 100%;
        left: 0;
        right: 0;
        height: 120px;
    }
    #my_chance  .footer a{
       display: flex;
        align-items: center;
        justify-content:center;
        color: #ccc;
        background-color: var(--gray);
        font-size: 16px;
        font-weight: bold;
        width: 100%;
        height: 50%;
    }
    #my_chance  .footer a:first-child{
        border-bottom: 2px solid #fff;
    }
</style>

<div id="my_chance">
    <div class="message">
        <p> پیغام در اینجا قرار می گیرد</p>
    </div>

    <div class="body">
        <span>شانس شما در قرعه کشی پس فردا تا این لحظه <a href=""> 200 شانس</a> </span>

        <span>احتمال برنده شدنتان در قرعه کشی پس فردا تا این لحظه <a href="">36%</a></span>
    </div>

    <div class="footer">
        <a href="">قرعه کشی ماهانه</a>
        <a href="">قرعه کشی سالانه</a>
    </div>
</div>