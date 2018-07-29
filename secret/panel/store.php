<?php require_once '../config.php';
$idpage = "store";
$thisTable = $legalsTable;
$typeNum = 1;

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
    <div class="btn-group">
        <!--<a href="companyNew" class="btn btn-success">ایجاد فروشگاه جدید</a>-->
        <a href="?todayUsers" class="btn btn-default">
            <span class=""> تعداد فروشگاه های امروز </span>
            <span class="label label-danger"><?php echo getNotifications3($thisTable,'type',$typeNum,false); ?></span>
        </a>
        <a class="btn btn-primary" href="<?php echo $idpage . ''; ?>">
            <span class="">همه ی فروشگاه ها</span>
            <span class="label label-danger"><?php echo getField($thisTable, 'COUNT(*)','type',$typeNum); ?></span>

        </a>
    </div>
    <br><br>
    <?php if (getField($thisTable, 'COUNT(*)','type',$typeNum)) { ?>
        <div class="table-responsive">
            <div class="col-md-12">
                <form action="<?php echo $idpage; ?>" class="form-inline" method="post">
                    <div class="form-group col-md-9 pull-right">
                        <input type="text" class="form-control" name="search"
                               placeholder="جستجو بر اساس (عنوان، توضیحات، نام، تلفن، فکس، ایمیل)">
                    </div>
                    <button type="submit" class="btn btn-primary">جستجو</button>
                </form>
            </div>
            <br>

            <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                <tr>
                    <th>ردیف<i class="fa fa-sort"></i></th>
                    <th>عنوان</th>
                    <th>کاربر ثبت کننده</th>
                    <th>مدیریت</th>
                    <th>وضعیت</th>
                    <th>تاریخ ثبت</th>
                    <th>تنطیمات</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
                $start = ($page - 1) * $adminPerPage;
                $sql1 = "select * from $thisTable WHERE type='$typeNum'";
                $sql2 = "select * from $thisTable WHERE type='$typeNum' order by create_time desc limit 0,$adminPerPage";
                $sql3 = "select * from $thisTable WHERE type='$typeNum' order by create_time desc limit $start,$adminPerPage";
                $search = '1=1';

                if (isset($_POST['search']) && $_POST['search'] != '' && strlen($_POST['search']) > 0) {
                    $s = $_POST['search'];
                    $search = "title LIKE '%$s%' OR store_name LIKE '%$s%' OR address LIKE '%$s%' OR phone LIKE '%$s%' OR fax LIKE '%$s%' OR email LIKE '%$s%' OR description LIKE '%$s%'";
                    $sql1 = "select * from $thisTable WHERE type='$typeNum' AND $search";
                    $sql2 = "select * from $thisTable WHERE type='$typeNum' AND $search order by create_time desc limit 0,$adminPerPage";
                    $sql3 = "select * from $thisTable WHERE type='$typeNum' AND $search order by create_time desc limit $start,$adminPerPage";
                    echo $sql1;

                }
                if (isset($_GET['todayUsers'])) {
                    $sql1 = "select * from $thisTable WHERE type='$typeNum' AND DATE(create_time) = CURDATE()";
                    $sql2 = "select * from $thisTable WHERE type='$typeNum' AND DATE(create_time) = CURDATE() order by create_time desc limit 0,$adminPerPage";
                    $sql3 = "select * from $thisTable WHERE type='$typeNum' AND DATE(create_time) = CURDATE() order by create_time desc limit $start,$adminPerPage";
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
                $setup = $row['setup'];
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><a href="member?id=<?php echo $row['user_id']; ?>"><?php echo getField($usersTable, 'name', 'id', $row['user_id']) . ' ' . getField($usersTable, 'family', 'id', $row['user_id']); ?></a></td>
                    <td><?php echo $row['management_name']; ?></td>

                    <td>
                        <?php
                        $labelClass = 'danger';
                        switch ($setup) {
                            case 1:
                                $labelClass = 'success';
                                break;
                            case 2:
                                $labelClass = 'warning';
                                break;
                        }
                        ?>
                        <span class="label label-<?php echo $labelClass; ?>"><?php echo $setupType[$setup]; ?></span>
                    </td>


                    <td><?php echo getTimeLang($row['create_time']); ?></td>

                    <td>
                        <?php if ($status == 1) { ?>
                            <div class="btn-group">
                                                    <span
                                                        class="edit btn btn-xs btn-warning sLoadS-<?php echo $row['id']; ?>"><i
                                                            class="fa fa-refresh"></i></span>
                                <span class="edit btn btn-xs btn-success statusBtn"
                                      id="<?php echo $row['id']; ?>">لغو کردن</span>
                            </div>
                        <?php } else { ?>
                            <div class="btn-group">
                                                    <span
                                                        class="btn btn-xs btn-warning sLoadS-<?php echo $row['id']; ?>"><i
                                                            class="fa fa-refresh"></i></span>
                                <span class="btn btn-xs btn-danger statusBtn"
                                      id="<?php echo $row['id']; ?>">تایید کردن</span>
                            </div>
                        <?php } ?>
                        <div class="btn-group">
                        <span class="btn btn-xs btn-warning sLoadI-<?php echo $row['id']; ?>"><i
                                class="fa fa-refresh"></i></span>
                            <span datatype="" class="btn btn-xs btn-info infoBtn"
                                  id="<?php echo $row['id']; ?>">مشاهده</span>
                        </div>

                        <!--<div class="btn-group">
                        <span class="btn btn-xs btn-warning sLoadE-<?php /*echo $row['id']; */?>"><i
                                class="fa fa-refresh"></i></span>
                            <span datatype="" class="btn btn-xs btn-success editBtn"
                                  id="<?php /*echo $row['id']; */?>">ویرایش</span>
                        </div>-->
                        <div class="btn-group">
                        <span class="btn btn-xs btn-warning sLoadD-<?php echo $row['id']; ?>"><i
                                class="fa fa-refresh"></i></span>
                            <span datatype="" class="btn btn-xs btn-danger delBtn"
                                  id="<?php echo $row['id']; ?>">حذف</span>
                        </div>
                    </td>
                    <?php
                    }
                    $i++;
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
                    window.location.href = "<?php echo $idpage; ?>Detail?id=" + thisId+"&type=<?=$typeNum; ?>"
                }, 0);
            }
        });
    });

</script>
</body>
</html>