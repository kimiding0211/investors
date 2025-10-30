<?php
require 'head.php';
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
    $fileName_en = $_POST['years'].'法人說明會.'.$fileName_str[1];
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
    $link_video = $_POST['link_video'];
    
    $sql = " select * from conference where id=$id ";
    $result = $pdo->query($sql);
    $rs = $result->fetchAll(PDO::FETCH_ASSOC);

    if(!empty($fileName_cn)){
        $link_cn = 'http://localhost/investors/admin/dist/images/conference/'.$years.'/'.$fileName_cn;
    }else{
        if($rs[0]['link_cn']){
            $link_cn = $rs[0]['link_cn'];
        }else{
            $link_cn = '';
        }
    }
    if(!empty($fileName_en)){
        $link_en = 'http://localhost/investors/admin/dist/images/conference/'.$years.'/'.$fileName_en;
    }else{
        if($rs[0]['link_cn']){
            $link_en = $rs[0]['link_en'];
        }else{
            $link_en = '';
        }
    }

    $sql = " update conference set years='$years', date='$date', location='$location', link_video='$link_video', link_cn='$link_cn', link_en='$link_en'
            where id=$id ";

    $pdo->query($sql);
    echo "<script>alert('資料已更新');window.location.href='conference.php';</script>";
}else{
    echo "<script>alert('上傳失敗');window.location.href='conference.php';</script>";
}



require 'footer.php';
?>