<?php
// define("DB_Host", "localhost");
// define("DB_PORT", "3306");
// define("DB_User", "calvin");
// define("DB_PWD", "calvin@test");
// define("DB_Database", "g9web");
// 正式伺服器 mysql連線資訊
// define("DB_Host", "localhost");
// define("DB_PORT", "3306");
// define("DB_User", "calvin");
// define("DB_PWD", "Calvin@03");
// define("DB_Database", "g9web");
// 本地連對外資料庫資訊
// define("DB_Host", "192.168.1.100");
// define("DB_PORT", "3306");
// define("DB_User", "calvin");
// define("DB_PWD", "Calvin@03");
// define("DB_Database", "g9web");
// 本地連對外資料庫資訊
// define("DB_Host", "192.168.1.100");
// define("DB_PORT", "3306");
// define("DB_User", "calvin");
// define("DB_PWD", "Calvin@03");
// define("DB_Database", "investors");

// define("PDO_DB_Conn", "mysql:dbname=" . DB_Database . ";host=" . DB_Host . ";port=" . DB_PORT . ";charset=utf8");

// define("pageCharSet", "UTF-8");

// date_default_timezone_set("Asia/Taipei");
// define("dateNow", date("Y-m-d H:i:s" , mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"))));
// define('iframe_mode', isset($_GET['iframe']) && $_GET['iframe'] === 'true');

$host = '192.168.1.100';
$dbuser ='calvin';
$dbpassword = 'Calvin@03';
$dbname = 'investors';
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbuser, $dbpassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

