<?php require_once '../config.php';
$idpage = "storeCategory";
$thisTable = $storeCategoryTable;
include("h.php");

$showSubCats = (isset($_GET['showSubCats']) && $_GET['showSubCats'] != '') ? $_GET['showSubCats'] : '';

// delete item
if (isset($_REQUEST['delete'])) {
    $thisID = (checkUID($_REQUEST['delete'])) ? $_REQUEST['delete'] : false;
    if ($thisID) {
        delSubArr($thisTable, $thisID);
        return true;
    } else {
        echo false;
    }
    exit(0);
}

?>
<div class="col-lg-12">
    <div class="btn-group">
        <a href="<?php echo $idpage.'New'?>" class="btn btn-success">ایجاد دسته جدید
        </a>

        <a href="?todayCats" class="btn btn-default">
            <span class="">تعداد دسته های امروز </span>
            <span class="label label-danger"><?php echo getNotifications($thisTable); ?></span>
        </a>

        <?php
        if ($showSubCats != '') {
            echo '<span class="btn btn-warning" onclick = "window.history.go(-1);" > بازگشت به قبلی </span >';

            echo '<a class="btn btn-primary" href="' . $idpage . '">
                                <span class="">همه</span>
                            </a>';
        } else {
            echo '<a class="btn btn-primary" href="' . $idpage . '">
                    <span class="">همه</span>
                </a>';
        }
        ?>
    </div>
    <br><br>
    <div class="table-responsive">
        <?php
        $allDataForAlert = $db->query("select * from $thisTable")->fetch_all(1);
        $allDataForAlert = ($allDataForAlert) ? $allDataForAlert : false;

        if ($allDataForAlert) { ?>
            <!--<div style="color: red;">توجه: با حذف هر دسته همه ی زیردسته های آن نیز حذف خواهد شد!</div>-->
            <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                <tr>
                    <th>ردیف <i class="fa fa-sort"></i></th>
                    <!--<th>لوگو</th>-->
                    <th>نام دسته بندی</th>
                    <!--<th>دیدن زیردسته</th>-->
                    <th>تنظیات</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($showSubCats != '') {
                    $where = "sub_cat=$showSubCats";
                } else {
                    $where = 'sub_cat=0';
                }
                $sql2 = "select * from $thisTable WHERE $where order by create_time desc";

                if (isset($_GET['todayCats'])) {
                    $sql2 = "select * from $thisTable WHERE $where AND DATE(create_time) = CURDATE() order by create_time desc";
                }
                $res2 = $db->query($sql2)->fetch_all(1);
                $res2 = ($res2) ? $res2 : false;
                if ($res2) {
                    $i = 1;
                    foreach ($res2 as $ress => $row) {
                        $imageShowT = (isset($row['image']) && $row['image'] != '') ? $row['image'] : $defaultImage;
                        echo "<tr><td>" . $i . "</td>";
                        //echo '<td><img src="' . $imageShowT . '" width="40" height="40"></td>';

                        echo "<td>" . $row["title"] . "</td>";

                        if ($nametype == 1) {

                            /*if ($showSubCats == '' || 1) {
                                $id = $row['id'];
                                $numSubCats = getField($thisTable, 'COUNT(id)', 'sub_cat', $id);
                                if ($numSubCats > 0) {
                                    */?><!--
                                    <td>
                                        <div class="btn-group">
                                                        <span
                                                            class="btn btn-xs btn-warning sLoadI-<?php /*echo $row['id']; */?>"><i
                                                                class="fa fa-refresh"></i></span>
                                            <span datatype="" class="btn btn-xs btn-info infoBtn"
                                                  id="<?php /*echo $row['id']; */?>">زیردسته ها(<?php /*echo $numSubCats; */?> )</span>
                                        </div>
                                    </td>

                                    --><?php
/*                                } else {
                                    echo '<td>-</td>';
                                }
                            }*/ ?>

                            <td>
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
                            </tr>

                            <?php

                        } else {
                            echo '<td>-</td>';
                            echo '<td>-</td>';
                            echo '<td>-</td>';
                        }
                        $i++;
                    }
                }
                ?>

                </tbody>
            </table>
        <?php } else {
            echo '<div class="col-lg-12"><div class="alert alert-warning text-center">هیچ محتوایی برای نمایش وجود ندارد.</div></div>';
        } ?>
    </div>
</div>


</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->

<!-- JavaScript -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>
<!-- Page Specific Plugins -->
<script src="js/tablesorter/jquery.tablesorter.js"></script>
<script src="js/tablesorter/tables.js"></script>

<script>
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
                    window.location.href = "<?php echo $idpage;?>";
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
                    window.location.href = "<?php echo $idpage; ?>New?id=" + thisId;
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
                    window.location.href = "<?php echo $idpage; ?>?showSubCats=" + thisId;
                }, 0);
            }
        });
    });

</script>


</body>
</html>