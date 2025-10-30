<?php
require 'head.php';
require 'sidebar.php';
require 'web_config.php';


$id = $_POST['id'];
$years = $_POST['years'];
$identity = $_POST['identity'];
$name = $_POST['name'];
$main_experience = $_POST['main_experience'];
$election_date = $_POST['election_date'];


$sql = " update remuneration set years=$years, identity='$identity', name='$name', main_experience='$main_experience', election_date='$election_date'
         where id=$id ";

$pdo->query($sql);
echo "<script>alert('資料已更新');window.location.href='remuneration.php';</script>";

require 'footer.php';
?>