<?php require_once '../config.php';
$idpage = "membersNew";
$thisTable = $usersTable;
include("h.php");

if ($nametype != 1) {
    header("location:admin");
}

$allPackages = $db->query("SELECT id,title FROM $packagesTable")->fetch_all(1);

// edit packages
$id = isset($_REQUEST['id']) && checkUID($_REQUEST['id']) ? $_REQUEST['id'] : false;


$getType = (isset($_POST['type'])) ? $_POST['type'] : '';
$getUsername = (isset($_POST['username'])) ? $_POST['username'] : '';
$getMobile = (isset($_POST['mobile'])) ? $_POST['mobile'] : '';
$getMoaref = (isset($_POST['moaref'])) ? $_POST['moaref'] : '';
$getHesabNumber = (isset($_POST['hesabNumber'])) ? $_POST['hesabNumber'] : '';
$getPassword = (isset($_POST['password'])) ? $_POST['password'] : '';
$getCredit = (isset($_POST['credit'])) ? $_POST['credit'] : '';


if ($id) {
    $information = $db->query("SELECT * FROM $thisTable WHERE id='$id'")->fetch_all(1);
    $information = ($information) ? $information[0] : false;

    //$getPackageID = (isset($information['package_id'])) ? $information['package_id'] : '';
    $getType = (isset($information['type'])) ? $information['type'] : '';
    $getUsername = (isset($information['username'])) ? $information['username'] : '';
    $getMobile = (isset($information['mobile'])) ? $information['mobile'] : '';
    $getMoaref = (isset($information['moaref'])) ? $information['moaref'] : '';
    $getHesabNumber = (isset($information['hesab_number'])) ? $information['hesab_number'] : '';
    $getPassword = (isset($information['password'])) ? $information['password'] : '';
    $getCredit = (isset($information['credit'])) ? $information['credit'] : '';
}

// create user
if (isset($_POST['registerButton'])) {
    //$packageID = (isset($_POST['package'])) ? sanitize($_POST['package']) : false;
    $type = (isset($_POST['type'])) ? sanitize($_POST['type']) : false;
    $username = (isset($_POST['username'])) ? sanitize($_POST['username']) : false;
    $mobile = (isset($_POST['mobile'])) ? sanitize($_POST['mobile']) : false;
    $moaref = (isset($_POST['moaref'])) ? sanitize($_POST['moaref']) : '';
    $hesabNumber = (isset($_POST['hesabNumber'])) ? sanitize($_POST['hesabNumber']) : '';
    $password = (isset($_POST['password']) && $_POST['password'] != '') ? sanitize($_POST['password']) : false;
    $credit = (isset($_POST['credit']) && $_POST['credit'] != '') ? sanitize($_POST['credit']) : 0;


    if ($username && $mobile && $password) {
        $alreadyUsername = getField($usersTable, 'id', 'username', $username);
        $alreadyMobile = getField($usersTable, 'id', 'mobile', $mobile);

        /* $imgName = '';
         if ($image) {
             $imgName = changeAndGetFileName('Members', $image['name']);
             $uploadFilePath = $uploadDirOriginal . $imgName;
             if (move_uploaded_file($image['tmp_name'], $uploadFilePath)) {
                 createAndGetThumbURL($uploadFilePath, $uploadDirThumb, $imgName, $image['type']);
                 createAndGetThumbURL2($uploadFilePath, $uploadDirImage, $imgName, $image['type']);
                 @unlink($uploadFilePath); // delete original
             } else {
                 $imgName = '';
             }
         }*/



        if (!$alreadyUsername) {
            if (!$alreadyMobile) {
                $passHashed = ($password) ? getHash($password) : getHash($mobile);
                $sql = "INSERT INTO $thisTable (username,mobile,password,credit,type,moaref,hesab_number) VALUES('$username','$mobile','$passHashed','$credit','$type','$moaref','$hesabNumber')";
                $result = $db->query($sql);
                if ($result) {
                    $class = 'success';
                    $content = $errorsBank[3];
                } else {
                    $class = 'danger';
                    $content = $errorsBank[4];
                }
            } else {
                $class = 'warning';
                $content = $errorsBank[2];
            }
        } else {
            $class = 'warning';
            $content = $errorsBank[1];
        }
    } else {
        $class = 'danger';
        $content = $errorsBank[5];
    }

    // set alert and redirect
    $isRedirect = ($class == 'success') ? true : false;
    setAlert($content, $class, $isRedirect, $idpage, 2);
}

