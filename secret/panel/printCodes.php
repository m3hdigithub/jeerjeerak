<?php
require_once("../config.php");
require_once("../functions.php");
$thisTime = jdate('Y/m/d ساعت H:i:s', time()); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>خروجی کدهای قرعه کشی</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-select.min.css" rel="stylesheet">

    <style>


        @font-face {
            font-family: 'BYEKAN';
            src: url('../assets/fonts/BYekan/BYekan.woff') format('woff');
            font-weight: normal;
            font-style: normal
        }

        html,body,*{
            font-family: BYEKAN!important;
        }
    </style>
</head>
<body>
<div class="container table-responsive export" dir="rtl">

    <?php
    $ex = (isset($_REQUEST['ex']) && checkUID($_REQUEST['ex']) && in_array($_REQUEST['ex'], array('1', '2'))) ? $_REQUEST['ex'] : false;
    $users = $db->query("SELECT * FROM $usersTable")->fetch_all(1);
    if (!$ex) {
        echo '<div>دسترسی به این صفحه امکانپذیر نمی باشد، در حال انتقال...</div>';
        echo '<script>window.setTimeout(function(){window.location.href = "admin.php";}, 2000);</script>';
        exit();

    }

    ?>

    <table class="table table-bordered table-hover table-striped" style="overflow-x: scroll!important; direction: rtl;">
        <div class="text-center"><h3>خروجی کدهای قرعه کشی در تاریخ <?php echo $thisTime; ?></h3>
            <hr>
        </div>
        <thead style="font-weight: bold; font-size: 16px; background-color: #666; color: white;">
        <th style="text-align: center;">ردیف</th>
        <th style="text-align: center;">نام جیرجیرکی</th>
        <th style="text-align: center;">کد های  شانس و تعداد</th>
        <th style="text-align: center;">موبایل</th>
        </thead>
        <tbody style="font-size: 16px; font-weight: 100; text-align: right;">

        <?php
        $i = 1;
        $allAmount = 0;
        if ($users) {
            foreach ($users as $user => $u) {
                $userID = $u['id'];
                $allCode = $db->query("SELECT * FROM $chanceCodesTable WHERE user_buyer_id='$userID'")->fetch_all(1);
                if ($allCode) {
                    $username = $u['username'];
                    $mobile = $u['mobile'];

                    echo '<tr>';
                    echo "<td>$i</td>";
                    echo "<td>$username</td>";
                    echo '<td>';
                    $j = 1;
                    foreach ($allCode as $cods => $code){
                        echo $j.'- '.'کد شانس [ '.$code['code'].' ]'.' تعداد کد [ '.$code['num_code'].' ]'.'</br>';
                    $j++;
                    }
                    echo '</td>';
                    echo "<td>$mobile</td>";

                    echo '</tr>';

                    $i++;
                }
            }
            ?>

<?php
        } else {
            echo '<tr>';
            echo '<td colspan="6" class="text-center"><div class="alert alert-info text-center">هیچ صورت حسابی جهت محاسبه در دسترس نیست</div></td>';
            echo '</tr>';
        }
        ?>

        </tbody>
    </table>

    <br><br><br><br><br>
    <div class="text-center">
        <a href="chanceCodes" class="btn btn-warning">بازگشت</a>
        <span class="btn btn-info" onclick="myFunction()">چاپ کردن</span>

    </div>
</div>

<script>
    function myFunction() {
        window.print();
    }
</script>
</body>
</html>