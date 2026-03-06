<?php
header('Content-Type: application/json; charset=utf-8');

require 'web_config.php';

$lang = $_GET['lang'];

if($lang == 'en'){
    $sql = " select years from shareholders_meeting_en group by years ";
    $result = $pdo->query($sql);
    $rs = $result->fetchAll(PDO::FETCH_ASSOC);
}else{
    $sql = " select years from shareholders_meeting group by years ";
    $result = $pdo->query($sql);
    $rs = $result->fetchAll(PDO::FETCH_ASSOC);
}

$Item = [];

for ($i = 0; $i < count($rs); $i++) {
    if($lang == 'en'){
        $sql = " select * from shareholders_meeting_en where status=1 and years='".$rs[$i]['years']."' order by date ";
        $result = $pdo->query($sql);
        $rs1 = $result->fetchAll(PDO::FETCH_ASSOC);
    }else{
        $sql = " select * from shareholders_meeting where status=1 and years='".$rs[$i]['years']."' order by date ";
        $result = $pdo->query($sql);
        $rs1 = $result->fetchAll(PDO::FETCH_ASSOC);
    }
    

    for ($j = 0; $j < count($rs1); $j++) {
        $Item[$rs[$i]['years']][] = [
            "title" => $rs1[$j]['title'],
            "name" => $rs1[$j]['name'],
            "date" => $rs1[$j]['date'],
            "location" => $rs1[$j]['location'],
            "meeting_notice" => $rs1[$j]['meeting_notice'],
            "meeting_procedure_manual" => $rs1[$j]['meeting_procedure_manual'],
            "major_shareholders" => $rs1[$j]['major_shareholders'],
            "annual_report" => $rs1[$j]['annual_report'],
            "minutes" => $rs1[$j]['minutes'],
            "link_video" => $rs1[$j]['link_video'],
            ];
    }
}

echo json_encode($Item, JSON_UNESCAPED_UNICODE);
