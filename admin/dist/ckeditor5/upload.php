<?php
$targetDir = __DIR__ . '/uploads/';
if (!file_exists($targetDir)) mkdir($targetDir, 0777, true);
if (!isset($_FILES['upload'])) { http_response_code(400); echo json_encode(['error'=>'No file']); exit; }
$file = $_FILES['upload'];
$basename = preg_replace('/[^A-Za-z0-9._-]/','_', basename($file['name']));
$filename = time().'_'.$basename;
$target = $targetDir.$filename;
if (!move_uploaded_file($file['tmp_name'],$target)) { http_response_code(500); echo json_encode(['error'=>'Move failed']); exit; }
echo json_encode(['url' => 'uploads/'.$filename]);
?>
