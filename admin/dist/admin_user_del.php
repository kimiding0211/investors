<?php
require 'head.php';
require 'common.php';
require 'sidebar.php';
require 'web_config.php';


$id = $_GET['id'];

$sql = " select * from admin where id=$id ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);
$name = $rs[0]['name'];


$sql = " delete from admin where id=$id ";

$pdo->query($sql);

$admin = $_SESSION['admin_name'];
$now = date("Y-m-d H:i:s");
$sql = " insert into del_log set user='$admin', menu='刪除[$name]使用者', datetime='$now' ";
$pdo->query($sql);
echo "<script>alert('使用者[$name]已刪除');window.location.href='admin_user.php';</script>";

require 'footer.php';
?>