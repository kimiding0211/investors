<?php
require 'head.php';
require 'common.php';
require 'sidebar.php';
require 'web_config.php';


$id = $_GET['id'];


$sql = " delete from company_regulations_en where id=$id ";

$pdo->query($sql);

$admin = $_SESSION['admin_name'];
$now = date("Y-m-d H:i:s");
$sql = " insert into del_log set user='$admin', menu='刪除內部規章與治理機制-英文', datetime='$now' ";
$pdo->query($sql);
echo "<script>alert('資料已刪除');window.location.href='company_regulations_en.php';</script>";

require 'footer.php';
?>