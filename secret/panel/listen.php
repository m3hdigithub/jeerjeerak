<?php require_once '../config.php';
$idpage = "listen";
$thisTable = $listenTable;
include("h.php");
if ($nametype != 1) {
    header("Location: admin");
}

// change status item
if (isset($_REQUEST['changeStatus'])) {
    $thisID = (checkUID($_REQUEST['changeStatus'])) ? $_REQUEST['changeStatus'] : false;
    if ($thisID) {
        $beforStatus = $db->query("SELECT status FROM $thisTable WHERE id='$thisID'")->fetch_all(1);
        $beforStatus = ($beforStatus) ? $beforStatus[0]['status'] : 'no';

        if ($beforStatus != 'no') {
            $chengingST = ($beforStatus == 0) ? 1 : 0;
            $updated = $db->query("UPDATE $thisTable SET status='$chengingST' WHERE id='$thisID'");
            if ($updated) {
                echo true;
            } else {
                echo false;
            }
        } else {
            echo false;
        }
    } else {
        echo false;
    }
    exit(0);
}

// delete item
if (isset($_REQUEST['delete'])) {
    $thisID = (checkUID($_REQUEST['delete'])) ? $_REQUEST['delete'] : false;
    if ($thisID) {
        $userEdited = $db->query("SELECT * FROM $thisTable WHERE id='$thisID'")->fetch_all(1)[0];
        $deleteItem = $db->query("DELETE FROM $thisTable WHERE id='$thisID'");
        if ($deleteItem) {
//            $thumbAddressBefore = (isset($userEdited['u_thumb']) && $userEdited['u_thumb'] != '') ? $userEdited['u_thumb'] : '';
//            $imageAddressBefore = (isset($userEdited['u_image']) && $userEdited['u_image'] != '') ? $userEdited['u_image'] : '';
//            @unlink($thumbAddressBefore); // delete before thumb
//            @unlink($imageAddressBefore); // delete before image
            echo true;
        } else {
            echo false;
        }
    } else {
        echo false;
    }
    exit(0);
}
?>
<div class="col-lg-12">
    <div class="text-center"><h2>جزئیات</h2></div>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped tablesorter">
            <tbody>
            <?php
            $getID = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : 0;
            $information = $db->query("select * from $thisTable WHERE id='$getID'")->fetch_all(1);
            if ($information) {
                $userInfo = $information[0];

                ?>


                <tr>
                    <td style="width: 20%;">نام و نام خانوادگی</td>
                    <td><?php echo getField($usersTable, 'name', 'id', $userInfo['user_id']) . ' ' . getField($usersTable, 'family', 'id', $userInfo['user_id']); ?></td>
                </tr>
                <tr>
                    <td>کمپانی</td>
                    <td><?php echo getField($companyTable, 'title', 'id', $userInfo['company_id']); ?></td>
                </tr>
                <tr>
                    <td>مدل</td>
                    <td><?php echo getField($companyTable, 'title', 'id', $userInfo['model_id']); ?></td>
                </tr>
                <tr>
                    <td>از سال</td>
                    <td><?php echo ($userInfo['from_year'] && $userInfo['from_year'] !='')?$userInfo['from_year']:'<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>تا سال</td>
                    <td><?php echo ($userInfo['to_year'] && $userInfo['to_year'] !='')?$userInfo['to_year']:'<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>از قیمت</td>
                    <td><?php echo ($userInfo['from_price'] && $userInfo['from_price'] !='')?number_format($userInfo['from_price']).' تومان':'<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>تا قیمت</td>
                    <td><?php echo ($userInfo['to_price'] && $userInfo['to_price'] !='')?number_format($userInfo['to_price']).' تومان':'<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>




                <tr>
                    <td>تاریخ ارسال</td>
                    <td><?php echo jdate('Y/m/d ساعت H:i:s', strtotime($userInfo['create_time'])); ?></td>
                </tr>

                <tr>
                    <td>
                        تنظیمات
                    </td>

                    <td>
                        <?php /*if ($status == 1) { */?><!--
                            <div class="btn-group">
                                                                <span
                                                                    class="edit btn btn-xs btn-warning sLoadS-<?php /*echo $userInfo['id']; */?>"><i
                                                                        class="fa fa-refresh"></i></span>
                                <span class="edit btn btn-xs btn-success statusBtn"
                                      id="<?php /*echo $userInfo['id']; */?>">فعال شده</span>
                            </div>
                        <?php /*} else { */?>
                            <div class="btn-group">
                                                                <span
                                                                    class="btn btn-xs btn-warning sLoadS-<?php /*echo $userInfo['id']; */?>"><i
                                                                        class="fa fa-refresh"></i></span>
                                <span class="btn btn-xs btn-danger statusBtn"
                                      id="<?php /*echo $userInfo['id']; */?>">فعال نشده</span>
                            </div>
                        --><?php /*} */?>

                        <!--<div class="btn-group">
                                                            <span
                                                                class="btn btn-xs btn-warning sLoadE-<?php /*echo $userInfo['id']; */?>"><i
                                                                    class="fa fa-refresh"></i></span>
                            <span datatype="" class="btn btn-xs btn-success editBtn"
                                  id="<?php /*echo $userInfo['id']; */?>">ویرایش</span>
                        </div>-->
                        <div class="btn-group">
                                                            <span
                                                                class="btn btn-xs btn-warning sLoadD-<?php echo $userInfo['id']; ?>"><i
                                                                    class="fa fa-refresh"></i></span>
                            <span datatype="" class="btn btn-xs btn-danger delBtn"
                                  id="<?php echo $userInfo['id']; ?>">حذف</span>
                        </div>
                    </td>
                </tr>


                <?php
            } else {
                echo '<tr><div class="alert alert-warning text-center">هیچ موردی وجود ندارد</div></tr>';
            }
            ?>

            </tbody>
        </table>
    </div>
