<?php include("../config.php");
$idpage = "useredit";
$thisTable = $adminTable;
include("h.php");
if ($nametype != 1) {
    header("location:admin");
}
if (!isset($_REQUEST['id'])) {
    echo '          <div class="col-lg-12">
            <div class="alert alert-dismissable alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              امکان ورود مستقیم یا رفرش صفحه وجود ندارد.
            </div>
          </div>';
} else {
    if (isset($_POST['name']) || isset($_POST['type']) || isset($_POST['email']) || isset($_POST['username'])) {

        $sfrsdrfg = $_REQUEST['id'];

        $jdtgiiiname = $_POST['name'];
        $jdtgiiitype = $_POST['type'];
        $jdtgiiiemail = $_POST['email'];
        $jdtgiiiusername = $_POST['username'];
        $jdtgiiipassword = $_POST['password'];


        $sql = "UPDATE $thisTable SET user_display='$jdtgiiiname', user_type='$jdtgiiitype', user_email='$jdtgiiiemail', user_username='$jdtgiiiusername' WHERE user_id = '$sfrsdrfg'";

        if (isset($jdtgiiipassword)) {

            $hashhh = md5($jdtgiiipassword);
            $sql = "UPDATE $thisTable SET user_display='$jdtgiiiname', user_type='$jdtgiiitype', user_email='$jdtgiiiemail', user_username='$jdtgiiiusername',user_password='$hashhh' WHERE user_id = '$sfrsdrfg'";
        }

        $update = $db->query($sql);

        if ($result) {
            echo '          <div class="col-lg-12">
                        <div class="alert alert-dismissable alert-success">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          کاربر جدید با موفقیت ویرایش شد.
                        </div>
                      </div>';
            echo '<script>setTimeout(function(){ window.location.href="'.$idpage.'?id='.$sfrsdrfg.'"; }, 1000);</script>';
        } else {
            echo '          <div class="col-lg-12">
                        <div class="alert alert-dismissable alert-danger">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
        عملیات ویرایش کاربر با خطا مواجه شد
                        </div>
                      </div>';
        }

    } else {

        ?>
        <?php

        $sfrsdrfg = $_REQUEST['id'];
        $rejjuknkjt = $db->query("SELECT * FROM $thisTable WHERE user_id = '$sfrsdrfg'")->fetch_all(1);
        if ($rejjuknkjt) {
            foreach ($rejjuknkjt as $admins => $adm) {
                $post_edit_body[1] = $adm['user_display'];
                $post_edit_body[2] = $adm['user_type'];
                $post_edit_body[3] = $adm['user_username'];
                $post_edit_body[4] = $adm['user_email'];
            }
        } else {
            echo '<div class="alert alert-danger text-center">کاربری با این مشخصات وجود ندارد!</div>';
        exit();
        }


        ?>

        <div class="row">
            <div class="col-lg-12">
                <form action="useredit" method="post" role="form">
                    <input name="id" type="hidden" value="<?php echo $sfrsdrfg; ?>">


                    <div class="form-group">
                        <label>نام</label>
                        <input name="name" class="form-control" value="<?php echo $post_edit_body[1]; ?>">
                    </div>

                    <div class="form-group">
                        <label>مسولیت</label>
                        <select name="type" class="form-control">
                            <option <?php if ($post_edit_body[2] == 1) {
                                echo "selected='selected'";
                            } ?> value='1'>مدیر
                            </option>
                            <option <?php if ($post_edit_body[2] == 2) {
                                echo "selected='selected'";
                            } ?> value='2'>سردبیر
                            </option>
                            <option <?php if ($post_edit_body[2] == 3) {
                                echo "selected='selected'";
                            } ?> value='3'>نویسنده
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>ایمیل</label>
                        <input name="email" class="form-control" value="<?php echo $post_edit_body[4]; ?>">
                    </div>

                    <div class="form-group">
                        <label>نام کاربری</label>
                        <input name="username" class="form-control" value="<?php echo $post_edit_body[3]; ?>">
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

    <?php }
} ?>
</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->

<!-- JavaScript -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>