<?php session_start();
date_default_timezone_set('Asia/Tehran');

//***************** start database connection *****************//
$host = 'localhost';
$dbName = 'jirjirak';
$u = 'root';
$p = '';

//***************** start mysqli method connection *****************//
$db = new mysqli($host, $u, $p, $dbName);

if ($db->connect_errno) {
    printf("connect failed : %s \n", $db->connect_errno);
    exit(0);
}
$db->query("SET NAMES UTF8");
//***************** end mysqli method connection *****************//

//***************** start pdo method connection *****************//
$conn = new PDO("mysql:host=$host;dbname=$dbName", $u, $p);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->exec('SET NAMES UTF8');
try {

} catch (PDOException $e) {
    echo 'Failed connection because: ' . $e->getMessage();
    exit(0);
}
//***************** end mysqli method connection *****************//

//***************** start site names *****************//
$siteName = 'جیرجیرک | jirjirak';
$siteNameEn = 'jirjirak';
$siteNameFa = 'جیرجیرک';
$siteDescription = 'سرویس اشتراک ویدئویی';

$panelName = 'righnetpanel';
//***************** end site names *****************//

//***************** start all database tables *****************//
$tblPrefix = 'tbl_';
$adminTable = 'ads_user';
$advertisingTable = $tblPrefix.'advertising';
$categoryTable = $tblPrefix.'category';
$selectAttrTable = $tblPrefix.'select_attr';
$checkAttrTable = $tblPrefix.'check_attr';
$mediaTable = $tblPrefix.'media';
$ordersTable = $tblPrefix.'orders';
$packagesTable = $tblPrefix.'packages';
$usersTable = $tblPrefix.'users';
$visitTable = $tblPrefix.'visit';
$cityTable = $tblPrefix.'city';
$chanceCodesTable = $tblPrefix.'chance_code';
$questionsTable = $tblPrefix.'questions';
$mediaWinnerTable = $tblPrefix.'media_winner';

// not use table
$appLinksTable = 'app_links';
$apiLoginBlockTable = 'block_api_login';
$userLoginBlockTable = 'block_user_login';
$contactFormTable = 'contact_form';
$pageTable = 'page';
$usePackageLogsTable = 'use_package_logs';
//***************** end all database tables *****************//

//***************** start images path *****************//
$backImageAddress = '../';

$baseOriginalAddress = "assets/images/originals/";
$baseThumbAddress = "assets/images/thumb/";
$baseImageAddress = "assets/images/pictures/";
$baseFilesAddress = "assets/images/files/";
$baseVideoAddress = "assets/images/files/";

// upload directory
$uploadDirOriginal = "../assets/images/originals/";
$uploadDirThumb = '../assets/images/thumb/';
$uploadDirImage = '../assets/images/pictures/';
$uploadDirFiles = "../assets/images/files/";
$uploadDirVideo = '../assets/images/files/';

// default image(no image) path
$defaultImage = '../assets/images/no-image.jpg';
//***************** end images path *****************//

//********************** start api config **********************//
#api login code
$apiLC = "sdgDFGhg546fjh6565GHFsdf5465dgd23dsh";
#api login code failed number
$apiLCAllowedNum = 10;
#api login code blocking time
$apiLCAllowedTime = 60 * 60; //1 hours
#api login failed number
$apiLAllowedNum = 10;
#api login blocking time
$apiLAllowedTime = 60 * 60 * 24 * 7; // a week
//********************** start api config **********************//
#url
$currentUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; // current url
$bancCallBack = "http://gharbilak.com/pay2app/";
$bancCallBack2 = "http://gharbilak.com/";
//$baseUrlSite = "http://gharbilak.com/";
$baseUrlSite = "http://localhost/jeerjeerak/";
$signatureSms = "gharbilak.com";

#map location default
$defaultMapLat = '35.689699';
$defaultMapLon = '51.389933';
$defaultMapZoom = '11';

#sms panel information
$smsPanelUsername = '9107601075';
$smsPanelPassword = '4114';
$smsPanelSenderNumber = '1000';

#bank connection information
#zarinpal
$BankMerchantID = 'dc20d038-8990-11e8-ba53-005056a205be';
$BankDescription = 'پرداخت بانکی از درگاه زرین پال';
$BankEmail = 'info@gharbilak.com';
$BankMobile = '09121234567';

#admin per page for pagination
$adminPerPage = 10;
$userPerPage = 5;

#other
$nowTime = date('Y-m-d H:i:s', time());
$reActionTime = 60;


//**************************** plugins ****************************//
$pluginApiBlocker = false;
$pluginContactUs = true;
$pluginCategory = true;
$pluginAppLinks = false;

//**************************** plugins ****************************//
//**************************** global values ****************************//
$loseAdvertising = 60*60*24*30; // one month
$typeAdvertising = [
    'server'=>'مشاغل',
    'client'=>'یکبار مصرف'
];
$subjectContact = [
    'پشتیبانی فنی',
    'روابط عمومی و تبلیغات',
    'مدیریت',
    'پیشنهاد و انتقاد',
    'سایر'
];

$questions = [
    'آیا از اخلاق و رفتارشان راضی بودید؟',
    'آیا قیمتشان منصفانه بود؟',
    'آیا ایشان را به دیگران توصیه می کنید؟'
];

//**************************** global values ****************************//

//********************************* function ***********************************//
function myRedirect($cond)
{
    if (!$cond) {
        header('Location: ../404');
    }
}

$errorsBank = [
    '1' => "نام جیرجیرکی شما تکراری است",
    '2' => "موبایل شما تکراری است",
    '3' => "عملیات با موفقیت انجام شد",
    '4' => "عملیات با خطا مواجه شد",
    '5' => "اطلاعات الزامی حتما باید به صورت صحیح تکمیل شوند",
    '6' => "فقط یک بار امکان انتخاب زیر دسته می باشد",
    '7' => "شما نمی توانید یک دسته بندی را برای خودش انتخاب کنید!",
    '8' => "شما نمی توانید دسته بندی اصلی را برای تعریف ویژگی انتخاب کنید!",
];
?>
