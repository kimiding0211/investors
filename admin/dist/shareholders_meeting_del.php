<?php
require 'head.php';
require 'sidebar.php';
require 'web_config.php';


$id = $_GET['id'];


$sql = " delete from shareholders_meeting where id=$id ";

$pdo->query($sql);
echo "<script>alert('資料已刪除');window.location.href='shareholders_meeting.php';</script>";

require 'footer.php';
?>