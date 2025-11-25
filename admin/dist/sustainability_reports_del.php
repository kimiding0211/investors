<?php
require 'head.php';
require 'sidebar.php';
require 'web_config.php';


$id = $_GET['id'];


$sql = " delete from sustainability_reports where id=$id ";

$pdo->query($sql);
echo "<script>alert('資料已刪除');window.location.href='sustainability_reports.php';</script>";

require 'footer.php';
?>