<?php
require 'head.php';
require 'common.php';
require 'sidebar.php';
require 'web_config.php';


$id = $_GET['id'];


$sql = " select * from environmental_sustainability where id=$id ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);
$draft = $rs[0]['draft'];


$sql = " update environmental_sustainability set content='$draft' where id=$id ";

$pdo->query($sql);

$admin = $_SESSION['admin_name'];
$now = date("Y-m-d H:i:s");
$sql = " insert into edit_log set user='$admin', menu='發布環境永續和社會共榮', datetime='$now' ";
$pdo->query($sql);
echo "<script>alert('發布成功');window.location.href='environmental_sustainability.php';</script>";

require 'footer.php';
?>