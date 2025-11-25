<?php
require 'head.php';
require 'sidebar.php';
require 'web_config.php';


$id = $_POST['id'];
$years = $_POST['years'];
$identity = $_POST['identity'];
$name = $_POST['name'];
$main_experience = $_POST['main_experience'];
$currently_serving = $_POST['currently_serving'];
$sort = $_POST['sort'];


$sql = " update director set years=$years, identity='$identity', name='$name', main_experience='$main_experience', currently_serving='$currently_serving', sort=$sort
         where id=$id ";

$pdo->query($sql);
echo "<script>alert('資料已更新');window.location.href='director.php';</script>";

require 'footer.php';
?>