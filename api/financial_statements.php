<?php
header('Content-Type: application/json; charset=utf-8');

require 'web_config.php';

$lang = $_GET['lang'];

$sql = " select years from financial_statements group by years order by years desc ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);

$Item = [];

for ($i = 0; $i < count($rs); $i++) {

    $sql = " select * from financial_statements where status=1 and years=".$rs[$i]['years']." order by quarterly ";
    $result = $pdo->query($sql);
    $rs1 = $result->fetchAll(PDO::FETCH_ASSOC);

    if($lang == 'en'){
        for ($j = 0; $j < count($rs1); $j++) {
            $Item[$rs[$i]['years']][] = [
                "quarterly" => $rs1[$j]['quarterly'],
                "link_url" => $rs1[$j]['link_en'],
                ];
        }
    }else{
        for ($j = 0; $j < count($rs1); $j++) {
            $Item[$rs[$i]['years']][] = [
                "quarterly" => $rs1[$j]['quarterly'],
                "link_url" => $rs1[$j]['link_url'],
                ];
        }
    }
}

echo json_encode($Item, JSON_UNESCAPED_UNICODE);
