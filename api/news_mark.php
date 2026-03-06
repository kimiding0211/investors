<?php
header('Content-Type: application/json; charset=utf-8');

require 'web_config.php';

$sql = " select * from news_mark where status=1 ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);

$Item = [];

for ($i = 0; $i < count($rs); $i++) {
    $Item[] = [
        "id" => $rs[$i]['id'],
        "mark_name" => $rs[$i]['mark_name'],
        ];
}

echo json_encode($Item, JSON_UNESCAPED_UNICODE);
