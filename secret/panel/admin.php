<?php require_once '../config.php';
$idpage = "admin";
include("h.php"); ?>
<div class="row">
    <div class="well text-center">
        <h3>امکانات بیشتر</h3>
        <hr>
            <?php echo ($pluginApiBlocker)?'<a href="apiIpBlocked" class="btn btn-danger btn-block">آی پی های مسدود شده اپلیکیشن</a><a href="apiUserBlocked" class="btn btn-danger btn-block">کاربران مسدود شده اپلیکیشن</a>':'';?>
            <?php //echo ($pluginContactUs)?'<a href="contactForm" class="btn btn-primary btn-block">تماس با ما</a>':'';?>
            <?php //echo ($pluginAppLinks)?'<a href="appLinks" class="btn btn-primary btn-block">لینک های اپلیکیشن</a>':'';?>
            <?php //echo ($pluginCategory)?'<a href="company" class="btn btn-warning btn-block">کمپانی و مدل</a>':'';?>
    </div>
    <div class="col-lg-4">
        <a href="user">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-user-secret fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading"><?php echo getNotifications($adminTable, true); ?></p>
                            <p class="announcement-text">مدیران</p>
                            <p class="announcement-text">امروز: <?php echo getNotifications($adminTable); ?></p>
                        </div>
                    </div>
                </div>
                <div class="panel-footer announcement-bottom">
                    <div class="row">
                        <div class="col-xs-6">
                            مدیریت مدیران
                        </div>
                        <div class="col-xs-6 text-right">
                            <i class="fa fa-arrow-circle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4">
        <a href="members">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading"><?php echo getNotifications($usersTable, true); ?></p>
                            <p class="announcement-text">کاربران</p>
                            <p class="announcement-text">امروز: <?php echo getNotifications($usersTable); ?></p>

                        </div>
                    </div>
                </div>
                <div class="panel-footer announcement-bottom">
                    <div class="row">
                        <div class="col-xs-6">
                            مدیریت کاربران
                        </div>
                        <div class="col-xs-6 text-right">
                            <i class="fa fa-arrow-circle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div><!-- /.row -->

</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->

<!-- JavaScript -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>

<!-- Page Specific Plugins -->
<script src="js/morris/chart-data-morris.js"></script>
<script src="js/tablesorter/jquery.tablesorter.js"></script>
<script src="js/tablesorter/tables.js"></script>

</body>
</html>
