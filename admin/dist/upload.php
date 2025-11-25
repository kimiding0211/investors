<?php
header('Content-Type: application/json');

if (!isset($_FILES['upload'])) {
    echo json_encode(['success' => false, 'error' => '未接收到 upload 檔案']);
    exit;
}

$file = $_FILES['upload'];

// ---- 1. 檢查錯誤 ----
if ($file['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['success' => false, 'error' => '上傳錯誤 code: ' . $file['error']]);
    exit;
}

// ---- 2. 確認 tmp 檔存在 ----
if (!is_uploaded_file($file['tmp_name'])) {
    echo json_encode(['success' => false, 'error' => '暫存檔不存在']);
    exit;
}

// ---- 3. 確保 uploads 目錄存在 ----
$uploadDir = __DIR__ . '/uploads/';

if (!is_dir($uploadDir)) {
    if (!mkdir($uploadDir, 0777, true)) {
        echo json_encode(['success' => false, 'error' => '無法建立 uploads 目錄']);
        exit;
    }
}

if (!is_writable($uploadDir)) {
    echo json_encode(['success' => false, 'error' => 'uploads 目錄無法寫入']);
    exit;
}

// ---- 4. 新檔名 ----
$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
$newName = 'img_' . uniqid() . '.' . $ext;
$destination = $uploadDir . $newName;

// ---- 5. 移動檔案 ----
if (!move_uploaded_file($file['tmp_name'], $destination)) {
    echo json_encode(['success' => false, 'error' => 'move_uploaded_file 失敗']);
    exit;
}

// ---- 6. 回傳 URL ----
$baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$fileUrl = $baseUrl . '/uploads/' . $newName;

echo json_encode([
    'success' => true,
    'url' => $fileUrl
]);
