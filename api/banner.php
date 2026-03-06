<?php
header('Content-Type: application/json; charset=utf-8');

require 'web_config.php';

$sql = " select * from banner where status=1 order by sort ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);

$bannerItem = [];

for ($i = 0; $i < count($rs); $i++) {
    $bannerItem[] = [
        "link_url" => $rs[$i]['link_url'],
        ];
}

echo json_encode($bannerItem, JSON_UNESCAPED_UNICODE);
