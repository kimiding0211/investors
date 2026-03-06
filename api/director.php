<?php
header('Content-Type: application/json; charset=utf-8');

require 'web_config.php';

$lang = $_GET['lang'];

$sql = " select years from director group by years order by years desc ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);

$Item = [];

for ($i = 0; $i < count($rs); $i++) {

    $sql = " select * from director where years=".$rs[$i]['years']." order by sort ";
    $result = $pdo->query($sql);
    $rs1 = $result->fetchAll(PDO::FETCH_ASSOC);

    if($lang == 'en'){
        for ($j = 0; $j < count($rs1); $j++) {
            $Item[$rs[$i]['years']][] = [
                "identity" => $rs1[$j]['identity_en'],
                "name" => $rs1[$j]['name_en'],
                "main_experience" => $rs1[$j]['main_experience_en'],
                "currently_serving" => $rs1[$j]['currently_serving_en'],
                ];
        }
    }else{
        for ($j = 0; $j < count($rs1); $j++) {
            $Item[$rs[$i]['years']][] = [
                "identity" => $rs1[$j]['identity'],
                "name" => $rs1[$j]['name'],
                "main_experience" => $rs1[$j]['main_experience'],
                "currently_serving" => $rs1[$j]['currently_serving'],
                ];
        }
    }
}

echo json_encode($Item, JSON_UNESCAPED_UNICODE);