</div>
</div>


</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->


<!-- JavaScript -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCweo5hnOiJcb97mJv5fqMXGQKoGXvGTcA&callback=initMap"
        type="text/javascript"></script>
<script>
    // change status
    $('.statusBtn').click(function (e) {
        e.preventDefault();
        var thisId = $(this).attr('id');
        var url = "?changeStatus=" + thisId;
        $('.sLoadS-' + thisId).html('<i class="fa fa-refresh rotating"></i>');
        $.ajax({
            type: "POST",
            url: url,
            //data: $("#sterdadForm").serialize(),
            success: function (response) {
                if (response) {
                    $('.sLoadS-' + thisId).html('<i class="fa fa-check"></i>').fadeIn(500);
                } else {
                    $('.sLoadS-' + thisId).html('<i class="fa fa-close"></i>').fadeIn(500);
                }
                setTimeout(function () {
                    window.location.href = "<?php echo $idpage . '?id=';?>" + thisId;
                }, 0);
            }
        });
    });

    // delete item
    $('.delBtn').click(function (e) {
        e.preventDefault();
        var thisId = $(this).attr('id');
        var url = "?delete=" + thisId;
        $('.sLoadD-' + thisId).html('<i class="fa fa-refresh rotating"></i>');
        $.ajax({
            type: "POST",
            url: url,
            //data: $("#sterdadForm").serialize(),
            success: function (response) {
                if (response) {
                    $('.sLoadD-' + thisId).html('<i class="fa fa-check"></i>').fadeIn(500);
                } else {
                    $('.sLoadD-' + thisId).html('<i class="fa fa-close"></i>').fadeIn(500);
                }
                setTimeout(function () {
                    window.location.href = "<?php echo $idpage . '?id=';?>" + thisId;
                }, 0);
            }
        });
    });
    // edit item
    $('.editBtn').click(function (e) {
        e.preventDefault();
        var thisId = $(this).attr('id');
        var url = "?edit=" + thisId;
        $('.sLoadE-' + thisId).html('<i class="fa fa-refresh rotating"></i>');
        $.ajax({
            type: "POST",
            url: url,
            //data: $("#sterdadForm").serialize(),
            success: function (response) {
                $('.sLoadE-' + thisId).html('<i class="fa fa-check"></i>').fadeIn(500);
                setTimeout(function () {
                    window.location.href = "<?php echo $idpage . 'sNew?id='; ?>" + thisId;
                }, 0);
            }
        });
    });

</script>
</body>
</html>