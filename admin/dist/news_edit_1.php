<?php
require 'head.php';
require 'common.php';
require 'sidebar.php';
require 'web_config.php';

$file_status = 1;

if(!empty($_FILES['file']['name'])){
    $file = $_FILES['file'];
    $fileName_str = explode(".", $file['name']);
    $fileName = $_POST['title'].'.'.$fileName_str[1];
    $tmpPath = $file['tmp_name'];

    $uploadDir = __DIR__ . '/images/news/';
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

if ($file_status) {
    $id = $_POST['id'];
    $mark_id = $_POST['mark_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $post_date = $_POST['post_date'];
    if(!empty($_POST['status'])){
        $status = $_POST['status'];
    }else{
        $status = 0;
    }
    
    $sql = " update news set mark_id='$mark_id', title='$title', content='$content', post_date='$post_date', status='$status' ";
    
    if(!empty($fileName)){
        $link_url = 'http://'.$_SERVER['SERVER_NAME'].'/admin/dist/images/news/'.$fileName;
        $sql.= " , link_url='$link_url' ";
    }

    $sql.= " where id=$id ";
    
    $pdo->query($sql);

    $admin = $_SESSION['admin_name'];
    $now = date("Y-m-d H:i:s");
    $sql = " insert into edit_log set user='$admin', menu='編輯消息', datetime='$now' ";
    $pdo->query($sql);
    echo "<script>alert('資料已更新');window.location.href='news.php';</script>";
}else{
    echo "<script>alert('上傳失敗');window.location.href='news.php';</script>";
}

require 'footer.php';
?>