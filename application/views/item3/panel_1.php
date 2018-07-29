<style>
    #tabs {
        height: 50px;
        width: 100%;
        background-color: var(--yellow);
    }

    #tabs ul {
        padding: 0;
        margin: 0;
        list-style-type: none;
        height: 100%;
        float: right;
        width: 100%;
    }

    #tabs ul li {
        float: right;
        height: 100%;
        text-align: center;
        color: var(--gray);
        font-size: 16px;
        font-weight: bold;
        display: flex;
        align-items: center;
        width: 50%;
        justify-content: center;
        cursor: pointer;
        transition: all 0.5s;
    }

    #tabs ul li.active {
      background-color: #e6c751;
        transition: all 0.5s;
        color: var(--red);;
    }

    #client_result {
        padding: 10px;
        float: right;
        height: 100%;
        border-bottom: 66px solid var(--yellow);;
    }

    #client_result section {
        display: none;
        height: 100%;
    }

    #client_result #head {
        height: 46px;
        display: flex;
        align-items: center;
        padding-right: 50px;
        background-color: var(--gray);;
        color: #ffff;
        font-size: 15px;
        position: relative;
    }

    #head #print {
        position: absolute;
        left: 0;
        height: 100%;
        width: 90px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        background-color: var(--blue);;
    }

    #head #print a {
        padding: 9px 15px;
        color: #fff;
        background-color: #6b045b;
    }

    #client_result_table {
        height: 91%;
        overflow: auto;
        float: right;
        width: 100%;
        margin-top: 13px;
    }

    #client_result_table .name_td {
        padding: 15px 0;
        background-color: #000;
        color: #fff;
        border-bottom: 2px solid #fff;
    }

    #client_result_table .price_td {
        background-color: #a9a9a9cc;
        padding: 15px 0;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        border-bottom: 2px solid #fff;
    }

    #client_result_table .reject_btn {
        padding: 10px 9px;
        color: #fff;
        background-color: var(--red);
        border-bottom: 2px solid #fff;
        width: 90px;
    }

    #client_result_table .reject_btn a {
        color: #fff;
        background-color: #0000008a;
        display: flex;
        height: 32px;
        align-items: center;
        justify-content: center;
        cursor:pointer;
    }

    #client_result_table .accept_btn {
        padding: 10px 9px;
        color: #fff;
        background-color: var(--green);
        border-bottom: 2px solid #fff;
        width: 90px;
    }

    #client_result_table .accept_btn a {
        color: #fff;
        cursor:pointer;
        background-color: #0000008a;
        display: flex;
        height: 32px;
        align-items: center;
        justify-content: center;
    }

    #row_head {
        height: 49px;
        display: flex;
        align-items: center;
        background-color: var(--gray);
        color: #fff;
    }

    #tbl .row_parent {
        height: 49px;
        margin-bottom: 5px;
        display: flex;
        align-items: center;
        background-color: var(--gray);
    }

    #tbl .row_child {
        height: 49px;
        margin-bottom: 5px;
        display: flex;
        align-items: center;
        background-color: #7c8098;
    }

    .h100 {
        height: 100%;
    }

    #tbl .row .arrow {
        width: 100%;
        height: 100%;
        background-color: var(--yellow);
        position: relative;
        right: -15px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #tbl .row .arrow i.fa {
        padding: 8px;
        background-color: #407ea0;
        color: #fff;
        font-size: 17px;
        cursor: pointer;
        transition: all 0.6s;
    }
    #tbl .row .arrow i.fa.active{
        transition: all 0.6s;
        background-color: var(--red);
        transform: Rotate(180deg);
    }

    .white_color {
        color: #fff;
    }

    .yellow_color {
        color: var(--yellow);
    }

    #tbl .row .number2 {
        background-color: #ccc;
        border-left: 2px solid var(--green);
        border-right: 2px solid var(--green);
        color: #000;
        font-size: 16px;
        font-weight: bold;

    }

    #tbl .row .number1 {
        background-color: #ccc;
        border-left: 2px solid var(--red);
        border-right: 2px solid var(--red);
        color: #000;
        font-size: 16px;
        font-weight: bold;
    }

    #tbl .row .h100 {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #tbl .row_child .fa-times {
        position: absolute;
        right: 7px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        background-color: var(--red);
        font-size: 20px;
        border-radius: 0;
        top: 0;
        bottom: 0;
        margin: auto;
        height: 36px;
        width: 32px;
        cursor: pointer;
    }

    .all_childs{
        display: none;
    }

    #tbl_sec1 tr.active{
        opacity: 0.6;
    }


</style>

<div id="tabs">
    <ul>
        <li class="active" onclick="show_tab(this)">گزارش مشتری ها</li>

        <li onclick="show_tab(this)"> تاریخچه گزارش ها</li>
    </ul>
