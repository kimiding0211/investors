<?php
require 'head.php';
require 'sidebar.php';
require 'web_config.php';


$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];


$sql = " update remuneration_content set title='$title', content='$content'
         where id=$id ";

$pdo->query($sql);
echo "<script>alert('資料已更新');window.location.href='remuneration_content.php';</script>";

require 'footer.php';
?>