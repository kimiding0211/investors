<?php
require 'head.php';
require 'sidebar.php';
require 'web_config.php';


$id = $_POST['id'];
$name = $_POST['name'];
$name_en = $_POST['name_en'];
$code = $_POST['code'];
$market = $_POST['market'];
$industry = $_POST['industry'];
$date_of_establishment = $_POST['date_of_establishment'];
$otc_listing_date = $_POST['otc_listing_date'];
$paid_in_capital = $_POST['paid_in_capital'];
$stock_transfer_agency = $_POST['stock_transfer_agency'];
$visa_accountant = $_POST['visa_accountant'];
$chairman = $_POST['chairman'];
$president = $_POST['president'];
$spokesman = $_POST['spokesman'];



$sql = " update introduction set name='$name', name_en='$name_en', code=$code, market='$market', industry='$industry'
        , date_of_establishment='$date_of_establishment', otc_listing_date='$otc_listing_date', paid_in_capital='$paid_in_capital'
        , stock_transfer_agency='$stock_transfer_agency', visa_accountant='$visa_accountant', chairman='$chairman'
        , president='$president', spokesman='$spokesman' 
         where id=$id ";

$pdo->query($sql);
echo "<script>alert('資料已更新');window.location.href='introduction.php';</script>";

require 'footer.php';
?>