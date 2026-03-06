<?php
require 'head.php';
require 'common.php';
require 'sidebar.php';
require 'web_config.php';


$id = $_POST['id'];
$code = $_POST['code'];
$draft = $_POST['draft'];


$sql = " update internal_audit set code='$code', draft='$draft'
         where id=$id ";

$pdo->query($sql);

$admin = $_SESSION['admin_name'];
$now = date("Y-m-d H:i:s");
$sql = " insert into edit_log set user='$admin', menu='編輯風險管理與內部稽核', datetime='$now' ";
$pdo->query($sql);
echo "<script>alert('草稿儲存成功');window.location.href='internal_audit_edit.php?id=$id';</script>";

require 'footer.php';
?>