<?php require_once '../config.php';
$idpage = "advertisingDetail";
$thisTable = $advertisingTable;
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
            $db->query("UPDATE $thisTable SET setup='$chengingST' WHERE id='$thisID'");

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
            $thumbAddressBefore = (isset($userEdited['thumb']) && $userEdited['thumb'] != '') ? $uploadDirThumb . $userEdited['thumb'] : '';
            $imageAddressBefore = (isset($userEdited['image']) && $userEdited['image'] != '') ? $uploadDirImage . $userEdited['image'] : '';
            @unlink($thumbAddressBefore); // delete before thumb
            @unlink($imageAddressBefore); // delete before image
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
            $getID = (isset($_REQUEST['id']) && checkUID($_REQUEST['id'])) ? $_REQUEST['id'] : false;
            $information = $db->query("select * from $thisTable WHERE id='$getID'")->fetch_all(1);
            if ($information) {
                $info = $information[0];
                $status = $info['status'];
                $chance = $info['chance'];

                $selectAttrId = (checkEmptyVarBool($info['select_attr_id'])) ? explode('-', $info['select_attr_id']) : false;
                $selectAttrId = getAttrSelectOrCheck('select', $selectAttrId);


                $checkAttrId = (checkEmptyVarBool($info['check_attr_id'])) ? explode('-', $info['check_attr_id']) : false;
                $checkAttrId = getAttrSelectOrCheck('check', $checkAttrId);



                $userInfoName = getField($usersTable, 'username', 'id', $info['user_id']);
                $catInfo = getField($categoryTable, 'title', 'id', $info['cat_id']) . ' / ' . getField($categoryTable, 'title', 'id', $info['sub_cat_id']);
                $cityInfo = getField($cityTable, 'title', 'id', $info['city']) . ' / ' . getField($cityTable, 'title', 'id', $info['state']);

                $advId = $info['id'];
                $allImages = $db->query("SELECT id,media_name FROM $mediaTable WHERE adv_id='$advId' AND type='image'")->fetch_all(1);

                //$video = (isset($info['video']) && $info['video'] != '') ? $uploadDirVideo . $info['video'] : $defaultImage;


                ?>
                <tr>
                    <td style="width: 20%;">تصاویر</td>
                    <td>
                        <?php if ($allImages) {
                            foreach ($allImages as $images => $image) {
                                $image = checkEmptyImage($image['media_name'], $uploadDirImage, $defaultImage);
                                ?>
                                <img src="<?php echo $image; ?>" data-toggle="modal" data-target="#showFullSizeImg"
                                     onclick="adImgToModal(this,'modal-image');"
                                     class="imgThumbTable">
                            <?php }
                        } else {
                            echo '<i class="fa fa-times-circle fa-2x"></i>';
                        } ?>
                    </td>
                </tr>
                <!--<tr>
                    <td>ویدئو</td>
                    <td>
                        <video data-toggle="modal" data-target="#showFullSizeVideo" class="imgThumbTable"
                               poster="../assets/images/site-statics/bolt.gif"
                               onclick="adVideoToModal(this,'modal-video');">
                            <source src="<?php /*echo $video; */ ?>" type="video/mp4">
                        </video>
                    </td>
                </tr>-->
                <tr>
                    <td>نوع آگهی</td>
                    <td><?php echo (in_array($info['type'], array_keys($typeAdvertising))) ? $typeAdvertising[$info['type']] : '-'; ?></td>
                </tr>
                <tr>
                    <td>عنوان</td>
                    <td><?php echo checkEmptyVar($info['title']); ?></td>
                </tr>
                <tr>
                    <td>توضیحات</td>
                    <td><?php echo checkEmptyVar($info['description']); ?></td>
                </tr>
                <tr>
                    <td>نام جیرجیرکی کاربر</td>
                    <td><a href="member?id=<?php echo $info['user_id']; ?>"><?php echo $userInfoName; ?></a></td>
                </tr>
                <tr>
                    <td>دسته بندی / زیر دسته</td>
                    <td><?php echo $catInfo; ?></td>
                </tr>
                <tr>
                    <td>شهر / محله</td>
                    <td><?php echo $cityInfo; ?></td>
                </tr>

                <tr>
                    <td>ویژگی های آبشاری</td>
                    <td><?php echo ($selectAttrId) ? $selectAttrId : 'ندارد'; ?></td>
                </tr>

                <tr>
                    <td>ویژگی های چک باکسی</td>
                    <td><?php echo ($checkAttrId) ? $checkAttrId : 'ندارد'; ?></td>
                </tr>


                <tr>
                    <td>میزان شانس</td>
                    <td><?php echo checkEmptyVar($chance); ?></td>
                </tr>
                <tr>
                    <td>بازدید کل</td>
                    <td><?php echo getField($visitTable, 'COUNT(*)', 'adv_id', $getID); ?></td>
                </tr>

                <tr>
                    <td>تاریخ ثبت</td>
                    <td><?php echo getTimeLang($info['create_time']); ?></td>
                </tr>
                <tr>
                    <td>تاریخ آخرین به روز رسانی</td>
                    <td><?php echo getTimeLang($info['update_time']); ?></td>
                </tr>
                <tr>
                    <td>تاریخ منقضی شدن</td>
                    <td><?php echo jdate("Y/m/d ساعت H:i:s", strtotime($info['create_time']) + $loseAdvertising);
                        //echo getTimeAgo($info['create_time']);
                        ?></td>
                </tr>
                <tr>
                    <td>وضعیت آگهی</td>
                    <td>
                        <?php
                        if ($status) {
                            $labelClass = 'success';
                            $contentStatus = 'تایید شده / درحال نمایش';
                        } else {
                            $labelClass = 'danger';
                            $contentStatus = 'تایید نشده / عدم نمایش';
                        }
                        ?>
                        <span class="label label-<?php echo $labelClass; ?>"><?php echo $contentStatus; ?></span>
                    </td>
                </tr>


                <tr>
                    <td>
                        تنظیمات
                    </td>

                    <td>
                        <?php if ($status == 1) { ?>
                            <div class="btn-group">
                                                                        <span
                                                                                class="edit btn btn-xs btn-warning sLoadS-<?php echo $info['id']; ?>"><i
                                                                                    class="fa fa-refresh"></i></span>
                                <span class="edit btn btn-xs btn-success statusBtn"
                                      id="<?php echo $info['id']; ?>">لغو کردن</span>
                            </div>
                        <?php } else { ?>
                            <div class="btn-group">
                                                                        <span
                                                                                class="btn btn-xs btn-warning sLoadS-<?php echo $info['id']; ?>"><i
                                                                                    class="fa fa-refresh"></i></span>
                                <span class="btn btn-xs btn-danger statusBtn"
                                      id="<?php echo $info['id']; ?>">تایید کردن</span>
                            </div>
                        <?php } ?>
                        <!--<div class="btn-group">
                                            <span class="btn btn-xs btn-warning sLoadI-<?php /*echo $info['id']; */ ?>"><i
                                                    class="fa fa-refresh"></i></span>
                            <span datatype="" class="btn btn-xs btn-info infoBtn"
                                  id="<?php /*echo $info['id']; */ ?>">مشاهده</span>
                        </div>-->

                        <!--<div class="btn-group">
                                            <span class="btn btn-xs btn-warning sLoadE-<?php /*echo $info['id']; */ ?>"><i
                                                    class="fa fa-refresh"></i></span>
                                                <span datatype="" class="btn btn-xs btn-success editBtn"
                                                      id="<?php /*echo $info['id']; */ ?>">ویرایش</span>
                                            </div>-->
                        <div class="btn-group">
                                            <span class="btn btn-xs btn-warning sLoadD-<?php echo $info['id']; ?>"><i
                                                        class="fa fa-refresh"></i></span>
                            <span datatype="" class="btn btn-xs btn-danger delBtn"
                                  id="<?php echo $info['id']; ?>">حذف</span>
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
                                <h4 class="modal-title">مشاهده عکس</h4>
                            </div>
                            <div class="modal-body">
                                <img width="100%" height="100%" src="" id="modal-image">
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Modal video-->
                <div id="showFullSizeVideo" class="modal fade" role="dialog"
                     onclick="document.getElementById('modal-video').pause();">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <button type="button" class="close" data-dismiss="modal"
                                        onclick="document.getElementById('modal-video').pause();">&times;
                                </button>
                                <h4 class="modal-title">نمایش ویدئو</h4>
                            </div>
                            <div class="modal-body">

                                <video style="width: 100%; height: 100%;" id="modal-video"
                                       poster="../assets/images/site-statics/bolt.gif" controls autoplay>
                                </video>

                            </div>
                        </div>

                    </div>
                </div>


                <script>

                    function adImgToModal(clickedElement, id) {
                        var imgSrc = clickedElement.src;
                        document.getElementById(id).src = imgSrc;
                    }

                    function adVideoToModal(clickedElementID, id) {
                        var videoSrc = $(clickedElementID).html();
                        $('#' + id).html(videoSrc);
                        document.getElementById(id).play();
                    }

                </script>

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