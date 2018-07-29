<?php require_once '../config.php';
$idpage = "user";
$thisTable = $adminTable;
include("h.php");
if ($nametype != 1) {
    header("Location: admin");
}

// change status item
/*if (isset($_REQUEST['changeStatus'])) {
    $thisID = (checkUID($_REQUEST['changeStatus'])) ? $_REQUEST['changeStatus'] : false;
    if ($thisID) {
        $beforStatus = $db->query("SELECT u_status FROM $thisTable WHERE id='$thisID'")->fetch_all(1);
        $beforStatus = ($beforStatus) ? $beforStatus[0]['u_status'] : 'no';

        if ($beforStatus != 'no') {
            $chengingST = ($beforStatus == 0) ? 1 : 0;
            $updated = $db->query("UPDATE $thisTable SET u_status='$chengingST' WHERE id='$thisID'");
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
}*/

// delete item
if (isset($_REQUEST['delete'])) {
    $thisID = (checkUID($_REQUEST['delete'])) ? $_REQUEST['delete'] : false;
    if ($thisID) {
//        $userEdited = $db->query("SELECT * FROM $thisTable WHERE id='$thisID'")->fetch_all(1)[0];
        $deleteItem = $db->query("DELETE FROM $thisTable WHERE user_id='$thisID'");
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
        <a href="<?php echo $idpage . 'new'; ?>" class="btn btn-success">
            ایجاد مدیر جدید</a>
        <a class="btn btn-primary" href="<?php echo $idpage; ?>">
            <span class="">همه ی مدیران</span>
        </a>

    </div>
    <br><br>
    <div class="table-responsive">

        <?php
        /*if (isset($_REQUEST['delete'])) {
            $valdel = $_REQUEST['delete'];


            $f = __DIR__;
            $dirFile = str_replace($panelName, '', $f);
            $imgNameForDelete = (isset($_REQUEST['file'])) ? $_REQUEST['file'] : '';
            $new = substr($imgNameForDelete, 0, strlen($imgNameForDelete));
            //$path = $dirFile .'/'.$basePathImagesFolders . $new;  #linux
            $basePathImagesFolders = '/' . $basePathImagesFolders;
            $path = $dirFile . str_replace('/', '\\', $basePathImagesFolders) . $new; #windows


            mysql_query("DELETE FROM $thisTable WHERE id = '$valdel'");
            @unlink($path);
        }*/ ?>


        <div class="col-md-12">
            <form action="<?php echo $idpage; ?>" class="form-inline" method="post">
                <div class="form-group col-md-9 pull-right">
                    <input type="text" class="form-control" name="search"
                           placeholder="جستجو بر اساس (نام، نام کاربری، ایمیل)">
                </div>
                <button type="submit" class="btn btn-primary">جستجو</button>
            </form>
        </div>
        <br>

        <table class="table table-bordered table-hover table-striped tablesorter">
            <thead>
            <tr>
                <th>ردیف<i class="fa fa-sort"></i></th>
                <th>نام</th>
                <th>مسولیت</th>
                <th>نام کاربری<i class="fa fa-sort"></i></th>
                <th>ایمیل<i class="fa fa-sort"></i></th>
                <th>تنظیمات</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
            $start = ($page - 1) * $adminPerPage;
            $sql1 = "select * from $thisTable";
            $sql2 = "select * from $thisTable";
            $sql3 = "select * from $thisTable";
            $search = '1=1';

            if (isset($_POST['search']) && $_POST['search'] != '' && strlen($_POST['search']) > 0) {
                $s = $_POST['search'];
                $search = "user_display LIKE '%$s%' OR user_username LIKE '%$s%' OR user_email LIKE '%$s%'";
                $sql1 = "select * from $thisTable WHERE $search";
                $sql2 = "select * from $thisTable WHERE $search";
                $sql3 = "select * from $thisTable WHERE $search";
            }
            if (isset($_GET['todayUsers'])) {
                $sql1 = "select * from $thisTable WHERE DATE(date_time) = CURDATE()";
                $sql2 = "select * from $thisTable WHERE DATE(date_time) = CURDATE()";
                $sql3 = "select * from $thisTable WHERE DATE(date_time) = CURDATE()";
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
            if ($row["user_type"] == 1) {
                $masol = "مدیر";
            } elseif ($row["user_type"] == 2) {
                $masol = "سردبیر";
            } elseif ($row["user_type"] == 3) {
                $masol = "نویسنده";
            }

            ?>
            <tr>
                <td><?php echo $i; ?></td>

                <td><?php echo $row['user_display']; ?></td>
                <td><?php echo $masol; ?></td>
                <td><?php echo $row['user_username']; ?></td>
                <td><?php echo $row['user_email']; ?></td>


                <td>
                    <!--<div class="btn-group">
                        <span class="btn btn-xs btn-warning sLoadI-<?php /*echo $row['user_id']; */
                    ?>"><i
                                class="fa fa-refresh"></i></span>
                        <span datatype="" class="btn btn-xs btn-info infoBtn"
                              id="<?php /*echo $row['user_id']; */
                    ?>">مشاهده</span>
                    </div>-->

                    <div class="btn-group">
                        <span class="btn btn-xs btn-warning sLoadE-<?php echo $row['user_id']; ?>"><i
                                class="fa fa-refresh"></i></span>
                        <span datatype="" class="btn btn-xs btn-success editBtn"
                              id="<?php echo $row['user_id']; ?>">ویرایش</span>
                    </div>
                    <?php if ($nameid != $row['user_id']) { ?>
                        <div class="btn-group">
                        <span class="btn btn-xs btn-warning sLoadD-<?php echo $row['user_id']; ?>"><i
                                class="fa fa-refresh"></i></span>
                            <span datatype="" class="btn btn-xs btn-danger delBtn"
                                  id="<?php echo $row['user_id']; ?>">حذف</span>
                        </div>
                    <?php } ?>
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
                if (response == 'self') {
                    $('.sLoadD-' + thisId).html('<i class="fa fa-close"></i>').fadeIn(500);
                } else {
                    if (response) {
                        $('.sLoadD-' + thisId).html('<i class="fa fa-check"></i>').fadeIn(500);
                    } else {
                        $('.sLoadD-' + thisId).html('<i class="fa fa-close"></i>').fadeIn(500);
                    }
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
                    window.location.href = "<?php echo $idpage; ?>edit?id=" + thisId;
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
                    window.location.href = "<?php echo $idpage; ?>?id=" + thisId;
                }, 0);
            }
        });
    });

</script>


</body>
</html>