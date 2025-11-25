<?php
require 'head.php';
require 'sidebar.php';
require 'web_config.php';


$id = $_GET['id'];


$sql = " delete from sustain_committee where id=$id ";

$pdo->query($sql);
echo "<script>alert('資料已刪除');window.location.href='sustain_committee.php';</script>";

require 'footer.php';
?>