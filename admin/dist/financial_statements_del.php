<?php
require 'head.php';
require 'sidebar.php';
require 'web_config.php';


$id = $_GET['id'];


$sql = " delete from financial_statements where id=$id ";

$pdo->query($sql);
echo "<script>alert('資料已刪除');window.location.href='financial_statements.php';</script>";

require 'footer.php';
?>