<?php
header('Content-Type: application/json; charset=utf-8');

require 'web_config.php';

$now = date('Y-m-d H:i:s');
$sql = " select news.*, news_mark.mark_name from news,news_mark where news.mark_id=news_mark.id and news.status=1 and news.post_date<='$now' ";

if(!empty($_GET['mark_id'])){
    $mark_id = $_GET['mark_id'];
    $sql.= " and news.mark_id=$mark_id ";
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
        "post_date" => $rs[$i]['post_date'],
        ];
}

echo json_encode($Item, JSON_UNESCAPED_UNICODE);
