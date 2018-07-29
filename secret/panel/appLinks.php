<?php require_once '../config.php';
$idpage = "appLinks";
$thisTable = $appLinksTable;
include("h.php");

if ($nametype != 1) {
    header("location:admin");
}
$edirectJS = "<script type='text/javascript'>setTimeout(function () {window.location = '" . $idpage . "';}, 2000);</script>";

$information = $db->query("SELECT * FROM $thisTable")->fetch_all(1);
$information = ($information) ? $information[0] : false;


$getApple = ($information != false && $information['apple_store'] != '') ? $information['apple_store'] : '';
$getGoogle = ($information != false && $information['google_play'] != '') ? $information['google_play'] : '';
$getSib = ($information != false && $information['sib_app'] != '') ? $information['sib_app'] : '';
$getBazar = ($information != false && $information['bazar_app'] != '') ? $information['bazar_app'] : '';
$getDirectApple = ($information != false && $information['direct_app_apple'] != '') ? $information['direct_app_apple'] : '';
$getDirectAndroid = ($information != false && $information['direct_app_android'] != '') ? $information['direct_app_android'] : '';

if (isset($_POST['regUsers'])) {
    $apple = (isset($_POST['apple']) && $_POST['apple'] != '') ? $_POST['apple'] : '';
    $google = (isset($_POST['google']) && $_POST['google'] != '') ? $_POST['google'] : '';
    $sibapp = (isset($_POST['sibapp']) && $_POST['sibapp'] != '') ? $_POST['sibapp'] : '';
    $bazar = (isset($_POST['bazar']) && $_POST['bazar'] != '') ? $_POST['bazar'] : '';
    $directApple = (isset($_POST['directApple']) && $_POST['directApple'] != '') ? $_POST['directApple'] : '';
    $directAndroid = (isset($_POST['directAndroid']) && $_POST['directAndroid'] != '') ? $_POST['directAndroid'] : '';

    if ($information != false) {
        $sql = "UPDATE $thisTable SET apple_store='$apple',google_play='$google',sib_app='$sibapp',bazar_app='$bazar',direct_app_apple='$directApple',direct_app_android='$directAndroid'";
    } else {
        $sql = "INSERT INTO $thisTable (apple_store,google_play,sib_app,bazar_app,direct_app_apple,direct_app_android) VALUES('$apple','$google','$sibapp','$bazar','$directApple','$directAndroid')";
    }
    $result = $db->query($sql);
    if ($result) {
        echo '          <div class="col-lg-12">
                               <div class="alert alert-dismissable alert-success">
                            
                                 <button type="button" class="close" data-dismiss="alert">&times;</button>
اطلاعات با موفقیت به روز رسانی شد
                               </div>
                             </div>';
        echo $edirectJS;
    } else {
        echo '          <div class="col-lg-12">
                               <div class="alert alert-dismissable alert-danger">
                                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                                عملیات به روز رسانی اطلاعات با خطا مواجه شد!
                               </div>
                             </div>';
    }
} ?>

<div class="row">
    <div class="col-lg-12">
        <form action="" method="post" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label>فروشگاه اپل</label>
                <input value="<?php echo $getApple; ?>" name="apple" type="text" class="form-control"
                       placeholder="لینک اپلیکیشن در فروشگاه اپل را وارد کنید">
            </div>
            <div class="form-group">
                <label>فروشگاه گوگل</label>
                <input value="<?php echo $getGoogle; ?>" name="google" type="text" class="form-control"
                       placeholder="لینک اپلیکیشن در فروشگاه گوگل را وارد کنید">
            </div>
            <div class="form-group">
                <label>سیب اپ</label>
                <input value="<?php echo $getSib; ?>" name="sibapp" type="text" class="form-control"
                       placeholder="لینک اپلیکیشن در سیب اپ را وارد کنید">
            </div>
            <div class="form-group">
                <label>بازار</label>
                <input value="<?php echo $getBazar; ?>" name="bazar" type="text" class="form-control"
                       placeholder="لینک اپلیکیشن در بازار را وارد کنید">
            </div>
            <div class="form-group">
                <label>دانلود مستقیم(نسخه ios)</label>
                <input value="<?php echo $getDirectApple; ?>" name="directApple" type="text" class="form-control"
                       placeholder="لینک اپلیکیشن ios در هاست خود را وارد کنید">
            </div>
            <div class="form-group">
                <label>دانلود مستقیم(نسخه android)</label>
                <input value="<?php echo $getDirectAndroid; ?>" name="directAndroid" type="text" class="form-control"
                       placeholder="لینک اپلیکیشن android در هاست خود را وارد کنید">
            </div>

            <br><br>
            <div class="text-center">
                <button type="submit" name="regUsers" class="btn btn-success">به روز رسانی</button>
                <button type="reset" class="btn btn-default">بازنشانی فرم</button>
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