<?php require_once '../config.php';
$idpage = "checkCarsDetail";
$thisTable = $checkCarsTable;
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
            $imageAddressBefore = (isset($userEdited['image']) && $userEdited['image'] != '') ? $uploadDirImage . $userEdited['image'] : '';
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
                $video = (isset($info['video_link']) && $info['video_link'] != '') ? $info['video_link'] : $defaultImage;
                $image = (isset($info['image']) && $info['image'] != '') ? $uploadDirImage . $info['image'] : $defaultImage;

                ?>

                <tr>
                    <td>ویدئو</td>
                    <td>
                        <div class="videoThumbTable">
                            <div id="videoContent" style="opacity: 0;" data-toggle="modal"
                                 data-target="#showFullSizeVideo"
                                 onclick="adVideoToModal(this,'modal-video')"><?php echo $video; ?></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 20%;">تصویر</td>
                    <td>

                        <img src="<?php echo $image; ?>" data-toggle="modal" data-target="#showFullSizeImg"
                             onclick="adImgToModal(this,'modal-image');"
                             class="imgThumbTable">

                    </td>
                </tr>


                <tr>
                    <td>کمپانی</td>
                    <td><?php echo getField($companyTable, 'title', 'id', $info['company_id']); ?></td>
                </tr>
                <tr>
                    <td>مدل</td>
                    <td><?php echo getField($companyTable, 'title', 'id', $info['model_id']); ?></td>
                </tr>

                <tr>
                    <td>سال ساخت</td>
                    <td><?php echo ($info['year']) ? $info['year'] . ' - ' . getYear($info['year'], 'fa') : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>

                <tr>
                    <td>ویژگی ها</td>
                    <td><?php echo ($info['atributies']) ? $info['atributies'] : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>گیربکس</td>
                    <td><?php echo $gearboxType[$info['gearbox']]; ?></td>
                </tr>
                <tr>
                    <td>حجم موتور</td>
                    <td><?php echo ($info['engine_volume']) ? $info['engine_volume'] . ' cc' : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>دیفرانسیل</td>
                    <td><?php echo $differentialType[$info['differential']]; ?></td>
                </tr>
                <tr>
                    <td>سیلندر</td>
                    <td><?php echo ($info['cylinder']) ? $info['cylinder'] : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>تعداد سوپاپ</td>
                    <td><?php echo ($info['num_sopup']) ? $info['num_sopup'] : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>اسب بخار</td>
                    <td><?php echo ($info['horse_steam']) ? $info['horse_steam'] : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>horse_steam</td>
                    <td><?php echo ($info['torque']) ? $info['torque'] : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>گشتاور</td>
                    <td><?php echo ($info['length']) ? $info['length'] : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>طول</td>
                    <td><?php echo ($info['length']) ? $info['length'].' mm' : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>عرض</td>
                    <td><?php echo ($info['width']) ? $info['width'].' mm' : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>ارتفاع</td>
                    <td><?php echo ($info['height']) ? $info['height'].' mm' : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>وزن</td>
                    <td><?php echo ($info['weight']) ? $info['weight'].' kg' : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>سایز تایر</td>
                    <td><?php echo ($info['tire_size']) ? $info['tire_size'] : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>حداکثر سرعت</td>
                    <td><?php echo ($info['maximum_speed']) ? $info['maximum_speed'] : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>شتاب</td>
                    <td><?php echo ($info['acceleration']) ? $info['acceleration'] : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>سوخت</td>
                    <td><?php echo ($info['use_fuel']) ? $info['use_fuel'] : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>ظرفیت مخزن</td>
                    <td><?php echo ($info['fuel_tank']) ? $info['fuel_tank'] : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>استاندارد محیط زیست</td>
                    <td><?php echo ($info['environmental_standard']) ? $info['environmental_standard'] : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>کیسه های هوا</td>
                    <td><?php echo ($info['air_bags']) ? $info['air_bags'] : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>ترمز</td>
                    <td><?php echo ($info['breaks']) ? $info['breaks'] : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>صندلی</td>
                    <td><?php echo ($info['chair']) ? $info['chair'] : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>تهویه مطبوع</td>
                    <td><?php echo ($info['air_conditioning']) ? $info['air_conditioning'] : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>پنجره</td>
                    <td><?php echo ($info['window_lift']) ? $info['window_lift'] : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>آینه</td>
                    <td><?php echo ($info['mirror']) ? $info['mirror'] : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>چراغ</td>
                    <td><?php echo ($info['lamp']) ? $info['lamp'] : '<i class="fa fa-times-circle fa-2x">'; ?></td>
                </tr>
                <tr>
                    <td>متفرقه</td>
                    <td><?php echo ($info['other']) ? $info['other'] : '<i class="fa fa-times-circle fa-2x">'; ?></td>
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
                    <td>وضعیت</td>
                    <td>
                        <?php
                        $labelClass = 'danger';
                        switch ($status) {
                            case 1:
                                $labelClass = 'success';
                                break;
                            case 2:
                                $labelClass = 'warning';
                                break;
                        }
                        ?>
                        <span class="label label-<?php echo $labelClass; ?>"><?php echo $setupType[$status]; ?></span>
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
                                        onclick="document.getElementById('modal-video').pause();">&times;</button>
                                <h4 class="modal-title">نمایش ویدئو</h4>
                            </div>
                            <div class="modal-body">
                                <div style="width: 100%; height: 100%;" id="modal-video"></div>

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