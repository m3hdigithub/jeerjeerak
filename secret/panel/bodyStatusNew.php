<?php require_once '../config.php';
$idpage = "bodyStatusNew";
$thisTable = $bodyStatusTable;
include("h.php");

if ($nametype != 1) {
    header("location:admin");
}


// edit packages
$id = isset($_REQUEST['id']) && checkUID($_REQUEST['id']) ? $_REQUEST['id'] : false;
$information = false;
$getTtitle = (isset($_POST['title'])) ? $_POST['title'] : '';


if ($id) {
    $information = $db->query("SELECT * FROM $thisTable WHERE id='$id'")->fetch_all(1);
    $information = ($information) ? $information[0] : false;

    $getTtitle = ($information['title']) ? $information['title'] : '';

}


// edit form
if (isset($_POST['editPackage'])) {
    $title = (isset($_POST['title']) && $_POST['title'] != '') ? $_POST['title'] : false;
    $id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '0';


    if ($title) {

        $result = $db->query("UPDATE $thisTable SET title='$title',update_time='$nowTime' WHERE id='$id'");

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
        echo '<script>window.setTimeout(function(){window.location.href = "' . str_replace('New', '', $idpage) . '";}, 2000);</script>';
    }


}


// create form
if (isset($_POST['registerPackage'])) {
    $title = (isset($_POST['title']) && $_POST['title'] != '') ? $_POST['title'] : false;
    if ($title) {
        $result = $db->query("INSERT INTO $thisTable (title,update_time) VALUES('$title','$nowTime')");
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
?>

<div class="row clearfix">
    <div class="col-lg-12">

        <form action="" method="post" role="form" enctype="multipart/form-data">

            <div class="row clearfix">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label>عنوان</label>
                    <input value="<?php echo $getTtitle; ?>" name="title"
                           type="text" class="form-control" placeholder="عنوان را وارد کنید">
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 clearfix">
                    <br>
                    <div class="text-right">
                        <?php if ($id) { ?>
                            <button type="submit" name="editPackage" class="btn btn-success">ویرایش</button>
                        <?php } else { ?>
                            <button type="submit" name="registerPackage" class="btn btn-success">ذخیره</button>
                        <?php } ?>
                        <button type="reset" class="btn btn-default">بازنشانی فرم</button>
                    </div>
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