<?php
header('Content-Type: application/json; charset=utf-8');

require 'web_config.php';

$lang = $_GET['lang'];

if($lang == 'en'){
    $sql = " select * from organization where code='en' ";
    $result = $pdo->query($sql);
    $rs = $result->fetchAll(PDO::FETCH_ASSOC);
}else{
    $sql = " select * from organization where code='tw' ";
    $result = $pdo->query($sql);
    $rs = $result->fetchAll(PDO::FETCH_ASSOC);
}


$organizationItem = [];

$organizationItem[] = [
    "content" => $rs[0]['content'],
    ];

echo json_encode($organizationItem, JSON_UNESCAPED_UNICODE);
