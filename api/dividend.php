<?php
header('Content-Type: application/json; charset=utf-8');

require 'web_config.php';

$lang = $_GET['lang'];

if($lang == 'en'){
    $sql = " select * from dividend where code='en' ";
    $result = $pdo->query($sql);
    $rs = $result->fetchAll(PDO::FETCH_ASSOC);
}else{
    $sql = " select * from dividend where code='tw' ";
    $result = $pdo->query($sql);
    $rs = $result->fetchAll(PDO::FETCH_ASSOC);
}


$Item = [];

$Item[] = [
    "content" => $rs[0]['content'],
    ];

echo json_encode($Item, JSON_UNESCAPED_UNICODE);
