<?php require_once '../config.php';
$idpage = "bodyStatus";
$thisTable = $bodyStatusTable;
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
    <div class="btn-group">
        <a href="<?php echo $idpage . 'New'; ?>" class="btn btn-success">
            ایجاد وضعیت جدید</a>
        <a href="?todayUsers" class="btn btn-default">
            <span class=""> تعداد وضعیت های امروز </span>
            <span class="label label-danger"><?php echo getNotifications($thisTable); ?></span>
        </a>
        <a class="btn btn-primary" href="<?php echo $idpage . ''; ?>">
            <span class="">همه ی وضعیت ها</span>
            <span class="label label-danger"><?php echo getField($thisTable, 'COUNT(*)'); ?></span>
        </a>
    </div>
    <br><br>
    <?php if (getField($thisTable, 'COUNT(*)')) { ?>

        <div class="table-responsive">

            <!--<div class="col-md-12">
            <form action="<?php /*echo $idpage; */ ?>" class="form-inline" method="post">
                <div class="form-group col-md-9 pull-right">
                    <input type="text" class="form-control" name="search"
                           placeholder="جستجو بر اساس ()">
                </div>
                <button type="submit" class="btn btn-primary">جستجو</button>
            </form>
        </div>-->
            <br>

            <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                <tr>
                    <th>ردیف<i class="fa fa-sort"></i></th>
                    <th>عنوان رنگ</th>
                    <!--<th>نمایش رنگ</th>
                    <th>کد رنگ</th>-->
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

                /*if (isset($_POST['search']) && $_POST['search'] != '' && strlen($_POST['search']) > 0) {
                    $s = $_POST['search'];
                    $search = "u_name LIKE '%$s%' OR u_family LIKE '%$s%' OR u_email LIKE '%$s%' OR u_mobile LIKE '%$s%' OR u_phone LIKE '%$s%' OR u_username LIKE '%$s%' OR u_national_code LIKE '%$s%'";
                    $sql1 = "select * from $thisTable WHERE $search";
                    $sql2 = "select * from $thisTable WHERE $search order by create_time desc limit 0,$adminPerPage";
                    $sql3 = "select * from $thisTable WHERE $search order by create_time desc limit $start,$adminPerPage";
                }*/
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
                $status = $row['status'];

                ?>
                <tr>
                    <td><?php echo $i; ?></td>

                    <td><?php echo $row['title']; ?></td>
                    <!--<td class="text-center"><div style="width: 30px; height: 30px; background: <?php /*echo '#'.$row['code']; */
                    ?>;"></div></td>
                <td style="direction: ltr;"><?php /*echo '#'.$row['code']; */
                    ?></td>-->

                    <td>
                        <?php if ($status == 1) { ?>
                            <div class="btn-group">
                            <span class="edit btn btn-xs btn-warning sLoadS-<?php echo $row['id']; ?>"><i
                                    class="fa fa-refresh"></i></span>
                                <span class="edit btn btn-xs btn-success statusBtn"
                                      id="<?php echo $row['id']; ?>">در حال نمایش</span>
                            </div>
                        <?php } else { ?>
                            <div class="btn-group">
                            <span class="btn btn-xs btn-warning sLoadS-<?php echo $row['id']; ?>"><i
                                    class="fa fa-refresh"></i></span>
                                <span class="btn btn-xs btn-danger statusBtn"
                                      id="<?php echo $row['id']; ?>">عدم نمایش</span>
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
                    </div>-->

                        <div class="btn-group">
                        <span class="btn btn-xs btn-warning sLoadE-<?php echo $row['id']; ?>"><i
                                class="fa fa-refresh"></i></span>
                            <span datatype="" class="btn btn-xs btn-success editBtn"
                                  id="<?php echo $row['id']; ?>">ویرایش</span>
                        </div>
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
                    }
                    ?>
                </tr>
                </tbody>
            </table>
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
    <?php } else {
        echo '<tr><div class="alert alert-danger text-center">هیچ موردی وجود ندارد</div></tr>';
    } ?>
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
                    window.location.href = "colors?id=" + thisId;
                }, 0);
            }
        });
    });

</script>
</body>
</html>