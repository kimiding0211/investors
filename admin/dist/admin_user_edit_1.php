<?php
require 'head.php';
require 'common.php';
require 'sidebar.php';
require 'web_config.php';


$name = htmlspecialchars($_POST["user_name"]); // 防止 XSS
$pwd = htmlspecialchars($_POST["user_pwd"]); // 防止 XSS
$status = htmlspecialchars($_POST["status"]); // 防止 XSS
$permissions = htmlspecialchars($_POST["permissions"]); // 防止 XSS
$id = $_POST['id'];
$old_pwd = $_POST['old_pwd'];

if($pwd == $old_pwd){
    $sql = " update admin set name='$name', status=$status, permissions='$permissions' where id=$id ";
}else{
    $pwd = md5($pwd);
    $sql = " update admin set name='$name', password='$pwd', status=$status, permissions='$permissions' where id=$id ";
}
$pdo->query($sql);

$admin = $_SESSION['admin_name'];
$now = date("Y-m-d H:i:s");
$sql = " insert into edit_log set user='$admin', menu='編輯帳號[$name]', datetime='$now' ";
$pdo->query($sql);

echo "<script>alert('帳號已更新');window.location.href='admin_user.php';</script>";
?>


<?php
require 'footer.php';
?>