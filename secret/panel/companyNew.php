<?php require_once '../config.php';
$idpage = "companyNew";
$thisTable = $categoryTable;
include("h.php");

if ($nametype != 1) {
    header("location:admin");
}


// get all company category
$allCompany = $db->query("select * from $thisTable WHERE sub_cat='0'");
$allCompany = $allCompany->fetch_all(1);


$id = isset($_REQUEST['id']) && checkUID($_REQUEST['id']) ? $_REQUEST['id'] : false;
$getCompanyID = (isset($_POST['companyID'])) ? $_POST['companyID'] : '';
$getSubCatID = '0';
$getTitle = (isset($_POST['title'])) ? $_POST['title'] : '';
$getImage = (isset($_POST['image'])) ? $_POST['image'] : '';


if ($id) {
    $information = $db->query("SELECT * FROM $thisTable WHERE id='$id'")->fetch_all(1);
    $information = ($information) ? $information[0] : false;

    $getCompanyID = (isset($information['id'])) ? $information['id'] : '';
    $getSubCatID = (isset($information['sub_cat'])) ? $information['sub_cat'] : '0';
    $getTitle = (isset($information['title'])) ? $information['title'] : '';
    $getImage = (isset($information['image'])) ? $information['image'] : '';
}

// register form
if (isset($_POST['registerForm'])) {
    $subCatVal = ($_POST['companyID'] != '0') ? $_POST['companyID'] : '0';
    $title = (isset($_POST['title']) && $_POST['title'] != '0') ? $_POST['title'] : false;
    $logo = (isset($_FILES['image']) && $_FILES['image']['name'] != '') ? $_FILES['image'] : false;
    $logo = ($subCatVal != '0') ? true : $logo;


    if ($title) {
        $isSubCat = $db->query("SELECT sub_cat FROM $thisTable WHERE id='$subCatVal'")->fetch_all(1);
        $isSubCat = ($isSubCat) ? $isSubCat[0]['sub_cat'] : '0';
        if ($isSubCat == '0') {
            $image = '';
            $imgName = changeAndGetFileName('Company', $logo['name']);
            $uploadFilePath = $uploadDirThumb . $imgName;
            if (move_uploaded_file($logo['tmp_name'], $uploadFilePath)) {
                $image = $imgName;
            } else {
                $image = '';
            }
            $ins = $db->query("INSERT INTO $thisTable (sub_cat, title) VALUES('$subCatVal', '$title')");

            if ($ins) {
                $class = 'success';
                $content = $errorsBank[3];
            } else {
                $class = 'danger';
                $content = $errorsBank[4];
            }
        } else {
            $class = 'danger';
            $content = $errorsBank[6];
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
if (isset($_POST['editForm'])) {
    $subCatVal = ($_POST['companyID'] != '') ? $_POST['companyID'] : '0';
    $id = (isset($_POST['id'])) ? $_POST['id'] : false;
    $title = (isset($_POST['title']) && $_POST['title'] != '') ? $_POST['title'] : false;
    $logo = (isset($_FILES['image']) && $_FILES['image']['name'] != '') ? $_FILES['image'] : false;

    if ($subCatVal != $id) {
        $image = $getImage;
        if ($title) {
            $isSubCat = $db->query("SELECT sub_cat FROM $thisTable WHERE id='$subCatVal'")->fetch_all(1);
            $isSubCat = ($isSubCat) ? $isSubCat[0]['sub_cat'] : '0';
            if ($isSubCat == '0') {
                $imgName = changeAndGetFileName('Company', $logo['name']);
                $uploadFilePath = $uploadDirThumb . $imgName;
                if (move_uploaded_file($logo['tmp_name'], $uploadFilePath)) {
                    $image = $imgName;
                    @unlink($uploadDirThumb . $getImage); // delete before image
                }
                $edi = $db->query("UPDATE $thisTable SET sub_cat='$subCatVal',title='$title' WHERE id='$id'");

                if ($edi) {
                    $class = 'success';
                    $content = $errorsBank[3];

                } else {
                    $class = 'success';
                    $content = $errorsBank[4];
                }
            } else {
                $class = 'danger';
                $content = $errorsBank[6];
            }
        } else {
            $class = 'danger';
            $content = $errorsBank[5];
        }
    } else {
        $class = 'danger';
        $content = $errorsBank[7];
    }


    // set alert and redirect
    $isRedirect = ($class == 'success') ? true : false;
    setAlert($content, $class, $isRedirect, $idpage, 2);

}
?>

<div class="row">
    <div class="col-lg-12">
        <form action="" method="post" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label>دسته بندی / زیر دسته</label>
                <select name="companyID" class="form-control" onchange="getModels(this,'select-icon');">
                    <option value="0" style="color: red;">برای ثبت زیر دسته، دسته بندی را انتخاب کنید</option>
                    <?php
                    foreach ($allCompany as $category => $cat):
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

            <!--<div class="form-group" id="select-icon">
                <label>تصویر </label>
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
<script>
    function getModels(thisElement, modelId) {
        var thisVal = $(thisElement).val();


        if (thisVal == "0") {
            $("#" + modelId).show();
        } else {
            $("#" + modelId).hide();
        }

    }


</script>
</body>
</html>