<?php
require 'head.php';
require 'common.php';
require 'sidebar.php';
require 'web_config.php';


// print_r ($_FILES['file_cn']);
// exit;

$file_status_cn = 1;
$file_status_en = 1;

if(!empty($_FILES['file_cn']['name'])){
    $file = $_FILES['file_cn'];
    $fileName_str = explode(".", $file['name']);
    $fileName_cn = $_POST['years'].'法人說明會.'.$fileName_str[1];
    $tmpPath = $file['tmp_name'];

    $uploadDir = __DIR__ . '/images/conference/'.$_POST['years'].'/';
    $destination = $uploadDir . $fileName_cn;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); 
    }

    if (move_uploaded_file($file['tmp_name'], $destination)) {
        $file_status_cn = 1;
    }else{
        $file_status_cn = 0;
    }
}

if(!empty($_FILES['file_en']['name'])){
    $file = $_FILES['file_en'];
    $fileName_str = explode(".", $file['name']);
    $fileName_en = $_POST['years'].'法人說明會_en.'.$fileName_str[1];
    $tmpPath = $file['tmp_name'];

    $uploadDir = __DIR__ . '/images/conference/'.$_POST['years'].'/';
    $destination = $uploadDir . $fileName_en;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); 
    }

    if (move_uploaded_file($file['tmp_name'], $destination)) {
        $file_status_en = 1;
    }else{
        $file_status_en = 0;
    }
}


if ($file_status_cn && $file_status_en) {
    $id = $_POST['id'];
    $years = $_POST['years'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $location_en = $_POST['location_en'];
    $link_video = $_POST['link_video'];
    if(!empty($_POST['status'])){
        $status = $_POST['status'];
    }else{
        $status = 0;
    }
    
    $sql = " select * from conference where id=$id ";
    $result = $pdo->query($sql);
    $rs = $result->fetchAll(PDO::FETCH_ASSOC);

    $sql = " update conference set years='$years', date='$date', location='$location', location_en='$location_en', link_video='$link_video', status=$status";

    if(!empty($fileName_cn)){
        $link_cn = 'http://'.$_SERVER['SERVER_NAME'].'/admin/dist/images/conference/'.$years.'/'.$fileName_cn;
        $sql.= " , link_cn='$link_cn' ";
    }
    if(!empty($fileName_en)){
        $link_en = 'http://'.$_SERVER['SERVER_NAME'].'/admin/dist/images/conference/'.$years.'/'.$fileName_en;
        $sql.= " , link_en='$link_en' ";
    }

    $sql.= " where id=$id ";
    $pdo->query($sql);

    $admin = $_SESSION['admin_name'];
    $now = date("Y-m-d H:i:s");
    $sql = " insert into edit_log set user='$admin', menu='編輯法人說明會資訊', datetime='$now' ";
    $pdo->query($sql);
    echo "<script>alert('資料已更新');window.location.href='conference.php';</script>";
}else{
    echo "<script>alert('上傳失敗');window.location.href='conference.php';</script>";
}



require 'footer.php';
?>