<?php require_once '../config.php';
$cee = "";
//بررسی تنظیم شدن یا نشدن متغیرهای سشن
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])){
//در صورتی که متغیرهای سشن تنظیم نشده باشند، کاربر مجاز به دیدن ادامه صفحه نیست و او را به صفحه اصلی منتقل می کنیم   
}else{header("location:admin"); }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="js/modernizr.custom.63321.js"></script>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>	
			@import url(http://fonts.googleapis.com/css?family=Montserrat:400,700|Handlee);
			body {
				background: #eedfcc url(images/bg3.jpg) no-repeat center top;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
			}
			.container > header h1,
			.container > header h2 {
				color: #fff;
				text-shadow: 0 1px 1px rgba(0,0,0,0.5);
			}
		</style>
    </head>
    <body>
        <div class="container">
		
			<!-- Codrops top bar -->
            <div class="codrops-top">
                <a href="/">
                    <strong>&laquo; بازگشت به سایت </strong>صفحه اصلی
                </a>
                <span class="right">
                    <a href="<?php echo $baseUrlSite; ?>" target="_blank">
                        <strong>سیستم مدیریت محتوای راینت</strong>
                    </a>
                </span>
            </div><!--/ Codrops top bar -->
			
			<header>
			
				<h1>



<?php
//دریافت و تنظیم متغیرهای ارسال شده توسط کاربر
@$username = $_POST['username'];
@$password = $_POST['password'];
@$check = $_POST['check'];
?>
<?php
//بررسی معتبر بودن اطلاعات ارسالی کاربر
//ورود
if (!isset($username) && !isset($password) && !isset($check)){
    echo "				
				<h2>نام کاربری و گذرواژه خود را وارد کنید</h2>
";
    $cee = "1";
}
//نام کاربری
elseif (!isset($username) || $username == ''){
    echo "فیلد نام کاربری نباید خالی باشد!";
    $cee = "1";
}
//کلمه عبور
elseif (!isset($password) || $password == ''){
    echo "فیلد کلمه عبور نباید خالی باشد!";
    $cee = "1";
}
//اطلاعات اتصال به پایگاه داده



if($cee != "1"){

//جلوگیری از نفوذ به دیتابیس$username = $db->real_escape_string($username);
$password = md5($password);
if($check == 'sended'){
    //تطبیق اطلاعات کاربر با آنچه که در دیتابیس ذخیره شده
    $result = $db->query("SELECT COUNT(*) as c FROM ads_user WHERE user_username = '$username' AND user_password = '$password'")->fetch_object()->c;
    // تعداد ردیف های موجود
    //$count = mysql_num_rows($result);
    if($result > 0){
        // اطلاعات کاربر درست است، تنظیم مجوز های استفاده از بخش اعضاء 
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        // اطلاعات کاربر صحیح است
        echo "شما به سایت وارد شده اید!<br />";
header("location:admin");
    }
    else{
        // اطلاعات کاربر صحیح نیست
        echo "اطلاعات وارد شده صحیح نیست!<br />";
    }
}
//پایان ارتباط با پایگاه داده  
}
?>


</h1>				
				<div class="support-note">
					<span class="note-ie">Sorry, only modern browsers.</span>
				</div>
				
			</header>
			
			<section class="main">
				<form action="" method="post" class="form-5 clearfix">
				    <p>
				        <input type="text" id="login" name="username" placeholder="نام کاربری">
				        <input type="password" name="password" id="password" placeholder="گذرواژه"> 
				    </p>
				    <button type="submit" name="check" value="sended">
				    	<i class="icon-arrow-right"></i>
				    	<span>ورود</span>
				    </button>     
				</form>​​​​
			</section>
			
        </div>
		<!-- jQuery if needed -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.placeholder.min.js"></script>
		<script type="text/javascript">
		$(function(){
			$('input, textarea').placeholder();
		});
		</script>
    </body>
</html>

