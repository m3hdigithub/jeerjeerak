<?php require_once '../config.php';
$idpage = "member";
$thisTable = $usersTable;
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
//            $thumbAddressBefore = (isset($userEdited['thumb']) && $userEdited['thumb'] != '') ? $uploadDirThumb . $userEdited['thumb'] : '';
//            $imageAddressBefore = (isset($userEdited['image']) && $userEdited['image'] != '') ? $uploadDirImage . $userEdited['image'] : '';
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

                $status = $userInfo['status'];
                $type = $userInfo['type'];
                $hesabNumber = $userInfo['hesab_number'];
                $credit = (!is_null($userInfo['credit']) && $userInfo['credit'] != 0) ? number_format($userInfo['credit']) . ' تومان' : 0;
                $moarefId = getField($thisTable,'id','username',$userInfo['moaref']);


                // $thumb = (isset($userInfo['thumb']) && $userInfo['thumb'] != '') ? $uploadDirThumb . $userInfo['thumb'] : $defaultImage;
                // $image = (isset($userInfo['image']) && $userInfo['image'] != '') ? $uploadDirImage . $userInfo['image'] : $defaultImage;
                ?>
                <tr>
                    <td>نوع کاربری</td>
                    <td>
                        <?php if ($type == 'visitor') { ?>
                            <span class="label label-info"><i class="fa fa-user"></i> کارمند</span>
                        <?php } else { ?>
                            <span class="label label-info"><i class="fa fa-user-secret"></i> کاربر</span>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td>نام جیرجیرکی</td>
                    <td><?php echo (checkEmptyVarBool($userInfo['username'])) ? $userInfo['username'] : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>معرف</td>
                    <td><?php echo (checkEmptyVarBool($userInfo['moaref'])) ? '<a href="member?id='.$moarefId.'">'.$userInfo['moaref'].'</a>' : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>موبایل</td>
                    <td><?php echo (checkEmptyVarBool($userInfo['mobile'])) ? $userInfo['mobile'] : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>میزان شارژ</td>
                    <td><?php echo $credit; ?></td>
                </tr>
                <tr>
                    <td>شماره حساب</td>
                    <td><?php echo (checkEmptyVarBool($userInfo['hesab_number'])) ? $userInfo['hesab_number'] : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>

                <!--<tr>
                    <td>تعداد آگهی ارسالی</td>
                    <td><?php /*echo getField($advertisingTable,'COUNT(*)','user_id',$userInfo['id']); */ ?></td>
                </tr>-->

                <tr>
                    <td>وضعیت تایید کاربر توسط مدیر</td>
                    <td><?php echo ($userInfo['status']) ? '<i class="fa fa-check-circle fa-2x"></i>' : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <!--<tr>
                    <td>پکیج دریافتی</td>
                    <td><?php /*echo getField($packagesTable, 'title', 'id', $userInfo['package_id']); */ ?></td>
                </tr>-->

                <tr>
                    <td>
                        تنظیمات
                    </td>

                    <td>
                        <?php if ($status == 1) { ?>
                            <div class="btn-group">
                                                                <span
                                                                        class="edit btn btn-xs btn-warning sLoadS-<?php echo $userInfo['id']; ?>"><i
                                                                            class="fa fa-refresh"></i></span>
                                <span class="edit btn btn-xs btn-success statusBtn"
                                      id="<?php echo $userInfo['id']; ?>">فعال شده</span>
                            </div>
                        <?php } else { ?>
                            <div class="btn-group">
                                                                <span
                                                                        class="btn btn-xs btn-warning sLoadS-<?php echo $userInfo['id']; ?>"><i
                                                                            class="fa fa-refresh"></i></span>
                                <span class="btn btn-xs btn-danger statusBtn"
                                      id="<?php echo $userInfo['id']; ?>">فعال نشده</span>
                            </div>
                        <?php } ?>

                        <div class="btn-group">
                                                            <span
                                                                    class="btn btn-xs btn-warning sLoadE-<?php echo $userInfo['id']; ?>"><i
                                                                        class="fa fa-refresh"></i></span>
                            <span datatype="" class="btn btn-xs btn-success editBtn"
                                  id="<?php echo $userInfo['id']; ?>">ویرایش</span>
                        </div>
                        <div class="btn-group">
                                                            <span
                                                                    class="btn btn-xs btn-warning sLoadD-<?php echo $userInfo['id']; ?>"><i
                                                                        class="fa fa-refresh"></i></span>
                            <span datatype="" class="btn btn-xs btn-danger delBtn"
                                  id="<?php echo $userInfo['id']; ?>">حذف</span>
                        </div>
                    </td>
                </tr>
                <!-- Modal -->
                <div id="showFullSizeImg" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><?php echo $userInfo['name'] . ' ' . $userInfo['family']; ?></h4>
                            </div>
                            <div class="modal-body">
                                <img width="100%" height="100%" src="<?php echo $image; ?>" alt="">
                            </div>
                        </div>

                    </div>
                </div>

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