<?php
require 'head.php';
require 'sidebar.php';
require 'web_config.php';


$id = $_GET['id'];


$sql = " delete from company_regulations where id=$id ";

$pdo->query($sql);
echo "<script>alert('資料已刪除');window.location.href='company_regulations.php';</script>";

require 'footer.php';
?>