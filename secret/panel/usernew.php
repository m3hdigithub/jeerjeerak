<?php include("../config.php");
$idpage = "usernew";
$thisTable = $adminTable;
include("h.php");

if ($nametype != 1) {
    header("location:admin");
}

if (isset($_POST['name']) || isset($_POST['type']) || isset($_POST['email']) || isset($_POST['username']) || isset($_POST['password'])) {
    /*$krftke=$_SESSION['username'];
    $res=mysql_query("select * from kaveh_link");
    while($row=mysql_fetch_assoc($res))*/

    $jdtgiiiname = $_POST['name'];
    $jdtgiiitype = $_POST['type'];
    $jdtgiiiemail = $_POST['email'];
    $jdtgiiiusername = $_POST['username'];
    $jdtgiiipassword = $_POST['password'];
    $hashhh = md5($jdtgiiipassword);
    $result = $db->query("INSERT INTO $thisTable (user_type, user_username, user_password, user_display, user_email) VALUES('$jdtgiiitype', '$jdtgiiiusername', '$hashhh', '$jdtgiiiname', '$jdtgiiiemail')");
if ($result) {
    echo '          <div class="col-lg-12">
                <div class="alert alert-dismissable alert-success">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  کاربر جدید با موفقیت افزوده شد.
                </div>
              </div>';
                                        echo '<script>setTimeout(function(){ window.location.href="'.$idpage.'"; }, 1000);</script>';
} else {
    echo '          <div class="col-lg-12">
                <div class="alert alert-dismissable alert-danger">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
عملیات ثبت کاربر با خطا مواجه شد
                </div>
              </div>';
}


}
?>


<div class="row">
    <div class="col-lg-12">

        <form action="usernew" method="post" role="form">


            <div class="form-group">
                <label>نام</label>
                <input name="name" class="form-control" placeholder="نام">
            </div>

            <div class="form-group">
                <label>مسولیت</label>
                <select name="type" class="form-control">
                    <option value='1'>مدیر</option>
                    <option value='2'>سردبیر</option>
                    <option value='3'>نویسنده</option>
                </select>
            </div>

            <div class="form-group">
                <label>ایمیل</label>
                <input name="email" class="form-control" placeholder="ایمیل">
            </div>

            <div class="form-group">
                <label>نام کاربری</label>
                <input name="username" class="form-control" placeholder="نام کاربری">
            </div>

            <div class="form-group">
                <label>رمز</label>
                <input name="password" type="password" class="form-control">
            </div>


            <button type="submit" class="btn btn-success">ذخیره</button>
            <button type="reset" class="btn btn-default">تنظیمات مجدد</button>

        </form>

    </div>


</div><!-- /.row -->


</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->

<!-- JavaScript -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>