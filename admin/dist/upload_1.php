<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// upload.php
header('Content-Type: application/json; charset=utf-8');

// 檢查是否有上傳檔案
if (!isset($_FILES['upload'])) {
    echo json_encode(['error' => ['message' => '沒有收到檔案']]);
    exit;
}

$file = $_FILES['upload'];
if ($file['error'] !== 0) {
    echo json_encode(['error' => ['message' => '上傳錯誤代碼: ' . $file['error']]]);
    exit;
}

// 確認上傳資料夾存在
$uploadDir = __DIR__ . '/uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// 產生新檔名
$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
$filename = uniqid('img_') . '.' . strtolower($ext);
$targetPath = $uploadDir . $filename;

// 儲存檔案
if (move_uploaded_file($file['tmp_name'], $targetPath)) {
    //  CKEditor 要求回傳格式：
    echo json_encode([
        "uploaded" => true,
        "url" => 'http://'.$_SERVER['SERVER_NAME'].'/investors/admin/dist/uploads/'.$filename
    ]);
} else {
    echo json_encode(['error' => ['message' => '無法儲存檔案']]);
}