// edit form
if (isset($_POST['editButton'])) {
    //$packageID = (isset($_POST['package']) && $_POST['package'] != 0) ? sanitize($_POST['package']) : false;
    $type = (isset($_POST['type'])) ? sanitize($_POST['type']) : false;
    $username = (isset($_POST['username'])) ? sanitize($_POST['username']) : false;
    $mobile = (isset($_POST['mobile'])) ? sanitize($_POST['mobile']) : false;
    $moaref = (isset($_POST['moaref'])) ? sanitize($_POST['moaref']) : $getMoaref;
    $hesabNumber = (isset($_POST['hesabNumber'])) ? sanitize($_POST['hesabNumber']) : $getHesabNumber;
    $password = (isset($_POST['password']) && $_POST['password'] != '') ? sanitize($_POST['password']) : false;
    $credit = (isset($_POST['credit']) && $_POST['credit'] != '') ? sanitize($_POST['credit']) : 0;
    $id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '0';

    if ($username && $mobile) {
        $alreadyUsername = $db->query("SELECT id FROM $usersTable WHERE username='$username' AND id!='$id'")->fetch_all();
        $alreadyMobile = $db->query("SELECT id FROM $usersTable WHERE mobile='$mobile' AND id!='$id'")->fetch_all();

        /*$imgName = $getImage;
        if ($image) {
            $imgName = changeAndGetFileName('Members', $image['name']);
            $uploadFilePath = $uploadDirOriginal . $imgName;
            if (move_uploaded_file($image['tmp_name'], $uploadFilePath)) {
                createAndGetThumbURL($uploadFilePath, $uploadDirThumb, $imgName, $image['type']);
                createAndGetThumbURL2($uploadFilePath, $uploadDirImage, $imgName, $image['type']);
                @unlink($uploadDirImage . $getImage); // delete before image
                @unlink($uploadFilePath); // delete original
            } else {
                $imgName = $getImage;
            }
        }*/

        if (!$alreadyUsername) {
            if (!$alreadyMobile) {
                $passHashed = ($password) ? getHash($password) : getHash($mobile);
                $sql = "UPDATE $thisTable SET username='$username',mobile='$mobile',password='$passHashed',credit='$credit',type='$type',moaref='$moaref',hesab_number='$hesabNumber' WHERE id='$id'";
                $result = $db->query($sql);
                if ($result) {
                    $class = 'success';
                    $content = $errorsBank[3];
                } else {
                    $class = 'danger';
                    $content = $errorsBank[4];
                }
            } else {
                $class = 'warning';
                $content = $errorsBank[2];
            }
        } else {
            $class = 'warning';
            $content = $errorsBank[1];
        }
    } else {
        $class = 'danger';
        $content = $errorsBank[5];
    }

    // set alert and redirect
    $isRedirect = ($class == 'success') ? true : false;
    setAlert($content, $class, $isRedirect, $idpage, 2);
}
?>

<div class="row clearfix">
    <div class="col-lg-12">
        <form action="" method="post" role="form" enctype="multipart/form-data">
            <div class="row clearfix">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label>نوع کاربری</label>
                    <select name="type" class="form-control">
                        <option value="0">نوع کاربر را انتخاب کنید</option>
                        <option value="user" <?php echo ($getType == 'user') ? 'selected' : ''; ?>>کاربر</option>
                        <option value="visitor" <?php echo ($getType == 'visitor') ? 'selected' : ''; ?>>کارمند</option>
                    </select>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label>نام جیرجیرکی</label>
                    <input value="<?php echo $getUsername; ?>" name="username"
                           type="text" class="form-control" placeholder="نام جیرجیرکی را وارد کنید">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label>موبایل</label>
                    <input value="<?php echo $getMobile; ?>" name="mobile"
                           type="text" class="form-control" placeholder="موبایل را وارد کنید">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label>نام جیرجیرکی معرف</label>
                    <input value="<?php echo $getMoaref; ?>" name="moaref" type="text" class="form-control"
                           placeholder="نام جیرجیرکی معرف را وارد کنید">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label>رمز عبور</label>
                    <input name="password" type="text" class="form-control"
                           placeholder="رمز عبور را وارد کنید">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label>میزان شارژ</label>
                    <input value="<?php echo $getCredit; ?>" name="credit" type="text" class="form-control"
                           placeholder="میزان شارژ را وارد کنید">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label>شماره حساب</label>
                    <input value="<?php echo $getHesabNumber; ?>" name="hesabNumber" type="text" class="form-control"
                           placeholder="شماره حساب را وارد کنید">
                </div>
            </div>
            <!--<div class="row clearfix">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-right">
                        <label>پکیج تعرفه</label>
                        <select name="package" class="form-control">
                            <option value="0">پکیج تعرفه را انتخاب کنید</option>
                            <?php /*if ($allPackages) {
                                foreach ($allPackages as $packages => $package) {
                                    $selected = ($package['id'] == $getPackageID) ? 'selected' : '';
                                    */ ?>
                                    <option
                                        value="<? /*= $package['id']; */ ?>" <? /*= $selected; */ ?>><? /*= $package['title']; */ ?></option>
                                <?php /*}
                            } */ ?>
                        </select>
                    </div>
                </div>-->

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                <div class="text-center">
                    <?php if ($id) { ?>
                        <button type="submit" name="editButton" class="btn btn-success">ویرایش</button>
                    <?php } else { ?>
                        <button type="submit" name="registerButton" class="btn btn-success">ذخیره</button>
                    <?php } ?>
                    <button type="reset" class="btn btn-default">بازنشانی فرم</button>
                </div>
            </div>
            <br>
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