<?php require_once '../config.php';
$idpage = "zapasCategoryNew";
$thisTable = $zapasCategoryTable;
include("h.php");

if ($nametype != 1) {
    header("location:admin");
}


// get all company category
$allCategory = $db->query("select * from $thisTable WHERE sub_cat='0'");
$allCategory = $allCategory->fetch_all(1);


$id = isset($_REQUEST['id']) && checkUID($_REQUEST['id']) ? $_REQUEST['id'] : false;
$getCompanyID = (isset($_POST['companyID'])) ? $_POST['companyID'] : '';
$getSubCatID = '0';
$getTitle = (isset($_POST['title'])) ? $_POST['title'] : '';
//$getImage = (isset($_POST['image'])) ? $_POST['image'] : '';


if ($id) {
    $information = $db->query("SELECT * FROM $thisTable WHERE id='$id'")->fetch_all(1);
    $information = ($information) ? $information[0] : false;

    $getCompanyID = (isset($information['id'])) ? $information['id'] : '';
    $getSubCatID = (isset($information['sub_cat'])) ? $information['sub_cat'] : '0';
    $getTitle = (isset($information['title'])) ? $information['title'] : '';
    //$getImage = (isset($information['image'])) ? $information['image'] : '';
}

// register form
if (isset($_POST['registerForm'])) {
    $subCatVal = ($_POST['companyID'] != '0') ? $_POST['companyID'] : '0';
    $title = (isset($_POST['title']) && $_POST['title'] != '0') ? $_POST['title'] : false;
    //$logo = (isset($_FILES['image']) && $_FILES['image']['name'] != '') ? $_FILES['image'] : false;

    if ($title) {
        $isSubCat = $db->query("SELECT sub_cat FROM $thisTable WHERE id='$subCatVal'")->fetch_all(1);
        $isSubCat = ($isSubCat) ? $isSubCat[0]['sub_cat'] : '0';
        if ($isSubCat == '0') {
            if ($subCatVal == '0') {
                $image = '';
                /*$imgName = changeAndGetFileName('Company', $logo['name']);
                $uploadFilePath = $uploadDirThumb . $imgName;
                if (move_uploaded_file($logo['tmp_name'], $uploadFilePath)) {
                    $image = $uploadFilePath;
                } else {
                    $image = '';
                }*/
                $ins = $db->query("INSERT INTO $thisTable (sub_cat, title) VALUES('$subCatVal', '$title')");

                if ($ins) {
                    $class = 'success';
                    $content = 'عملیات ثبت با موفقیت انجام شد';
                } else {
                    $class = 'danger';
                    $content = 'عملیات ثبت با خطا مواجه شد';
                }
            } else {
                $class = 'danger';
                $content = 'امکان ثبت زیردسته وجود ندارد';
            }
        } else {
            $class = 'danger';
            $content = 'فقط امکان انتخاب یک دسته می باشد';
        }
    } else {
        $class = 'danger';
        $content = 'اطلاعات الزامی حتما باید به صورت صحیح تکمیل شوند';
    }

    echo '<div class="col-lg-12">
            <div class="alert alert-dismissable alert-' . $class . '"><button type="button" class="close" data-dismiss="alert">&times;</button>' . $content . '</div>
          </div>';

    if ($class == 'success') {
        echo '<script>window.setTimeout(function(){window.location.href = "' . $idpage . '";}, 2000);</script>';
    }
}

// edit form
if (isset($_POST['editForm'])) {
    $subCatVal = ($_POST['companyID'] != '') ? $_POST['companyID'] : '0';
    $id = (isset($_POST['id'])) ? $_POST['id'] : false;
    $title = (isset($_POST['title']) && $_POST['title'] != '') ? $_POST['title'] : false;
    //$logo = (isset($_FILES['image']) && $_FILES['image']['name'] != '') ? $_FILES['image'] : false;

    if ($subCatVal != $id) {
        //$image = $getImage;
        if ($title) {
            $isSubCat = $db->query("SELECT sub_cat FROM $thisTable WHERE id='$subCatVal'")->fetch_all(1);
            $isSubCat = ($isSubCat) ? $isSubCat[0]['sub_cat'] : '0';
            if ($isSubCat == '0') {
                /*$imgName = changeAndGetFileName('Company', $logo['name']);
                $uploadFilePath = $uploadDirThumb . $imgName;
                if (move_uploaded_file($logo['tmp_name'], $uploadFilePath)) {
                    $image = $uploadFilePath;
                    @unlink($getImage); // delete before image
                }*/
                $edi = $db->query("UPDATE $thisTable SET sub_cat='$subCatVal',title='$title' WHERE id='$id'");

                if ($edi) {
                    $class = 'success';
                    $content = 'عملیات ثبت با موفقیت انجام شد';

                } else {
                    $class = 'success';
                    $content = 'عملیات ثبت با خطا مواجه شد';
                }
            } else {
                $class = 'danger';
                $content = 'فقط امکان انتخاب یک دسنه می باشد';
            }
        } else {
            $class = 'danger';
            $content = 'اطلاعات الزامی حتما باید به صورت صحیح تکمیل شوند';
        }
    } else {
        $class = 'danger';
        $content = 'شما نمی توانید یک دسته را به عنوان یک زیردسته برای خودش انتخاب کنید!';
    }

    echo '<div class="col-lg-12">
                       				<div class="alert alert-dismissable alert-' . $class . '">
                       				  <button type="button" class="close" data-dismiss="alert">&times;</button>' . $content . '</div>
                       			  </div>';

    if ($class == 'success') {
        echo '<script>window.setTimeout(function(){window.location.href = "' . str_replace('New', '', $idpage) . '";}, 2000);</script>';
    }
}
?>

<div class="row">
    <div class="col-lg-12">
        <form action="" method="post" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label>دسته / زیردسته</label>
                <select name="companyID" class="form-control" id="base">
                    <option value="0" style="color: red;">برای ثبت زیردسته، دسته اصلی را انتخاب کنید</option>
                    <?php
                    foreach ($allCategory as $category => $cat):
                        $selected = ($getSubCatID != '0' && $getSubCatID == $cat['id']) ? 'selected' : '';
                        ?>
                        <option style="color: #000000; font-weight: bold;"
                                value="<?php echo $cat['id']; ?>" <?php echo $selected; ?>>+
                            <?php echo $cat['title']; ?></option>
                        <?php
                        $tID = $cat['id'];
                        getSubCat($thisTable, $id, $tID);
                    endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>عنوان</label>
                <input type="text" name="title" class="form-control"
                       value="<?php echo $getTitle; ?>"
                       placeholder="عنوان">
            </div>

            <!--<div class="form-group">
                <label>لوگو </label>
                <input type="file" name="image" class="form-control">
            </div>-->
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <br><br>
            <?php if ($id != '') {
                echo '<button name="editForm" type="submit" class="btn btn-success">ویرایش</button>';
            } else {
                echo '<button name="registerForm" type="submit" class="btn btn-success">ذخیره</button>';
            } ?>
            <button type="reset" class="btn btn-default">بازنشانی فرم</button>
        </form>
    </div>

</div><!-- /.row -->

</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->

<!-- JavaScript -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/index.js"></script>
<!--<script>
    $('#base').on('change', function () {
        if (this.value == "0") {
            $("#select-icon").show();
        } else {
            $("#select-icon").hide();
        }
    })
</script>-->
</body>
</html>