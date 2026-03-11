<?php
require 'head.php';
require 'common.php';
require 'sidebar.php';
require 'web_config.php';

$file_status = 1;
$file_status_en = 1;

if(!empty($_FILES['file']['name'])){
    $file = $_FILES['file'];
    $fileName_str = explode(".", $file['name']);
    $fileName = $_POST['quarterly'].'.'.$fileName_str[1];
    $tmpPath = $file['tmp_name'];

    $uploadDir = __DIR__ . '/images/financial_statements/'.$_POST['years'].'/';
    $destination = $uploadDir . $fileName;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); 
    }

    if (move_uploaded_file($file['tmp_name'], $destination)) {
        $file_status = 1;
    }else{
        $file_status = 0;
    }
}

if(!empty($_FILES['file_en']['name'])){
    $file = $_FILES['file_en'];
    $fileName_str = explode(".", $file['name']);
    $fileName_en = $_POST['quarterly'].'_en.'.$fileName_str[1];
    $tmpPath = $file['tmp_name'];

    $uploadDir = __DIR__ . '/images/financial_statements/'.$_POST['years'].'/';
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


if ($file_status && $file_status_en) {
    $id = $_POST['id'];
    $years = $_POST['years'];
    $quarterly = $_POST['quarterly'];
    if(!empty($_POST['status'])){
        $status = $_POST['status'];
    }else{
        $status = 0;
    }
    
    $sql = " select * from financial_statements where id=$id ";
    $result = $pdo->query($sql);
    $rs = $result->fetchAll(PDO::FETCH_ASSOC);

    $sql = " update financial_statements set years='$years', quarterly='$quarterly', status=$status";

    if(!empty($fileName)){
        $link_url = 'http://'.$_SERVER['SERVER_NAME'].'/admin/dist/images/financial_statements/'.$years.'/'.$fileName;
        $sql.= " , link_url='$link_url' ";
    }

    if(!empty($fileName_en)){
        $link_url = 'http://'.$_SERVER['SERVER_NAME'].'/admin/dist/images/financial_statements/'.$years.'/'.$fileName_en;
        $sql.= " , link_en='$link_en' ";
    }
    
    $sql.= " where id=$id ";
    $pdo->query($sql);

    $admin = $_SESSION['admin_name'];
    $now = date("Y-m-d H:i:s");
    $sql = " insert into edit_log set user='$admin', menu='編輯財務報表', datetime='$now' ";
    $pdo->query($sql);
    echo "<script>alert('資料已更新');window.location.href='financial_statements.php';</script>";
}else{
    echo "<script>alert('上傳失敗');window.location.href='financial_statements.php';</script>";
}



require 'footer.php';
?>