<?php
header('Content-Type: application/json; charset=utf-8');

require 'web_config.php';

$lang = $_GET['lang'];

if($lang == 'en'){
    $sql = " select project_name from company_regulations_en group by project_name ";
    $result = $pdo->query($sql);
    $rs = $result->fetchAll(PDO::FETCH_ASSOC);
}else{
    $sql = " select project_name from company_regulations group by project_name ";
    $result = $pdo->query($sql);
    $rs = $result->fetchAll(PDO::FETCH_ASSOC);
}

$Item = [];

for ($i = 0; $i < count($rs); $i++) {
    if($lang == 'en'){
        $sql = " select * from company_regulations_en where status=1 and project_name='".$rs[$i]['project_name']."' order by id ";
        $result = $pdo->query($sql);
        $rs1 = $result->fetchAll(PDO::FETCH_ASSOC);
    }else{
        $sql = " select * from company_regulations where status=1 and project_name='".$rs[$i]['project_name']."' order by id ";
        $result = $pdo->query($sql);
        $rs1 = $result->fetchAll(PDO::FETCH_ASSOC);
    }
    

    for ($j = 0; $j < count($rs1); $j++) {
        $Item[$rs[$i]['project_name']][] = [
            "title" => $rs1[$j]['title'],
            "link_url" => $rs1[$j]['link_url'],
            ];
    }
}

echo json_encode($Item, JSON_UNESCAPED_UNICODE);