</div>

<div id="client_result">
    <section style="display: block">
        <div id="head">
            <span>برگه ثبت مبلغ و نام جیرجیرکی مشتری برای پرینت</span>
            <span id="print"><a href="">دانلود</a></span>
        </div>
        <div id="client_result_table" >
            <table class="table" id="tbl_sec1">
                <tbody>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>
                <tr>
                    <td class="name_td">مسعود ابراهیمی</td>
                    <td class="price_td">150,000 تومان</td>
                    <td class="reject_btn"><a onclick="reject(this)">رد</a></td>
                    <td class="accept_btn" ><a onclick="accept(this)" >تایید</a></td>
                </tr>

                </tbody>
            </table>
        </div>
    </section>


    <section>
        <div class="container-fluid">
            <div class="row" id="row_head">
                <div class="col-md-1">

                </div>
                <div class="col-md-3">
                    <span></span>
                </div>
                <div class="col-md-2">
                    <span>رد شده ها</span>
                </div>

                <div class="col-md-2">
                    <span>تایید شده ها</span>
                </div>

                <div class="col-md-3">
                    <span>تاریخ</span>
                </div>
            </div>
        </div>
        <div id="client_result_table">
            <div class="container-fluid" id="tbl">
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-1 h100">
                            <span class="arrow"><i class="fa fa-arrow-down"></i></span>
                        </div>
                        <div class="col-md-3 h100 white_color">
                            <span></span>
                        </div>
                        <div class="col-md-2 h100 white_color number1">
                            <span>1نفر</span>
                        </div>
                        <div class="col-md-2 h100 white_color number2">
                            <span>4 نفر</span>
                        </div>
                        <div class="col-md-3 h100  yellow_color">
                            <span>امروز</span>
                        </div>
                    </div>
                    <div class="all_childs">
                        <div class="row row_child">
                            <div style="position: relative" class="col-md-4 white_color h100">
                                <i class="fa fa-times"></i>
                                <span>مسعود ابراهیمی</span>
                            </div>
                            <div class="col-md-4 h100" style="background-color: var(--green)" >
                                <span>150,000  تومان</span>
                            </div>
                            <div class="col-md-4 h100 white_color">
                                <span>امروز</span>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>


    <section>
        <div class="container-fluid">
            <div class="row" id="row_head">
                <div class="col-md-4">
                <span>نام جیرجیرکی بازاریاب شما</span>
                </div>
                <div class="col-md-4">
                    <span>جمع مبلغ حاصل از بازاریابی اش</span>
                </div>
                <div class="col-md-4">
                    <span>مشتری هی جذب شده توسط او</span>
                </div>
            </div>
        </div>
        <div  id="client_result_table" >
            <div class="container-fluid" id="tbl">
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-4 h100 yellow_color">
                     <span>masood 12334</span>
                        </div>
                        <div class="col-md-4 h100 yellow_color">
                       <span>1550  تومان</span>
                        </div>
                        <div class="col-md-4 h100  yellow_color">
                            <span>27  نفر</span>
                        </div>

                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-4 h100 yellow_color">
                            <span>masood 12334</span>
                        </div>
                        <div class="col-md-4 h100 yellow_color">
                            <span>1550  تومان</span>
                        </div>
                        <div class="col-md-4 h100  yellow_color">
                            <span>27  نفر</span>
                        </div>

                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-4 h100 yellow_color">
                            <span>masood 12334</span>
                        </div>
                        <div class="col-md-4 h100 yellow_color">
                            <span>1550  تومان</span>
                        </div>
                        <div class="col-md-4 h100  yellow_color">
                            <span>27  نفر</span>
                        </div>

                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-4 h100 yellow_color">
                            <span>masood 12334</span>
                        </div>
                        <div class="col-md-4 h100 yellow_color">
                            <span>1550  تومان</span>
                        </div>
                        <div class="col-md-4 h100  yellow_color">
                            <span>27  نفر</span>
                        </div>

                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-4 h100 yellow_color">
                            <span>masood 12334</span>
                        </div>
                        <div class="col-md-4 h100 yellow_color">
                            <span>1550  تومان</span>
                        </div>
                        <div class="col-md-4 h100  yellow_color">
                            <span>27  نفر</span>
                        </div>

                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-4 h100 yellow_color">
                            <span>masood 12334</span>
                        </div>
                        <div class="col-md-4 h100 yellow_color">
                            <span>1550  تومان</span>
                        </div>
                        <div class="col-md-4 h100  yellow_color">
                            <span>27  نفر</span>
                        </div>

                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-4 h100 yellow_color">
                            <span>masood 12334</span>
                        </div>
                        <div class="col-md-4 h100 yellow_color">
                            <span>1550  تومان</span>
                        </div>
                        <div class="col-md-4 h100  yellow_color">
                            <span>27  نفر</span>
                        </div>

                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-4 h100 yellow_color">
                            <span>masood 12334</span>
                        </div>
                        <div class="col-md-4 h100 yellow_color">
                            <span>1550  تومان</span>
                        </div>
                        <div class="col-md-4 h100  yellow_color">
                            <span>27  نفر</span>
                        </div>

                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-4 h100 yellow_color">
                            <span>masood 12334</span>
                        </div>
                        <div class="col-md-4 h100 yellow_color">
                            <span>1550  تومان</span>
                        </div>
                        <div class="col-md-4 h100  yellow_color">
                            <span>27  نفر</span>
                        </div>

                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-4 h100 yellow_color">
                            <span>masood 12334</span>
                        </div>
                        <div class="col-md-4 h100 yellow_color">
                            <span>1550  تومان</span>
                        </div>
                        <div class="col-md-4 h100  yellow_color">
                            <span>27  نفر</span>
                        </div>

                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-4 h100 yellow_color">
                            <span>masood 12334</span>
                        </div>
                        <div class="col-md-4 h100 yellow_color">
                            <span>1550  تومان</span>
                        </div>
                        <div class="col-md-4 h100  yellow_color">
                            <span>27  نفر</span>
                        </div>

                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-4 h100 yellow_color">
                            <span>masood 12334</span>
                        </div>
                        <div class="col-md-4 h100 yellow_color">
                            <span>1550  تومان</span>
                        </div>
                        <div class="col-md-4 h100  yellow_color">
                            <span>27  نفر</span>
                        </div>

                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-4 h100 yellow_color">
                            <span>masood 12334</span>
                        </div>
                        <div class="col-md-4 h100 yellow_color">
                            <span>1550  تومان</span>
                        </div>
                        <div class="col-md-4 h100  yellow_color">
                            <span>27  نفر</span>
                        </div>

                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-4 h100 yellow_color">
                            <span>masood 12334</span>
                        </div>
                        <div class="col-md-4 h100 yellow_color">
                            <span>1550  تومان</span>
                        </div>
                        <div class="col-md-4 h100  yellow_color">
                            <span>27  نفر</span>
                        </div>

                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-4 h100 yellow_color">
                            <span>masood 12334</span>
                        </div>
                        <div class="col-md-4 h100 yellow_color">
                            <span>1550  تومان</span>
                        </div>
                        <div class="col-md-4 h100  yellow_color">
                            <span>27  نفر</span>
                        </div>

                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-4 h100 yellow_color">
                            <span>masood 12334</span>
                        </div>
                        <div class="col-md-4 h100 yellow_color">
                            <span>1550  تومان</span>
                        </div>
                        <div class="col-md-4 h100  yellow_color">
                            <span>27  نفر</span>
                        </div>

                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-4 h100 yellow_color">
                            <span>masood 12334</span>
                        </div>
                        <div class="col-md-4 h100 yellow_color">
                            <span>1550  تومان</span>
                        </div>
                        <div class="col-md-4 h100  yellow_color">
                            <span>27  نفر</span>
                        </div>

                    </div>
                </div>
                <div class="tbl_row">
                    <div class="row row_parent">
                        <div class="col-md-4 h100 yellow_color">
                            <span>masood 12334</span>
                        </div>
                        <div class="col-md-4 h100 yellow_color">
                            <span>1550  تومان</span>
                        </div>
                        <div class="col-md-4 h100  yellow_color">
                            <span>27  نفر</span>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function () {



        $('.row_child').find('.fa-times').click(function () {
            $(this).parents('.row_child').fadeOut(500,function () {
                $(this).parents('.row_child').remove();
            })
        });


        $('.arrow').click(function () {
            $(this).find('i').toggleClass('active');
            $(this).parents('.tbl_row').find('.all_childs').fadeToggle(600);
        })
    });

    function reject(tag) {
        $('.accept_btn').removeAttr('style');
        $('.reject_btn').removeAttr('style');
        $('#tbl_sec1 tr').addClass('active');
        $(tag).text('بله');
        $(tag).parents('tr').find('.accept_btn').css('background-color','#000');
        $(tag).parents('tr').find('.accept_btn a').text('مطمئنی');
        $(tag).parents('tr').removeClass('active');
    }

    function accept(tag) {
        $('.accept_btn').removeAttr('style');
        $('.reject_btn').removeAttr('style');
        $('#tbl_sec1 tr').addClass('active');
        $(tag).text('بله');
        $(tag).parents('tr').find('.reject_btn').css('background-color','#000');
        $(tag).parents('tr').find('.reject_btn a').text('مطمئنی');
        $(tag).parents('tr').removeClass('active');
    }


</script>

