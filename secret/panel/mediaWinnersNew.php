<?php require_once '../config.php';
$idpage = "mediaWinnersNew";
$thisTable = $mediaWinnerTable;
include("h.php");

if ($nametype != 1) {
    header("location:admin");
}


$allowedTypeFile = ['image/png', 'image/jpg', 'image/jpeg', 'video/mp4'];
$allowedSizeImage = 2000000; // 2.000.000 => 2 mb
$allowedSizeImageNum = $allowedSizeImage / 1000 / 1000; // 2.000.000 => 2 mb
$allowedSizevideo = 10000000; // 10.000.000 => 10 mb
$allowedSizevideoNum = $allowedSizevideo / 1000 / 1000;


$id = isset($_REQUEST['id']) && checkUID($_REQUEST['id']) ? $_REQUEST['id'] : false;

$getTitle = (isset($_POST['title'])) ? $_POST['title'] : '';
$getDescription = (isset($_POST['description'])) ? $_POST['description'] : '';
$getType = (isset($_POST['type'])) ? $_POST['type'] : '';
$getMedia = (isset($_FILES['media']) && $_FILES['media']['name'] != '') ? $_FILES['media'] : '';

if ($id) {

$information = $db->query("SELECT * FROM $thisTable WHERE id='$id'")->fetch_all(1);
$information = ($information) ? $information[0] : false;

$getTitle = (isset($information['title'])) ? $information['title'] : '';
$getDescription = (isset($information['description'])) ? $_POST['description'] : '';
$getType = (isset($information['type'])) ? $information['type'] : '';
$getMedia = (isset($information['media_name'])) ? $information['media_name'] : '';
}

// create user
if (isset($_POST['registerButton'])) {

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

 echo '<pre>';
    print_r($_FILES);
    echo '</pre>';



    $title = (isset($_POST['title'])) ? sanitize($_POST['title']) : false;
    $description = (isset($_POST['description'])) ? sanitize($_POST['description']) : false;
    $type = (isset($_POST['type']) && $_POST['type'] != 0 && $_POST['type'] != '') ? sanitize($_POST['type']) : false;
    $media = (isset($_FILES['media']) && $_FILES['media']['name'] != '') ? $_FILES['media'] : false;


    if ($title && $description && $type) {
        $mediaNotError = true;
        if ($type == 'image') {
            if ($media["size"] < $allowedSizeImage) {
                if (in_array($media['type'], $allowedTypeFile) && $media['type'] != 'video/mp4') {
                    $fileName = changeAndGetFileName('file-' . $type, $media['name']);
                    $uploadFilePath = $baseOriginalAddress . $fileName;
                    if (move_uploaded_file($media['tmp_name'], $uploadFilePath)) {
                        createAndGetThumbURL($uploadFilePath, $baseThumbAddress, $fileName, $media['type']);
                        createAndGetThumbURL2($uploadFilePath, $baseImageAddress, $fileName, $media['type']);
                        @unlink($uploadFilePath); // delete original
                        $class = 'success';
                        $content = "آپلود تصویر با موفقیت انجام شد";
                    } else {
                        $class = 'danger';
                        $content = "آپلود تصویر با خطا مواجه شد";
                        $mediaNotError = false;
                    }
                } else {
                    $class = 'danger';
                    $content = "فرمت عکس شما نامعتبر است، فرمت مجاز jpg-jpeg-png می باشد";
                    $mediaNotError = false;
                }
            } else {
                $class = 'warning';
                $content = "حجم فایل شما بیشتر از حد مجاز (" . $allowedSizeImageNum . " مگابایت) است";
                $mediaNotError = false;
            }
        } elseif ($type == 'video') {
            if ($media["size"] < $allowedSizevideo) {
                if ($media['type'] == 'video/mp4') {
                    $fileName = changeAndGetFileName('file-' . $type, $media['name']);
                    $uploadFilePath = $baseVideoAddress . $fileName;
                    if (move_uploaded_file($media['tmp_name'], $uploadFilePath)) {
                        $class = 'success';
                        $content = "آپلود ویدئو با موفقیت انجام شد";
                    } else {
                        $class = 'danger';
                        $content = "آپلود ویدئو با خطا مواجه شد";
                        $mediaNotError = false;
                    }
                } else {
                    $class = 'warning';
                    $content = "فرمت ویدئو شما نامعتبر است، فرمت مجاز mp4 می باشد";
                    $mediaNotError = false;
                }
            } else {
                $class = 'warning';
                $content = "حجم فایل شما بیشتر از حد مجاز (" . $allowedSizevideoNum . " مگابایت) است";
                $mediaNotError = false;
            }
        }
        if ($mediaNotError) {
            $sql = "INSERT INTO $thisTable (title,description,type,media_name) VALUES('$title','$description','$type','$fileName')";
            $result = $db->query($sql);


            if ($result) {
                $class = 'success';
                $content = $errorsBank[3];
            } else {
                $class = 'danger';
                $content = $errorsBank[4];
            }
        } else {
            $class = 'danger';
            $content =$content;
        }
    } else {
        $class = 'danger';
        $content = $errorsBank[5].'dfdfsd';
    }

    // set alert and redirect
    $isRedirect = ($class == 'success') ? true : false;
    setAlert($content, $class, $isRedirect, $idpage, 2);
}

// edit form
if (isset($_POST['editButton'])) {
    //$packageID = (isset($_POST['package']) && $_POST['package'] != 0) ? sanitize($_POST['package']) : false;
    $username = (isset($_POST['username'])) ? sanitize($_POST['username']) : false;
    $mobile = (isset($_POST['mobile'])) ? sanitize($_POST['mobile']) : false;
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

        $passHashed = ($password) ? getHash($password) : getHash($mobile);
        $sql = "UPDATE $thisTable SET username='$username',mobile='$mobile',password='$passHashed',credit='$credit' WHERE id='$id'";


        $result = $db->query($sql);

        if (!$alreadyUsername) {
            if (!$alreadyMobile) {
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
                    <label><span class="star-red"></span> عنوان</label>
                    <input value="<?php echo $getTitle; ?>" name="title"
                           type="text" class="form-control" placeholder="عنوان رسانه را وارد کنید">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="star-red"></span> توضیحات</label>
                    <textarea name="description" cols="30" rows="1" class="form-control"
                              placeholder="توضیحات رسانه را وارد کنید"><?php echo $getDescription; ?></textarea>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="star-red"></span> نوع رسانه</label>
                    <select name="type" class="form-control">
                        <option value="0">نوع رسانه را انتخاب کنید</option>
                        <option value="image" <?php echo ($getTitle == 'image')?'selected':'';?>>عکس</option>
                        <option value="video" <?php echo ($getTitle == 'video')?'selected':'';?>>ویدئو</option>
                    </select>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="star-red"></span> آپلود رسانه</label>
                    <input type="file" name="media" class="form-control">
                </div>
            </div>
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