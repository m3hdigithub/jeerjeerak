<style>

    .h100 {
        height: 100%;
    }

    .h86 {
        height: 86%;
    }

    #panel_profile {
        height: 100%;
        width: 100% !important;
        border-left: 11px solid #fff;
        border-right: 11px solid #fff;
        position: relative;
    }

    #panel_profile #head {
        background-color: #c0c0c0;
        border-bottom: 3px solid #fff;
        width: 100%;
        height: 7%;
    }

    #panel_profile #foot {
        background-color: #c0c0c0;
        border-top: 3px solid #fff;
        width: 100%;
        height: 7%;
    }

    #panel_profile_content {
       position: relative;
        padding: 0;
        overflow-y: auto;
        overflow-x: hidden;
    }

    #panel_profile_menu {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #ccc;
        border-right: 4px solid #fff;
        padding: 0;
    }

    #panel_profile_menu h3{
        width: 100%;
        font-size: 19px;
        color: #fff;
        margin: 0;
        font-weight: bold;
        padding: 17px 0;
    }
    #panel_profile_menu ul{
        padding: 0;
        margin: 0;
        width: 100%;
        height: 42%;
    }

    #panel_profile_menu ul li{
       width: 100%;
        padding: 17px 0;
        color: var(--gray);
        text-align: center;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
    }
    #panel_profile_menu ul li:nth-child(even){
        background-color: #eee;
    }

    #panel_profile_menu ul li.active{
       color: var(--red);
    }



</style>

<div id="panel_profile">

    <div id="head"></div>

    <div class="container-fluid h86">
        <div class="row h100">
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 h100" id="panel_profile_content">

            </div>

            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 h100" id="panel_profile_menu">
                <h3>کاربری لیلا 32</h3>
                <ul>
                    <li>شانس های من</li>
                    <li>خرید های من</li>
                    <li>مشخصات کاربری من</li>
                    <li>خروجج از جیرجیرک</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="foot"></div>

</div>


<script>
    $(document).ready(function () {
        $('#panel_profile_menu li').click(function () {
            $('#panel_profile_menu').find('li').removeClass('active');
            $(this).addClass('active');
            var index=$(this).index();
            show_profile(index+1);
        });
    });

    function show_profile(item) {
        $('#panel_profile_content').html('');
        $('#panel_profile_content').load('index/load_panel_3/'+item);

    }
</script>

