<?php require_once '../config.php';
$idpage = "packagesNew";
$thisTable = $packagesTable;
include("h.php");

if ($nametype != 1) {
    header("location:admin");
}

// edit packages
$id = isset($_REQUEST['id']) && checkUID($_REQUEST['id']) ? $_REQUEST['id'] : false;
$information = false;
$getTtitle = (isset($_POST['title'])) ? $_POST['title'] : '';
$getNumPrice = (isset($_POST['num_price'])) ? $_POST['num_price'] : '';


if ($id) {
    $information = $db->query("SELECT * FROM $thisTable WHERE id='$id'")->fetch_all(1);
    $information = ($information) ? $information[0] : false;

    $getTtitle = ($information['title']) ? $information['title'] : '';
    $getNumPrice = ($information['amount']) ? $information['amount'] : '';

}

if (isset($_POST['editPackage'])) {
    $title = (isset($_POST['title']) && $_POST['title'] != '') ? $_POST['title'] : '0';
    $numPrice = (isset($_POST['num_price']) && $_POST['num_price'] != '') ? $_POST['num_price'] : '0';
    $id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '0';

    if ($title && $numPrice) {

        $result = $db->query("UPDATE $thisTable SET title='$title',amount='$numPrice',update_time='$nowTime' WHERE id='$id'");

        if ($result) {
            $class = 'success';
            $content = $errorsBank[3];
        } else {
            $class = 'danger';
            $content = $errorsBank[4];
        }
    } else {

        $class = 'danger';
        $content = $errorsBank[5];
    }


    // set alert and redirect
    $isRedirect = ($class == 'success') ? true : false;
    setAlert($content, $class, $isRedirect, $idpage, 2);

}


// create packages
if (isset($_POST['registerPackage'])) {
    $title = (isset($_POST['title']) && $_POST['title'] != '') ? $_POST['title'] : false;
    $numPrice = (isset($_POST['num_price']) && $_POST['num_price'] != '') ? $_POST['num_price'] : '0';
    if ($title && $numPrice) {

        $result = $db->query("INSERT INTO $thisTable (title,amount,update_time) VALUES('$title','$numPrice','$nowTime')");

        if ($result) {
            $class = 'success';
            $content = $errorsBank[3];
        } else {
            $class = 'danger';
            $content = $errorsBank[4];
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
                    <label>عنوان تعرفه</label>
                    <input value="<?php echo $getTtitle; ?>" name="title"
                           type="text" class="form-control" placeholder="عنوان تعرفه را وارد کنید">
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label>مبلغ تعرفه(تومان)</label>
                    <input value="<?php echo $getNumPrice; ?>"
                           name="num_price"
                           type="number" class="form-control" placeholder="یک عدد وارد کنید">
                </div>
            </div>


            <input type="hidden" name="id" value="<?php echo $id; ?>">


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                <div class="text-center">
                    <?php if ($id) { ?>
                        <button type="submit" name="editPackage" class="btn btn-success">ویرایش</button>
                    <?php } else { ?>
                        <button type="submit" name="registerPackage" class="btn btn-success">ذخیره</button>
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