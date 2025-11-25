<?php
require 'head.php';
require 'sidebar.php';
require 'web_config.php';


// print_r ($_FILES['file_cn']);
// exit;

$file_status_meeting_notice = 1;
$file_status_meeting_procedure_manual = 1;
$file_status_major_shareholders = 1;
$file_status_annual_report = 1;
$file_status_minutes = 1;
$name = $_POST['name'];

if(!empty($_FILES['meeting_notice']['name'])){
    $file = $_FILES['meeting_notice'];
    $fileName_str = explode(".", $file['name']);
    $fileName_meeting_notice = '開會通知書.'.$fileName_str[1];
    $tmpPath = $file['tmp_name'];

    $uploadDir = __DIR__ . "/images/shareholders_meeting/$name/";
    $destination = $uploadDir . $fileName_meeting_notice;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); 
    }

    if (move_uploaded_file($file['tmp_name'], $destination)) {
        $file_status_meeting_notice = 1;
    }else{
        $file_status_meeting_notice = 0;
    }
}

if(!empty($_FILES['meeting_procedure_manual']['name'])){
    $file = $_FILES['meeting_procedure_manual'];
    $fileName_str = explode(".", $file['name']);
    $fileName_meeting_procedure_manual = '議事手冊.'.$fileName_str[1];
    $tmpPath = $file['tmp_name'];

    $uploadDir = __DIR__ . "/images/shareholders_meeting/$name/";
    $destination = $uploadDir . $fileName_meeting_procedure_manual;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); 
    }

    if (move_uploaded_file($file['tmp_name'], $destination)) {
        $file_status_meeting_procedure_manual = 1;
    }else{
        $file_status_meeting_procedure_manual = 0;
    }
}

if(!empty($_FILES['major_shareholders']['name'])){
    $file = $_FILES['major_shareholders'];
    $fileName_str = explode(".", $file['name']);
    $fileName_major_shareholders = '主要股東名單.'.$fileName_str[1];
    $tmpPath = $file['tmp_name'];

    $uploadDir = __DIR__ . "/images/shareholders_meeting/$name/";
    $destination = $uploadDir . $fileName_major_shareholders;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); 
    }

    if (move_uploaded_file($file['tmp_name'], $destination)) {
        $file_status_major_shareholders = 1;
    }else{
        $file_status_major_shareholders = 0;
    }
}

if(!empty($_FILES['annual_report']['name'])){
    $file = $_FILES['annual_report'];
    $fileName_str = explode(".", $file['name']);
    $fileName_annual_report = '股東會年報.'.$fileName_str[1];
    $tmpPath = $file['tmp_name'];

    $uploadDir = __DIR__ . "/images/shareholders_meeting/$name/";
    $destination = $uploadDir . $fileName_annual_report;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); 
    }

    if (move_uploaded_file($file['tmp_name'], $destination)) {
        $file_status_annual_report = 1;
    }else{
        $file_status_annual_report = 0;
    }
}

if(!empty($_FILES['minutes']['name'])){
    $file = $_FILES['minutes'];
    $fileName_str = explode(".", $file['name']);
    $fileName_minutes ='股東會議事錄.'.$fileName_str[1];
    $tmpPath = $file['tmp_name'];

    $uploadDir = __DIR__ . "/images/shareholders_meeting/$name/";
    $destination = $uploadDir . $fileName_minutes;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); 
    }

    if (move_uploaded_file($file['tmp_name'], $destination)) {
        $file_status_minutes = 1;
    }else{
        $file_status_minutes = 0;
    }
}


if ($file_status_meeting_notice && $file_status_meeting_procedure_manual && $file_status_major_shareholders && $file_status_annual_report && $file_status_minutes) {
    $id = $_POST['id'];
    $years = $_POST['years'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $link_video = $_POST['link_video'];
    
    $sql = " select * from shareholders_meeting where id=$id ";
    $result = $pdo->query($sql);
    $rs = $result->fetchAll(PDO::FETCH_ASSOC);

    if(!empty($fileName_meeting_notice)){
        $meeting_notice = "http://".$_SERVER['SERVER_NAME']."/admin/dist/images/shareholders_meeting/$name/".$fileName_meeting_notice;
    }else{
        if($rs[0]['meeting_notice']){
            $meeting_notice = $rs[0]['meeting_notice'];
        }else{
            $meeting_notice = '';
        }
    }
    if(!empty($fileName_meeting_procedure_manual)){
        $meeting_procedure_manual = "http://".$_SERVER['SERVER_NAME']."/admin/dist/images/shareholders_meeting/$name/".$fileName_meeting_procedure_manual;
    }else{
        if($rs[0]['meeting_meeting_procedure_manualnotice']){
            $meeting_procedure_manual = $rs[0]['meeting_procedure_manual'];
        }else{
            $meeting_procedure_manual = '';
        }
    }
    if(!empty($fileName_major_shareholders)){
        $major_shareholders = "http://".$_SERVER['SERVER_NAME']."/admin/dist/images/shareholders_meeting/$name/".$fileName_major_shareholders;
    }else{
        if($rs[0]['major_shareholders']){
            $major_shareholders = $rs[0]['major_shareholders'];
        }else{
            $major_shareholders = '';
        }
    }
    if(!empty($fileName_annual_report)){
        $annual_report = "http://".$_SERVER['SERVER_NAME']."/admin/dist/images/shareholders_meeting/$name/".$fileName_annual_report;
    }else{
        if($rs[0]['annual_report']){
            $annual_report = $rs[0]['annual_report'];
        }else{
            $annual_report = '';
        }
    }
    if(!empty($fileName_minutes)){
        $minutes = "http://".$_SERVER['SERVER_NAME']."/admin/dist/images/shareholders_meeting/$name/".$fileName_minutes;
    }else{
        if($rs[0]['minutes']){
            $minutes = $rs[0]['minutes'];
        }else{
            $minutes = '';
        }
    }

    $sql = " update shareholders_meeting set years=$years, name='$name', date='$date', location='$location', link_video='$link_video',
             meeting_notice='$meeting_notice', meeting_procedure_manual='$meeting_procedure_manual', major_shareholders='$major_shareholders',
             annual_report='$annual_report', minutes='$minutes'
            where id=$id ";

    $pdo->query($sql);
    echo "<script>alert('資料已更新');window.location.href='shareholders_meeting.php';</script>";
}else{
    echo "<script>alert('上傳失敗');window.location.href='shareholders_meeting.php';</script>";
}



require 'footer.php';
?>