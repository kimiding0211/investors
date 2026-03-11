<?php
require 'head.php';
require 'common.php';
require 'sidebar.php';
require 'web_config.php';


$id = $_GET['id'];


$sql = " select * from stakeholders where id=$id ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);
$draft = $rs[0]['draft'];


$sql = " update stakeholders set content='$draft' where id=$id ";

$pdo->query($sql);

$admin = $_SESSION['admin_name'];
$now = date("Y-m-d H:i:s");
$sql = " insert into edit_log set user='$admin', menu='發布利害人關係人專區', datetime='$now' ";
$pdo->query($sql);
echo "<script>alert('資料已更新');window.location.href='stakeholders.php';</script>";

require 'footer.php';
?>