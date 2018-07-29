<?php require_once '../config.php';
$idpage = "pricingNew";
$thisTable = $pricingTable;
include("h.php");

if ($nametype != 1) {
    header("location:admin");
}

// get all company category
$allCompany = $db->query("select * from $companyTable WHERE sub_cat='0'");

$id = isset($_REQUEST['id']) && checkUID($_REQUEST['id']) ? $_REQUEST['id'] : false;
$information = false;
$getCompanyID = (isset($_POST['company_id'])) ? $_POST['company_id'] : '';
$getModel = (isset($_POST['model'])) ? $_POST['model'] : '';
$getYear = (isset($_POST['year'])) ? $_POST['year'] : '';
$getPrice = (isset($_POST['price'])) ? $_POST['price'] : '';
$getDescription = (isset($_POST['description'])) ? $_POST['description'] : '';


if ($id) {
    $information = $db->query("SELECT * FROM $thisTable WHERE id='$id'")->fetch_all(1);
    $information = ($information) ? $information[0] : false;

    $getCompanyID = ($information['company_id']) ? $information['company_id'] : '';
    $getModel = ($information['model']) ? $information['model'] : '';
    $getYear = ($information['year']) ? $information['year'] : '';
    $getPrice = ($information['price']) ? $information['price'] : '';
    $getDescription = ($information['description']) ? $information['description'] : '';
}


// register
if (isset($_POST['registerForm'])) {
    $companyID = (isset($_POST['company_id']) && $_POST['company_id'] != 0 && checkUID($_POST['company_id'])) ? sanitize($_POST['company_id']) : false;
    $model = (isset($_POST['model']) && $_POST['model'] != 0 && checkUID($_POST['model'])) ? sanitize($_POST['model']) : false;
    $year = (isset($_POST['year']) && $_POST['year'] != '') ? sanitize($_POST['year']) : false;
    $price = (isset($_POST['price']) && $_POST['price'] != '') ? sanitize($_POST['price']) : false;
    $description = (isset($_POST['description']) && $_POST['description'] != '') ? sanitize($_POST['description']) : false;

    if ($companyID && $model && $year && $price && $description) {

        $result = $db->query("INSERT INTO $thisTable (company_id,model,year,price,description,update_time) VALUES('$companyID','$model','$year','$price','$description','$nowTime')");

        if ($result) {
            $class = 'success';
            $content = 'عملیات ثبت با موفقیت انجام شد';
        } else {
            $class = 'danger';
            $content = 'عملیات ثبت با خطا مواجه شد';
        }
    } else {

        $class = 'danger';
        $content = 'اطلاعات الزامی حتما باید به صورت صحیح تکمیل شوند';
    }


    echo '<div class="col-lg-12">
               				<div class="alert alert-dismissable alert-' . $class . '">
               				  <button type="button" class="close" data-dismiss="alert">&times;</button>' . $content . '</div>
               			  </div>';

    if ($class == 'success') {
        echo '<script>window.setTimeout(function(){window.location.href = "' . $idpage . '";}, 2000);</script>';
    }
}


