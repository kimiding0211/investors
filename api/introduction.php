<?php
header('Content-Type: application/json; charset=utf-8');

require 'web_config.php';

$lang = $_GET['lang'];

if($lang == 'en'){
    $sql = " select * from introduction where language='en' ";
    $result = $pdo->query($sql);
    $rs = $result->fetchAll(PDO::FETCH_ASSOC);
}else{
    $sql = " select * from introduction where language='tw' ";
    $result = $pdo->query($sql);
    $rs = $result->fetchAll(PDO::FETCH_ASSOC);
}


$introductionItem = [];

$introductionItem[] = [
    "公司名稱" => $rs[0]['name'],
    "英文全名" => $rs[0]['name_en'],
    "股票代號" => $rs[0]['code'],
    "交易市場" => $rs[0]['market'],
    "產業別" => $rs[0]['industry'],
    "成立日期" => $rs[0]['date_of_establishment'],
    "上櫃日期" => $rs[0]['otc_listing_date'],
    "實收資本額" => $rs[0]['paid_in_capital'],
    "股票過戶機構" => $rs[0]['stock_transfer_agency'],
    "簽證會計師" => $rs[0]['visa_accountant'],
    "董事長" => $rs[0]['chairman'],
    "總經理" => $rs[0]['president'],
    "發言人" => $rs[0]['spokesman'],
    ];

echo json_encode($introductionItem, JSON_UNESCAPED_UNICODE);
