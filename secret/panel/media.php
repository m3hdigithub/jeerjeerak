<?php require_once '../config.php';
$idpage = "media";
$thisTable = $mediaTable;
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
            $thumbAddressBefore = (isset($userEdited['image']) && $userEdited['image'] != '') ? $uploadDirThumb.$userEdited['thumb'] : '';
            $imageAddressBefore = (isset($userEdited['image']) && $userEdited['image'] != '') ? $uploadDirImage.$userEdited['image'] : '';
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
    <div class="btn-group">
        <!--<a href="<?php /*echo $idpage . 'New'; */ ?>" class="btn btn-success">
            ایجاد کاربر جدید</a>-->
        <a href="?todayUsers" class="btn btn-default">
            <span class=""> تعداد رسانه های امروز </span>
            <span class="label label-danger"><?php echo getNotifications($thisTable); ?></span>
        </a>
        <a class="btn btn-primary" href="<?php echo $idpage . ''; ?>">
            <span class="">همه ی رسانه ها</span>
        </a>
    </div>
    <br><br>
    <div class="table-responsive">
        <!--<div class="col-md-12">
            <form action="<?php /*echo $idpage; */ ?>" class="form-inline" method="post">
                <div class="form-group col-md-9 pull-right">
                    <input type="text" class="form-control" name="search"
                           placeholder="جستجو بر اساس (نام جیرجیرکی، موبایل)">
                </div>
                <button type="submit" class="btn btn-primary">جستجو</button>
            </form>
        </div>
        <br>-->

        <table class="table table-bordered table-hover table-striped tablesorter">
            <thead>
            <tr>
                <th>ردیف<i class="fa fa-sort"></i></th>
                <th>عنوان آگهی</th>
                <!--                <th>پکیج دریافتی</th>-->
                <th>تصویر</th>
                <th>وضعیت</th>
                <th>تنطیمات</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
            $start = ($page - 1) * $adminPerPage;
            $sql1 = "select * from $thisTable";
            $sql2 = "select * from $thisTable order by create_time desc limit 0,$adminPerPage";
            $sql3 = "select * from $thisTable order by create_time desc limit $start,$adminPerPage";
            $search = '1=1';

            if (isset($_POST['search']) && $_POST['search'] != '' && strlen($_POST['search']) > 0) {
                $s = $_POST['search'];
                $search = "username LIKE '%$s%' OR mobile LIKE '%$s%'";
                $sql1 = "select * from $thisTable WHERE $search";
                $sql2 = "select * from $thisTable WHERE $search order by create_time desc limit 0,$adminPerPage";
                $sql3 = "select * from $thisTable WHERE $search order by create_time desc limit $start,$adminPerPage";
            }
            if (isset($_GET['todayUsers'])) {
                $sql1 = "select * from $thisTable WHERE DATE(create_time) = CURDATE()";
                $sql2 = "select * from $thisTable WHERE DATE(create_time) = CURDATE() order by create_time desc limit 0,$adminPerPage";
                $sql3 = "select * from $thisTable WHERE DATE(create_time) = CURDATE() order by create_time desc limit $start,$adminPerPage";
            }
            /************* start for pagination **************/
            $rowForPagination = $db->query($sql1)->num_rows;
            $numPages = ceil($rowForPagination / $adminPerPage);
            if ($page > $numPages) {
                $sql = $sql2;
                $page = 1;
            } else {
                $sql = $sql3;
            }
            /************* end for pagination **************/

            $res2 = $db->query($sql)->fetch_all(1);
            $res2 = ($res2) ? $res2 : false;
            if ($res2){
            $i = 1;
            foreach ($res2 as $ress => $row){
            $dvId = $row['adv_id'];
            $status = $row['status'];
            $image = (isset($row['media_name']) && $row['media_name'] != '') ? $uploadDirThumb . $row['media_name'] : $defaultImage;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td>
                    <a href="advertisingDetail?id=<?php echo $dvId; ?>"><?php echo getField($advertisingTable, 'title', 'id', $dvId); ?></a>
                </td>
                <td><img src="<?php echo $image; ?>" data-toggle="modal" data-target="#showFullSizeImg"
                         onclick="adImgToModal(this,'modal-image');"
                         class="imgThumbTable"
                         style='border: 1px solid #666666; padding: 2px; border-radius:100%; cursor: pointer; width: 50px; height: 50px;'></td>
                <td>
                    <?php if ($status == 1) { ?>
                        <div class="btn-group">
                            <span class="edit btn btn-xs btn-warning sLoadS-<?php echo $row['id']; ?>"><i
                                    class="fa fa-refresh"></i></span>
                            <span class="edit btn btn-xs btn-success statusBtn"
                                  id="<?php echo $row['id']; ?>">فعال شده</span>
                        </div>
                    <?php } else { ?>
                        <div class="btn-group">
                            <span class="btn btn-xs btn-warning sLoadS-<?php echo $row['id']; ?>"><i
                                    class="fa fa-refresh"></i></span>
                            <span class="btn btn-xs btn-danger statusBtn"
                                  id="<?php echo $row['id']; ?>">فعال نشده</span>
                        </div>
                    <?php } ?>

                </td>
                <td>
                    <!--<div class="btn-group">
                        <span class="btn btn-xs btn-warning sLoadI-<?php /*echo $row['id']; */
                    ?>"><i
                                class="fa fa-refresh"></i></span>
                        <span datatype="" class="btn btn-xs btn-info infoBtn"
                              id="<?php /*echo $row['id']; */
                    ?>">مشاهده</span>
                    </div>

                    <div class="btn-group">
                        <span class="btn btn-xs btn-warning sLoadE-<?php /*echo $row['id']; */
                    ?>"><i
                                class="fa fa-refresh"></i></span>
                        <span datatype="" class="btn btn-xs btn-success editBtn"
                              id="<?php /*echo $row['id']; */
                    ?>">ویرایش</span>
                    </div>-->
                    <div class="btn-group">
                        <span class="btn btn-xs btn-warning sLoadD-<?php echo $row['id']; ?>"><i
                                class="fa fa-refresh"></i></span>
                        <span datatype="" class="btn btn-xs btn-danger delBtn"
                              id="<?php echo $row['id']; ?>">حذف</span>
                    </div>
                </td>
                <?php
                $i++;
                }
                } else {
                    echo 'ggg';
                }
                ?>
            </tr>
            </tbody>
        </table>

        <!-- Modal -->
        <div id="showFullSizeImg" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">مشاهده رسانه</h4>
                    </div>
                    <div class="modal-body">
                        <img width="100%" height="100%" src="" id="modal-image">
                    </div>
                </div>

            </div>
        </div>


        <div class="text-center">
            <div class="pagination">
                <?php
                if ($page > 1) {
                    ?>
                    <a class="btn btn-default" href="?page=<?php echo 1; ?>"><i
                            class="fa fa-angle-double-right"></i></a>
                    <a class="btn btn-default"
                       href="?page=<?php echo $page - 1; ?>"><i class="fa fa-angle-right"></i></a>
                <?php }

                if ($numPages > 0) {
                    echo '<span class="num-page">';
                    echo 'صفحه ';
                    echo $page . ' از ' . $numPages;
                    echo '</span>';
                }
                if ($page < $numPages) {
                    ?>
                    <a class="btn btn-default"
                       href="?page=<?php echo $page + 1; ?>"><i class="fa fa-angle-left"></i></a>
                    <a class="btn btn-default"
                       href="?page=<?php echo $numPages; ?>"><i class="fa fa-angle-double-left"></i></a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</div>

</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->

<!-- JavaScript -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>


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
                    window.location.href = "<?php echo $idpage; ?>";
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
                    window.location.href = "<?php echo $idpage; ?>";
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
                    window.location.href = "<?php echo $idpage . 'New?id='; ?>" + thisId;
                }, 0);
            }
        });
    });

    // show info
    $('.infoBtn').click(function (e) {
        e.preventDefault();
        var thisId = $(this).attr('id');
        var url = "?info=" + thisId;
        $('.sLoadI-' + thisId).html('<i class="fa fa-refresh rotating"></i>');
        $.ajax({
            type: "POST",
            url: url,
            //data: $("#sterdadForm").serialize(),
            success: function (response) {
                $('.sLoadI-' + thisId).html('<i class="fa fa-check"></i>').fadeIn(500);
                setTimeout(function () {
                    window.location.href = "member?id=" + thisId;
                }, 0);
            }
        });
    });

    function adImgToModal(clickedElement, id) {
                            var imgSrc = clickedElement.src;
                            document.getElementById(id).src = imgSrc;
                        }


</script>
</body>
</html>