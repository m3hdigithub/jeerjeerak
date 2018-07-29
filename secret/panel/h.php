<?php require_once '../functions.php';

if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    header("location: index");
}

$username = $_SESSION['username'];
$result = $db->query("SELECT * FROM $adminTable WHERE user_username = '$username'")->fetch_all(1);
//$row = mysql_fetch_array($result);
$name = $result[0]['user_display'];
$nametype = $result[0]['user_type'];
$nameid = $result[0]['user_id'];
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <title>سیستم مدیریت محتوای راینت | Righnet C.M.S</title>
    <!---------------- favicon -------------------->
    <link rel="shortcut icon" type="image/png" href="../assets/images/favicon.png"/>
    <!---------------- favicon -------------------->

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/stylecon.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link href="css/jquery-ui-1.8.14.css" rel="stylesheet" type="text/css">

    <!-- persian calendar -->
    <link rel="stylesheet"
          href="../assets/css/MdBootstrapPersianDateTimePicker/jquery.Bootstrap-PersianDateTimePicker.css"/>
    <script src="../assets/js/MdBootstrapPersianDateTimePicker/jquery-2.1.4.js" type="text/javascript"></script>
    <script src="../assets/js/MdBootstrapPersianDateTimePicker/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/js/MdBootstrapPersianDateTimePicker/calendar.js" type="text/javascript"></script>
    <script src="../assets/js/MdBootstrapPersianDateTimePicker/jquery.Bootstrap-PersianDateTimePicker.js"
            type="text/javascript"></script>
    <!-- persian calendar -->

    <?php if ($idpage == "categoryNew" || $idpage == "page" || $idpage == "messagesNew" || $idpage == "website" || $idpage == "ticket") {
        echo '<script src="editor/ckeditor.js"></script>';
    } ?>

    <style>
        .map-div {
            width: 100%;
            height: 200px;
            border: 1px solid #cdcdcd;
            border-radius: 5px;
        }

        @-webkit-keyframes rotating /* Safari and Chrome */
        {
            from {
                -webkit-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            to {
                -webkit-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes rotating {
            from {
                -ms-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -webkit-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            to {
                -ms-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -webkit-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        .rotating {
            -webkit-animation: rotating 2s linear infinite;
            -moz-animation: rotating 2s linear infinite;
            -ms-animation: rotating 2s linear infinite;
            -o-animation: rotating 2s linear infinite;
            animation: rotating 2s linear infinite;
        }
    </style>

    <style>
        .user-ticket, .admin-ticket {
            background-color: white;
            border-radius: 10px;
            padding: 10px;
            word-break: normal;
            word-wrap: break-word !important;
            margin-bottom: 5px;
            text-align: justify;
        }

        .user-ticket {
            border: 2px solid darkred;

        }

        .admin-ticket {
            border: 2px solid green;
        }

        .user-ticket .image img {
            max-height: 200px;
        }

        .fa-check-circle {
            color: limegreen;
        }

        .fa-times-circle {
            color: tomato;
        }
    </style>
</head>

<body>

<div id="wrapper">

    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">منوهای خودکار</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="admin">سیستم مدیریت محتوای راینت | Righnet C.M.S</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav customScrol" style="overflow-y: scroll; height: 93%;">
                <li <?php if ($idpage == "admin") {
                    echo "class='active'";
                } ?>><a href="admin"><i class="fa fa-dashboard"></i> پیشخوان</a></li>
                <?php if ($nametype == 1) { ?>
                    <li style="" <?php if ($idpage == "user" || $idpage == "usernew" || $idpage == "useredit") {
                        echo "class='active'";
                    } ?>><a href="user"><i class="fa fa-user-secret"></i> مدیران</a></li>

                    <li <?php if ($idpage == "members" || $idpage == "membersEdit" || $idpage == "membersNew" || $idpage == "member") {
                        echo "class='active'";
                    } ?>><a href="members"><i class="fa fa-users"></i> کاربران</a></li>
                    <li <?php if ($idpage == "advertising" || $idpage == "advertisingEdit" || $idpage == "advertisingNew" || $idpage == "advertisingDetail") {
                        echo "class='active'";
                    } ?>><a href="advertising"><i class="fa fa-tags"></i> آگهی ها</a></li>

                    <li <?php if ($idpage == "company" || $idpage == "companyEdit" || $idpage == "companyNew" || $idpage == "company") {
                        echo "class='active'";
                    } ?>><a href="company"><i class="fa fa-list"></i> دسته بندی ها</a></li>

                    <li <?php if ($idpage == "orders" || $idpage == "ordersEdit" || $idpage == "ordersNew" || $idpage == "order") {
                        echo "class='active'";
                    } ?>><a href="orders"><i class="fa fa-exchange"></i> تراکنش ها</a></li>
                    <li <?php if ($idpage == "packages" || $idpage == "packagesNew" || $idpage == "package") {
                        echo "class='active'";
                    } ?>><a href="packages"><i class="fa fa-money"></i> تعرفه ها</a></li>
                    <li <?php if ($idpage == "city" || $idpage == "cityNew") {
                        echo "class='active'";
                    } ?>><a href="city"><i class="fa fa-hospital-o"></i> شهر ها</a></li>
                    <li <?php if ($idpage == "selectAttrs" || $idpage == "selectAttrsNew") {
                        echo "class='active'";
                    } ?>><a href="selectAttrs"><i class="fa fa-sort-amount-asc"></i> ویژگی های آبشاری</a></li>
                    <li <?php if ($idpage == "checkAttrs" || $idpage == "checkAttrsNew") {
                        echo "class='active'";
                    } ?>><a href="checkAttrs"><i class="fa fa-check-square-o"></i> ویژگی های چک باکس</a></li>
                    <li <?php if ($idpage == "media") {
                        echo "class='active'";
                    } ?>><a href="media"><i class="fa fa-picture-o"></i> رسانه ها</a></li>
                    <li <?php if ($idpage == "visits") {
                        echo "class='active'";
                    } ?>><a href="visits"><i class="fa fa-eye"></i> بازدید آگهی ها</a></li>
                    <li <?php if ($idpage == "chanceCodes") {
                        echo "class='active'";
                    } ?>><a href="chanceCodes"><i class="fa fa-cc"></i> کدهای شانس</a></li>
                    <li <?php if ($idpage == "questions") {
                        echo "class='active'";
                    } ?>><a href="questions"><i class="fa fa-question"></i> سوالات</a></li>

                    <li <?php if ($idpage == "mediaWinners") {
                        echo "class='active'";
                    } ?>><a href="mediaWinners"><i class="fa fa-video-camera"></i> عکس و فیلم برندگان</a></li>

                    <li <?php if ($idpage == "page") {
                        echo "class='active'";
                    } ?>><a href="page"><i class="fa fa-cogs"></i> تنظیمات سایت</a></li>
                <?php } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right navbar-user">
                <li><a href="logout"><i class="fa fa-power-off"></i> خارج شدن</a></li>
                <li><a href="#"><i class="fa fa-user-secret"></i> <?php echo $name; ?></a></li>

                <!--<li class="dropd

                own user-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="fa fa-user"></i> <?php /*echo $name; */ ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="logout"><i class="fa fa-power-off"></i> خارج شدن</a></li>
                    </ul>
                </li>-->
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">

                <!------------------ my breadcrumb ----------------->
                <ol class="breadcrumb">
                    <?php
                    if ($idpage == "admin") {
                        echo '<li class="active"><i class="fa fa-dashboard"></i> پیشخوان</li>';
                    } else {
                        echo '<li><a href="admin"><i class="fa fa-dashboard"></i> پيشخوان</a></li>';
                    }

                    // admin
                    if ($idpage == "user") {
                        echo '<li class="active"><i class="fa fa-user-secret"></i> مدیران</li>';
                    }
                    if ($idpage == "useredit" || $idpage == "usernew") {
                        echo '<li><a href="user"><i class="fa fa-user-secret"></i> مدیران</a></li>';
                    }
                    if ($idpage == "useredit") {
                        echo '<li class="active"><i class="fa fa-user-times"></i> ویرایش مدیر</li>';
                    }
                    if ($idpage == "usernew") {
                        echo '<li class="active"><i class="fa fa-user-plus"></i> ایجاد مدیر جدید</li>';
                    }


                    // members
                    if ($idpage == "members") {
                        echo '<li class="active"><i class="fa fa-users"></i> کاربران</li>';
                    }
                    if ($idpage == "membersEdit" || $idpage == "membersNew" || $idpage == "member") {
                        echo '<li><a href="members"><i class="fa fa-users"></i> کاربران</a></li>';
                    }
                    if ($idpage == "membersNew") {
                        echo '<li class="active"><i class="fa fa-plus"></i> ایجاد کاربر جدید</li>';
                    }
                    if ($idpage == "member") {
                        echo '<li class="active"><i class="fa fa-info-circle"></i> جزئیات کاربر</li>';
                    }

                    // category
                    if ($idpage == "company") {
                        echo '<li class="active"><i class="fa fa-list"></i> دسته بندی ها</li>';
                    }
                    if ($idpage == "companyEdit" || $idpage == "companyNew") {
                        echo '<li><a href="company"><i class="fa fa-list"></i> دسته بندی ها</a></li>';
                    }
                    if ($idpage == "companyEdit") {
                        echo '<li class="active"><i class="fa fa-edit"></i> ویرایش</li>';
                    }
                    if ($idpage == "companyNew") {
                        echo '<li class="active"><i class="fa fa-plus"></i> ایجاد دسته بندی جدید</li>';
                    }

                    // packages
                    if ($idpage == "advertising") {
                        echo '<li class="active"><i class="fa fa-tags"></i> آگهی ها</li>';
                    }
                    if ($idpage == "advertisingNew" || $idpage == "advertisingEdit" || $idpage == "advertisingDetail") {
                        echo '<li><a href="advertising"><i class="fa fa-tags"></i> آگهی ها</a></li>';
                    }
                    if ($idpage == "advertisingEdit") {
                        echo '<li class="active"><i class="fa fa-edit"></i> ویرایش آگهی</li>';
                    }
                    if ($idpage == "advertisingNew") {
                        echo '<li class="active"><i class="fa fa-plus"></i> ایجاد آگهی جدید</li>';
                    }
                    if ($idpage == "advertisingDetail") {
                        echo '<li class="active"><i class="fa fa-info-circle"></i> جزئیات</li>';
                    }

                    // orders
                    if ($idpage == "orders") {
                        echo '<li class="active"><i class="fa fa-exchange"></i> تراکنش ها</li>';
                    }
                    if ($idpage == "order" || $idpage == "ordersNew") {
                        echo '<li><a href="orders"><i class="fa fa-exchange"></i> تراکنش ها</a></li>';
                    }
                    if ($idpage == "ordersNew") {
                        echo '<li class="active"><i class="fa fa-plus"></i> ایجاد تراکنش جدید</li>';
                    }
                    if ($idpage == "order") {
                        echo '<li class="active"><i class="fa fa-info-circle"></i> جزئیات</li>';
                    }

                    // packages
                    if ($idpage == "packages") {
                        echo '<li class="active"><i class="fa fa-money"></i> تعرفه ها</li>';
                    }
                    if ($idpage == "packagesNew" || $idpage == "package") {
                        echo '<li><a href="packages"><i class="fa fa-money"></i> تعرفه ها</a></li>';
                    }
                    if ($idpage == "packagesNew") {
                        echo '<li class="active"><i class="fa fa-plus"></i> ایجاد تعرفه جدید</li>';
                    }
                    if ($idpage == "package") {
                        echo '<li class="active"><i class="fa fa-info-circle"></i> جزئیات</li>';
                    }

                    // city and state
                    if ($idpage == "city") {
                        echo '<li class="active"><i class="fa fa-hospital-o"></i> شهر و محله</li>';
                    }
                    if ($idpage == "cityEdit" || $idpage == "cityNew") {
                        echo '<li><a href="city"><i class="fa fa-hospital-o"></i> شهر یا محله</a></li>';
                    }
                    if ($idpage == "cityEdit") {
                        echo '<li class="active"><i class="fa fa-edit"></i> ویرایش</li>';
                    }
                    if ($idpage == "cityNew") {
                        echo '<li class="active"><i class="fa fa-user-plus"></i> ایجاد شهر و محله جدید</li>';
                    }

                    // attr select
                    if ($idpage == "selectAttrs") {
                        echo '<li class="active"><i class="fa fa-sort-amount-asc"></i> ویژگی های آبشاری</li>';
                    }
                    if ($idpage == "selectAttrsNew") {
                        echo '<li><a href="selectAttrs"><i class="fa fa-sort-amount-asc"></i> ویژگی های آبشاری</a></li>';
                    }
                    if ($idpage == "selectAttrsNew") {
                        echo '<li class="active"><i class="fa fa-user-plus"></i> ایجاد ویژگی جدید</li>';
                    }

                    // attr check
                    if ($idpage == "checkAttrs") {
                        echo '<li class="active"><i class="fa fa-check-square-o"></i> ویژگی های چک باکس</li>';
                    }
                    if ($idpage == "checkAttrsNew") {
                        echo '<li><a href="checkAttrs"><i class="fa fa-check-square-o"></i> ویژگی های چک باکس</a></li>';
                    }
                    if ($idpage == "checkAttrsNew") {
                        echo '<li class="active"><i class="fa fa-user-plus"></i> ایجاد ویژگی جدید</li>';
                    }

                    // media
                    if ($idpage == "media") {
                        echo '<li class="active"><i class="fa fa-picture-o"></i> رسانه ها</li>';
                    }
                    // media
                    if ($idpage == "visits") {
                        echo '<li class="active"><i class="fa fa-eye"></i> بازدید آگهی ها</li>';
                    }


                    // page
                    if ($idpage == "page") {
                        echo '<li class="active"><i class="fa fa-cogs"></i> تنظیمات سایت</li>';
                    }
                    // application links
                    if ($idpage == "appLinks") {
                        echo '<li class="active"><i class="fa fa-mobile"></i> لینک های اپلیکیشن</li>';
                    }

                    // category


                    // contact form
                    if ($idpage == "contactForm") {
                        echo '<li class="active"><i class="fa fa-envelope"></i> فرم تماس با ما</li>';
                    }
                    if ($idpage == "contactFormDetail") {
                        echo '<li><a href="contactForm"><i class="fa fa-envelope"></i> فرم تماس با ما</a></li>';
                    }
                    if ($idpage == "contactFormDetail") {
                        echo '<li class="active"><i class="fa fa-info-circle"></i> جزئیات پیام</li>';
                    }


                    // user block
                    if ($idpage == "apiUserBlocked") {
                        echo '<li class="active"><i class="fa fa-user-times"></i> کاربران بلاک شده</li>';
                    }
                    // ip block
                    if ($idpage == "apiIpBlocked") {
                        echo '<li class="active"><i class="fa fa-user-secret"></i> آی پی های (ip) بلاک شده</li>';
                    }


                    ?>
                </ol>
                <!------------------ my breadcrumb ----------------->

            </div>
        </div><!-- /.row -->



