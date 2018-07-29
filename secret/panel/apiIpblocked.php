<?php
require_once '../config.php';
$idpage = "apiIpBlocked";
$thisTable = $apiLoginBlockTable;
include("h.php");
if ($nametype != 1) {
    header("Location: admin");
}
// change status item
if (isset($_REQUEST['changeStatus'])) {
    $thisID = (checkUID($_REQUEST['changeStatus'])) ? $_REQUEST['changeStatus'] : false;
    if ($thisID) {
        $ip = getField($thisTable, 'ip', 'id', $thisID);
        $beforStatus = $db->query("SELECT num_login FROM $thisTable WHERE ip='$ip'")->fetch_all(1);
        $beforStatus = ($beforStatus) ? $beforStatus[0]['num_login'] : 'no';

        if ($beforStatus != 'no') {
            $chengingST = ($beforStatus < $apiLAllowedNum) ? $apiLAllowedNum : 0;
            $updated = $db->query("UPDATE $thisTable SET num_login='$chengingST' WHERE ip='$ip'");
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
/*if (isset($_REQUEST['delete'])) {
    $thisID = (checkUID($_REQUEST['delete'])) ? $_REQUEST['delete'] : false;
    if ($thisID) {
        $userEdited = $db->query("SELECT * FROM $thisTable WHERE id='$thisID'")->fetch_all(1)[0];
        $deleteItem = $db->query("DELETE FROM $thisTable WHERE id='$thisID'");
        if ($deleteItem) {
            $thumbAddressBefore = (isset($userEdited['u_thumb']) && $userEdited['u_thumb'] != '') ? $userEdited['u_thumb'] : '';
            $imageAddressBefore = (isset($userEdited['u_image']) && $userEdited['u_image'] != '') ? $userEdited['u_image'] : '';
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
}*/



$allBlockedID = $db->query("SELECT * FROM $thisTable WHERE num_login >= '$apiLAllowedNum'")->fetch_all(1);

$isBlokedIP = array();
if ($allBlockedID){
    $numBlockeds = 0;
    foreach ($allBlockedID as $bloked => $block){
        if(!isNotBlockApi($block['ip'])){
            $isBlokedIP[] = $block['id'];
            $numBlockeds++;
        }
    }
}
?>

<div class="col-lg-12">
    <div class="alert alert-info text-center">در این قسمت لیست آی پی هایی (ip) قرار می گیرد که در صدد دسترسی غیر مجاز به
        وب سرویس را داشته اند و به صورت خودکار توسط سیستم بلاک شده اند.
    </div>
    <?php if ($allBlockedID && $numBlockeds){ ?>
    <div class="btn-group">
        <a href="?todayUsers" class="btn btn-default">
            <span class=""> تعداد بلاک شده های امروز </span>
            <span class="label label-danger"><?php echo getNotificationsNumLogin($thisTable); ?></span>
        </a>
        <a class="btn btn-primary" href="<?php echo $idpage; ?>">
            <span class="">همه ی بلاک شده ها</span>
        </a>

    </div>
    <br><br>
    <div class="table-responsive">
        <div class="col-md-12">
            <form action="<?php echo $idpage; ?>" class="form-inline" method="post">
                <div class="form-group col-md-9 pull-right">
                    <input type="text" class="form-control" name="search"
                           placeholder="جستجو بر اساس ip">
                </div>
                <button type="submit" class="btn btn-primary">جستجو</button>
            </form>
        </div>
        <br>


        <table class="table table-bordered table-hover table-striped tablesorter">
            <thead>
            <tr>
                <th>ردیف<i class="fa fa-sort"></i></th>
                <th>آدرس ip</th>
                <th>رفع بلاک</th>
                <th>تاریخ و زمان بلاک</th>
                <th>تاریخ و زمان رفع بلاک</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
            $start = ($page - 1) * $adminPerPage;
            $sql1 = "select * from $thisTable WHERE num_login >= '$apiLAllowedNum'";
            $sql2 = "select * from $thisTable WHERE num_login >= '$apiLAllowedNum' order by date_time desc limit 0,$adminPerPage";
            $sql3 = "select * from $thisTable WHERE num_login >= '$apiLAllowedNum' order by date_time desc limit $start,$adminPerPage";
            $search = '1=1';

            if (isset($_POST['search']) && $_POST['search'] != '' && strlen($_POST['search']) > 0) {
                $s = $_POST['search'];
                $search = "ip LIKE '%$s%'";
                $sql1 = "select * from $thisTable WHERE $search AND num_login >= '$apiLAllowedNum'";
                $sql2 = "select * from $thisTable WHERE $search AND num_login >= '$apiLAllowedNum' order by date_time desc limit 0,$adminPerPage";
                $sql3 = "select * from $thisTable WHERE $search AND num_login >= '$apiLAllowedNum' order by date_time desc limit $start,$adminPerPage";
            }
            if (isset($_GET['todayUsers'])) {
                $sql1 = "select * from $thisTable WHERE DATE(date_time) = CURDATE() AND num_login >= '$apiLAllowedNum'";
                $sql2 = "select * from $thisTable WHERE DATE(date_time) = CURDATE() AND num_login >= '$apiLAllowedNum' order by date_time desc limit 0,$adminPerPage";
                $sql3 = "select * from $thisTable WHERE DATE(date_time) = CURDATE() AND num_login >= '$apiLAllowedNum' order by date_time desc limit $start,$adminPerPage";
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


            /*$imgName = (isset($row['u_image']) && $row['u_image'] != '') ? $row['u_image'] : 'no-image.png';
            $status = $row['u_status'];
            $sex = 'ثبت نشده';
            if ($row['u_sex'] == '1') {
                $sex = 'آقا';
            } elseif ($row['u_sex'] == '2') {
                $sex = 'خانم';
            }*/

            //            $imageShowT = (isset($row['u_thumb']) && $row['u_thumb'] != '') ? $row['u_thumb'] : $defaultImage;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <!--  <td><img src='<?php /*echo $imageShowT; */
                ?>' width='40' height='40'
                         style='border: 1px solid #666666; padding: 2px; border-radius:100%;'></td>-->
                <td><?php echo $row['ip']; ?></td>
                <!--                <td>--><?php //echo $row['u_name'] . ' ' . $row['u_family'];
                ?><!--</td>-->
                <!--<td><?php /*echo $sex; */
                ?></td>-->
                <td>
                    <?php /*if ($status == 1) { */
                    ?><!--
                        <div class="btn-group">
                            <span class="edit btn btn-xs btn-warning sLoadS-<?php /*echo $row['id']; */
                    ?>"><i
                                    class="fa fa-refresh"></i></span>
                            <span class="edit btn btn-xs btn-success statusBtn"
                                  id="<?php /*echo $row['id']; */
                    ?>">تایید شده</span>
                        </div>
                    <?php /*} else { */
                    ?>
                        <div class="btn-group">
                            <span class="btn btn-xs btn-warning sLoadS-<?php /*echo $row['id']; */
                    ?>"><i
                                    class="fa fa-refresh"></i></span>
                            <span class="btn btn-xs btn-danger statusBtn"
                                  id="<?php /*echo $row['id']; */
                    ?>">تایید نشده</span>
                        </div>
                    --><?php /*} */
                    ?>

                    <div class="btn-group">
                                                <span
                                                    class="edit btn btn-xs btn-warning sLoadS-<?php echo $row['id']; ?>"><i
                                                        class="fa fa-refresh"></i></span>
                        <span class="edit btn btn-xs btn-danger statusBtn"
                              id="<?php echo $row['id']; ?>">رفع بلاک</span>
                    </div>

                </td>
                <td><?php echo jdate('Y/m/d ساعت H:i:s', strtotime($row['date_time'])); ?></td>
                <td><?php echo apiUnblokingDate($row['ip'], false); ?></td>
                <!--<td>
                    <div class="btn-group">
                        <span class="btn btn-xs btn-warning sLoadI-<?php /*echo $row['id']; */
                ?>"><i
                                class="fa fa-refresh"></i></span>
                        <span datatype="" class="btn btn-xs btn-info infoBtn"
                              id="<?php /*echo $row['id']; */
                ?>">مشاهده اطلاعات کاربر</span>
                    </div>

                    <div class="btn-group">
                        <span class="btn btn-xs btn-warning sLoadE-<?php /*echo $row['id']; */
                ?>"><i
                                class="fa fa-refresh"></i></span>
                        <span datatype="" class="btn btn-xs btn-success editBtn"
                              id="<?php /*echo $row['id']; */
                ?>">ویرایش</span>
                    </div>
                    <div class="btn-group">
                        <span class="btn btn-xs btn-warning sLoadD-<?php /*echo $row['id']; */
                ?>"><i
                                class="fa fa-refresh"></i></span>
                        <span datatype="" class="btn btn-xs btn-danger delBtn"
                              id="<?php /*echo $row['id']; */
                ?>">حذف</span>
                    </div>
                </td>-->

                <?php
                }
                }
                ?>
            </tr>
            </tbody>
        </table>


        <div class="text-center">
            <div class="pagination center">
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
        <?php } else {
            echo '<div class="alert alert-warning text-center">هیچ موردی وجود ندارد</div>';
        } ?>
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
                    window.location.href = "<?php echo $idpage; ?>Edit?id=" + thisId;
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
                    window.location.href = "customer?id=" + thisId;
                }, 0);
            }
        });
    });

</script>


</body>
</html>