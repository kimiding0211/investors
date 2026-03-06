<?php
require 'head.php';
require 'common.php';
require 'sidebar.php';
require 'web_config.php';


$id = $_GET['id'];


$sql = " select * from internal_audit where id=$id ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);
$draft = $rs[0]['draft'];


$sql = " update internal_audit set content='$draft' where id=$id ";

$pdo->query($sql);

$admin = $_SESSION['admin_name'];
$now = date("Y-m-d H:i:s");
$sql = " insert into edit_log set user='$admin', menu='發布風險管理與內部稽核', datetime='$now' ";
$pdo->query($sql);
echo "<script>alert('發布成功');window.location.href='internal_audit.php';</script>";

require 'footer.php';
?>