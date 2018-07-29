<?php session_start();
//بررسی تنظیم شدن یا نشدن متغیرهای سشن
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])){
//در صورتی که متغیرهای سشن تنظیم نشده باشند، کاربر مجاز به دیدن ادامه صفحه نیست و او را به صفحه اصلی منتقل می کنیم
header("location:index");
}

//منقضی کردن متغیر های نشست
unset($_SESSION['username']);
unset($_SESSION['password']);
//پایان نشست
session_destroy();
//انتقال به صفحه اصلی یا صفحه مورد نظر
header("location:index");
?>