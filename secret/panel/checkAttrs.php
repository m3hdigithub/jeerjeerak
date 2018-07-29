<?php require_once '../config.php';
$idpage = "checkAttrs";
$thisTable = $checkAttrTable;
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
        <a href="<?php echo $idpage . 'New' ?>" class="btn btn-success">ایجاد ویژگی جدید</a>

        <a href="?todayCats" class="btn btn-default">
            <span class="">ویژگی های امروز </span>
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
        $allDataForAlert = $db->query("select DISTINCT cat_id from $thisTable")->fetch_all(1);
        $allDataForAlert = ($allDataForAlert) ? $allDataForAlert : false;

        if ($allDataForAlert) { ?>
            <!--<div style="color: red;">توجه: با حذف عنوان اصلی همه ی زیر مجموعه های آن نیز حذف خواهد شد!</div>-->
            <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                <tr>
                    <th>ردیف <i class="fa fa-sort"></i></th>
                    <?php //echo (!$isSubCat)?'<th>تصویر</th>':'';?>
                    <th>دسته بندی</th>

                    <?php if ($showSubCats != '') {
                        echo '<th>تنظیات</th>';
                    } else {
                        echo '<th>دیدن ویژگی ها</th>';
                    } ?>
                </tr>
                </thead>
                <tbody>
                <?php

                $sql2 = "select DISTINCT cat_id from $thisTable order by create_time desc";
                if ($showSubCats != '') {
                    $sql2 = "select * from $thisTable WHERE cat_id='$showSubCats' order by create_time desc";
                }


                if (isset($_GET['todayCats'])) {
                    $sql2 = "select DISTINCT cat_id from $thisTable WHERE DATE(create_time) = CURDATE() order by create_time desc";
                    if ($showSubCats != '') {
                        $sql2 = "select * from $thisTable WHERE cat_id='$showSubCats' AND DATE(create_time) = CURDATE() order by create_time desc";
                    }

                }
                $res2 = $db->query($sql2)->fetch_all(1);
                $res2 = ($res2) ? $res2 : false;
                if ($res2) {
                    $i = 1;
                    foreach ($res2 as $ress => $row) {
                        $category = getField($categoryTable, 'title', 'id', $row['cat_id']);
                        //$imageShowT = (isset($row['image']) && $row['image'] != '') ? $uploadDirThumb . $row['image'] : $defaultImage;
                        echo "<tr><td>" . $i . "</td>";
                        //echo (!$isSubCat)?'<td><img src="' . $imageShowT . '" width="40" height="40"></td>':'';


                        if ($nametype == 1) {

                            $catId = $row['cat_id'];
                            $numSubCats = getField($thisTable, 'COUNT(*)', 'cat_id', $catId);
                            if ($numSubCats) {
                                if ($showSubCats != '') {
                                    echo "<td>" . checkEmptyVar(getField($thisTable,'title','id',$row['id'])) . "</td>";

                                    ?>
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
                                <?php } else {
                                    echo "<td>" . checkEmptyVar($category) . "</td>";

                                    ?>
                                    <td>
                                        <div class="btn-group">
                                                        <span
                                                                class="btn btn-xs btn-warning sLoadI-<?php echo $row['cat_id']; ?>"><i
                                                                    class="fa fa-refresh"></i></span>
                                            <span datatype="" class="btn btn-xs btn-info infoBtn"
                                                  id="<?php echo $row['cat_id']; ?>">زیرمجموعه ها(<?php echo $numSubCats; ?>
                                                )</span>
                                        </div>
                                    </td>
                                    <?php
                                }
                            } else {
                                echo '<td>-</td>';
                                echo '<td>-</td>';
                            }
                            ?>


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