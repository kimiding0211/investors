<?php
header('Content-Type: application/json; charset=utf-8');

require 'web_config.php';

$id = $_GET['id'];

$ip_array = ["61.219.192.149","61.219.192.145","211.72.152.223"];

$now = date('Y-m-d H:i:s');

if(in_array($_SERVER['REMOTE_ADDR'],$ip_array)){
    $sql = " select news.*, news_mark.mark_name from news,news_mark where news.mark_id=news_mark.id and news.id=$id ";
}else{
    $sql = " select news.*, news_mark.mark_name from news,news_mark where news.mark_id=news_mark.id and news.status=1 and news.post_date<='$now' and news.id=$id ";
}

$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);

$Item = [];

for ($i = 0; $i < count($rs); $i++) {
    $Item[] = [
        "id" => $rs[$i]['id'],
        "mark_name" => $rs[$i]['mark_name'],
        "title" => $rs[$i]['title'],
        "content" => $rs[$i]['content'],
        "link_url" => $rs[$i]['link_url'],
        "post_date" => substr($rs[$i]['post_date'],0,10),
        ];
}

echo json_encode($Item, JSON_UNESCAPED_UNICODE);
