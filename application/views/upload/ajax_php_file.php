<?php
define('url_upload','upload');
if (isset($_FILES["image"]["type"])) {
    $uploadeOK = 1;

    $target1 =url_upload;

        $errors = array();

        $file_name = time() + rand(1, 100000);

        $file_size = $_FILES['image']['size'];

        $file_tmp = $_FILES['image']['tmp_name'];

        $file_type = $_FILES['image']['type'];

        $expensions = array("image/jpeg", "image/jpg", "image/png");

        if ($file_size > 2097152 || in_array($file_type, $expensions) == false) {
            $uploadeOK = 0;
        }

        if ($uploadeOK == 1) {
            $path = $_FILES['image']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $new_name_files = $file_name . '.' . $ext;
            $url_pic_adver = $target1 . $new_name_files;
            move_uploaded_file($file_tmp, $url_pic_adver);
            echo 'i';
        }



}

if (isset($_FILES["video"]["type"])) {
    $uploadeOK = 1;

    $target1 =url_upload;

    $errors = array();

    $file_name = time() + rand(1, 100000);

    $file_size = $_FILES['video']['size'];

    $file_tmp = $_FILES['video']['tmp_name'];

    $file_type = $_FILES['video']['type'];

    $expensions = array("video/mp4", "image/gif", "audio/wma");

    if ($file_size > 5242880 || in_array($file_type, $expensions) == false) {
        $uploadeOK = 0;
    }

    if ($uploadeOK == 1) {
        $path = $_FILES['video']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $new_name_files = $file_name . '.' . $ext;
        $url_pic_adver = $target1 . $new_name_files;
        move_uploaded_file($file_tmp, $url_pic_adver);
        echo 'v';
    }



}

if(isset($_POST['url_delete'])){
  $url_delete=$_POST['url_delete'];
  echo $url_delete;
    if(file_exists($url_delete)){
        unlink($url_delete);
        echo $url_delete;
    }
}
