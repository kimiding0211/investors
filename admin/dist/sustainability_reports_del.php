<?php
require 'head.php';
require 'common.php';
require 'sidebar.php';
require 'web_config.php';


$id = $_GET['id'];


$sql = " delete from sustainability_reports where id=$id ";

$pdo->query($sql);

$admin = $_SESSION['admin_name'];
$now = date("Y-m-d H:i:s");
$sql = " insert into del_log set user='$admin', menu='刪除永續報告與發展政策', datetime='$now' ";
$pdo->query($sql);
echo "<script>alert('資料已刪除');window.location.href='sustainability_reports.php';</script>";

require 'footer.php';
?>