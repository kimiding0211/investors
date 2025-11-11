<?php
require 'head.php';
require 'sidebar.php';
require 'web_config.php';


$id = $_POST['id'];
$title = $_POST['title'];
$text = $_POST['text'];


$sql = " update environmental_sustainability set title='$title', text='$text'
         where id=$id ";

$pdo->query($sql);
echo "<script>alert('資料已更新');window.location.href='environmental_sustainability.php';</script>";

require 'footer.php';
?>