// edit
if (isset($_POST['editForm'])) {
    $id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : false;
    $companyID = (isset($_POST['company_id']) && $_POST['company_id'] != 0 && checkUID($_POST['company_id'])) ? sanitize($_POST['company_id']) : false;
    $model = (isset($_POST['model']) && $_POST['model'] != 0 && checkUID($_POST['model'])) ? sanitize($_POST['model']) : false;
    $year = (isset($_POST['year']) && $_POST['year'] != '') ? sanitize($_POST['year']) : false;
    $price = (isset($_POST['price']) && $_POST['price'] != '') ? sanitize($_POST['price']) : false;
    $description = (isset($_POST['description']) && $_POST['description'] != '') ? sanitize($_POST['description']) : false;


    if ($id && $companyID && $model && $year && $price && $description) {
        $result = $db->query("UPDATE $thisTable SET company_id='$companyID',model='$model',year='$year',price='$price',description='$description',update_time='$nowTime' WHERE id='$id'");
        if ($result) {
            $class = 'success';
            $content = 'عملیات ثبت با موفقیت انجام شد';

        } else {
            $class = 'success';
            $content = 'عملیات ثبت با خطا مواجه شد';
        }
    } else {
        $class = 'danger';
        $content = 'اطلاعات الزامی حتما باید به صورت صحیح تکمیل شوند';
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
            <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                                <label><span class="requireStar">*</span> کمپانی</label>
                                <select name="company_id" class="form-control" onchange="getMyJson(this,'model')">
                                    <option value="0" style="color: red;">کمپانی را انتخاب کنید</option>
                                    <?php
                                    foreach ($allCompany as $category => $co):
                                        $selected = ($getCompanyID == $co['id']) ? 'selected' : '';
                                        ?>
                                        <option style="color: #000000; font-weight: bold;"
                                                value="<?php echo $co['id']; ?>" <?php echo $selected; ?>>+
                                            <?php echo $co['title']; ?></option>
                                        <?php
                                        //$tID = $cat['id'];
                                        //getSubCat($thisTable, $id, $tID);
                                    endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                                <label><span class="requireStar">*</span> مدل</label>
                                <select name="model" class="form-control" id="model">
                                    <option value="0" style="color: red;">مدل را انتخاب کنید</option>
                                </select>
                            </div>
                        </div>

            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> سال ساخت</label>
                    <input type="text" name="year" class="form-control"
                           value="<?php echo $getYear; ?>"
                           placeholder="سال ساخت">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-left">
                    <label><span class="requireStar">*</span> قیمت</label>
                    <input type="text" name="price" class="form-control"
                           value="<?php echo $getPrice; ?>"
                           placeholder="قیمت">
                </div>

            </div>

            <div class="row">
                <div class="form-group col-lg-12">
                    <label><span class="requireStar">*</span> توضیحات</label>
                    <textarea name="description" class="form-control" cols="30" rows="5"
                              placeholder="توضیحات را وارد کنید"><?php echo $getDescription; ?></textarea>
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            </div>

            <div class="row text-center">
                <?php
                if ($id != '') {
                    echo '<input type="hidden" name="editID" value="' . $id . '">';
                }
                ?>
                <br><br>
                <?php if ($id != '') {
                    echo '<button name="editForm" type="submit" class="btn btn-success">ویرایش</button>';
                } else {
                    echo '<button name="registerForm" type="submit" class="btn btn-success">ذخیره</button>';
                } ?>
                <button type="reset" class="btn btn-default">بازنشانی فرم</button>
            </div>

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
    /*$('#base').on('change', function () {
        if (this.value == "0") {
            $("#select-icon").show();
        } else {
            $("#select-icon").hide();
        }
    })*/


    function getMyJson(thisElement, targetId) {
            $("#" + targetId).html('<option value="">در حال دریافت اطلاعات...</option>');
            var modelArr = ['model', 'model1', 'model2'];
            var cityArr = ['city', 'city1', 'city2', 'city3', 'city4', 'city5', 'city6', 'city7', 'city8', 'city9', 'city10'];
            var allowedModelIndex = modelArr.indexOf(targetId);
            var allowedCityIndex = cityArr.indexOf(targetId);

            var optionTitle;
            if (allowedModelIndex >= 0) {
                optionTitle = 'مدل را انتخاب کنید';
            } else if (allowedCityIndex >= 0) {
                optionTitle = 'شهر یا محله را انتخاب کنید';
            }

            var companyId = $(thisElement).val();
            $.getJSON("getJson.php?getJ=" + targetId, function (result) {
                $("#" + targetId).html('<option value="0" style="color: red;">' + optionTitle + '</option>');
                var arrLength = result.length;
                for (var i = 0; i < arrLength; i++) {
                    if (result[i]['sub_cat'] == companyId) {
                        document.getElementById(targetId).innerHTML += '<option value="' + result[i]['id'] + '">' + result[i]['title'] + '</option>';
                    }
                }
            });
        }
</script>
</body>
</html>