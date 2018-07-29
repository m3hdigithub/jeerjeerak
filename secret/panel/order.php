<?php require_once '../config.php';
$idpage = "order";
$thisTable = $ordersTable;
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
                $information = $information[0];

                $userInfoName = getField($usersTable, 'username', 'id', $information['user_id']);
                $packageInfoName = getField($packagesTable, 'title', 'id', $information['package_id']);
                $amount = tomanFormat($information['amount']);
                $paygiriNumber = checkEmptyVar($information['peygiri_number']);
                $description = checkEmptyVar($information['description']);
                $status = $information['status'];
                // $thumb = (isset($information['thumb']) && $information['thumb'] != '') ? $uploadDirThumb . $information['thumb'] : $defaultImage;
                // $image = (isset($information['image']) && $information['image'] != '') ? $uploadDirImage . $information['image'] : $defaultImage;
                ?>
                <tr>
                    <td>نام جیرجیرکی کاربر</td>
                    <td><a href="member?id=<?php echo $information['user_id']; ?>"><?php echo $userInfoName; ?></a></td>
                </tr>
                <tr>
                    <td>عنوان تعرفه</td>
                    <td>
                        <a href="package?id=<?php echo $information['package_id']; ?>"><?php echo $packageInfoName; ?></a>
                    </td>
                </tr>
                <tr>
                    <td>مبلغ</td>
                    <td><?php echo $amount; ?></td>
                </tr>
                <tr>
                    <td>شماره پیگیری</td>
                    <td><?php echo $paygiriNumber; ?></td>
                </tr>
                <tr>
                    <td>توضیحات</td>
                    <td><?php echo $description; ?></td>
                </tr>
                <tr>
                    <td>زمان ثبت تراکنش</td>
                    <td><?php echo getTimeLang($information['create_time']); ?></td>
                </tr>
                <tr>
                    <td>زمان پرداخت تراکنش</td>
                    <td><?php echo getTimeLang($information['pay_time']); ?></td>
                </tr>

                <!--<tr>
                    <td>تعداد آگهی ارسالی</td>
                    <td><?php /*echo getField($advertisingTable,'COUNT(*)','user_id',$information['id']); */ ?></td>
                </tr>-->

                <tr>
                    <td>وضعیت پرداخت</td>
                    <td><?php if ($status == 1) { ?>
                            <span class="label label-success">پرداخت شده</span>
                            <!--<div class="btn-group">
                                                                                    <span
                                                                                        class="edit btn btn-xs btn-warning sLoadS-<?php /*echo $information['id']; */ ?>"><i
                                                                                            class="fa fa-refresh"></i></span>
                                                    <span class="edit btn btn-xs btn-success statusBtn"
                                                          id="<?php /*echo $information['id']; */ ?>">فعال شده</span>
                                                </div>-->
                        <?php } else { ?>
                            <span class="label label-danger">پرداخت نشده</span>
                            <!--<div class="btn-group">
                                                                                    <span
                                                                                        class="btn btn-xs btn-warning sLoadS-<?php /*echo $information['id']; */ ?>"><i
                                                                                            class="fa fa-refresh"></i></span>
                                                    <span class="btn btn-xs btn-danger statusBtn"
                                                          id="<?php /*echo $information['id']; */ ?>">فعال نشده</span>
                                                </div>-->
                        <?php } ?></td>
                </tr>
                <!--<tr>
                    <td>پکیج دریافتی</td>
                    <td><?php /*echo getField($packagesTable, 'title', 'id', $information['package_id']); */ ?></td>
                </tr>-->

                <tr>
                    <td>
                        تنظیمات
                    </td>

                    <td>


                        <!--<div class="btn-group">
                                                            <span
                                                                class="btn btn-xs btn-warning sLoadE-<?php /*echo $information['id']; */ ?>"><i
                                                                    class="fa fa-refresh"></i></span>
                            <span datatype="" class="btn btn-xs btn-success editBtn"
                                  id="<?php /*echo $information['id']; */ ?>">ویرایش</span>
                        </div>-->
                        <div class="btn-group">
                                                            <span
                                                                class="btn btn-xs btn-warning sLoadD-<?php echo $information['id']; ?>"><i
                                                                    class="fa fa-refresh"></i></span>
                            <span datatype="" class="btn btn-xs btn-danger delBtn"
                                  id="<?php echo $information['id']; ?>">حذف</span>
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
                                <h4 class="modal-title"><?php echo $information['name'] . ' ' . $information['family']; ?></h4>
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