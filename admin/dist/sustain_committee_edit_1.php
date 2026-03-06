<?php
require 'head.php';
require 'common.php';
require 'sidebar.php';
require 'web_config.php';


$id = $_POST['id'];
$years = $_POST['years'];
$identity = $_POST['identity'];
$identity_en = $_POST['identity_en'];
$name = $_POST['name'];
$name_en = $_POST['name_en'];
$main_experience = $_POST['main_experience'];
$main_experience_en = $_POST['main_experience_en'];
$election_date = $_POST['election_date'];
$sort = $_POST['sort'];
if(!empty($_POST['status'])){
    $status = $_POST['status'];
}else{
    $status = 0;
}


$sql = " update sustain_committee set years=$years
        , identity='$identity'
        , identity_en='$identity_en'
        , name='$name'
        , name_en='$name_en'
        , main_experience='$main_experience'
        , main_experience_en='$main_experience_en'
        , election_date='$election_date'
        , sort=$sort
        , status=$status
         where id=$id ";

$pdo->query($sql);

$admin = $_SESSION['admin_name'];
$now = date("Y-m-d H:i:s");
$sql = " insert into edit_log set user='$admin', menu='編輯永續發展委員會', datetime='$now' ";
$pdo->query($sql);
echo "<script>alert('資料已更新');window.location.href='sustain_committee.php';</script>";

require 'footer.php';
?>