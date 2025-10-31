<?php
require 'head.php';
require 'sidebar.php';
require 'web_config.php';


$id = $_POST['id'];
$title = $_POST['title'];
$text = $_POST['text'];


$sql = " update internal_audit set title='$title', text='$text'
         where id=$id ";

$pdo->query($sql);
echo "<script>alert('資料已更新');window.location.href='internal_audit.php';</script>";

require 'footer.php';
?>