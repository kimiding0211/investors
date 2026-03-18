<?php
header('Content-Type: application/json; charset=utf-8');

require 'web_config.php';

$lang = $_GET['lang'];

$sql = " select * from conference order by years desc ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);

$Item = [];

for ($i = 0; $i < count($rs); $i++) {
    if($lang == 'en'){
        $Item[] = [
            "years" => $rs[$i]['years'],
            "date" => $rs[$i]['date'],
            "location" => $rs[$i]['location_en'],
            "link_url" => $rs[$i]['link_en'],
            "link_video" => $rs[$i]['link_video'],
            ];
    }else{
        $Item[] = [
            "years" => $rs[$i]['years'],
            "date" => $rs[$i]['date'],
            "location" => $rs[$i]['location'],
            "link_url" => $rs[$i]['link_cn'],
            "link_en" => $rs[$i]['link_en'],
            "link_video" => $rs[$i]['link_video'],
            ];
    }
}

echo json_encode($Item, JSON_UNESCAPED_UNICODE);
