<?php
require 'head.php';
require 'common.php';
require 'sidebar.php';
require 'web_config.php';


$id = $_POST['id'];
$mark_name = $_POST['mark_name'];
$sort = $_POST['sort'];
if(!empty($_POST['status'])){
    $status = $_POST['status'];
}else{
    $status = 0;
}

$sql = " update news_mark set mark_name='$mark_name', status=$status
         where id=$id ";

$pdo->query($sql);

$admin = $_SESSION['admin_name'];
$now = date("Y-m-d H:i:s");
$sql = " insert into edit_log set user='$admin', menu='編輯分類管理', datetime='$now' ";
$pdo->query($sql);
echo "<script>alert('資料已更新');window.location.href='news_mark.php';</script>";

require 'footer.php';
?>