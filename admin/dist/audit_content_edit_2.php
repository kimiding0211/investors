<?php
require 'head.php';
require 'common.php';
require 'sidebar.php';
require 'web_config.php';


$id = $_GET['id'];


$sql = " select * from audit_content where id=$id ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);
$draft = $rs[0]['draft'];

$sql = " update audit_content set content='$draft' where id=$id ";

$pdo->query($sql);

$admin = $_SESSION['admin_name'];
$now = date("Y-m-d H:i:s");
$sql = " insert into edit_log set user='$admin', menu='發布審計委員會文案', datetime='$now' ";
$pdo->query($sql);
echo "<script>alert('發布成功');window.location.href='audit_content.php';</script>";

require 'footer.php';
?>