<?php
// save_content.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'] ?? '';
    file_put_contents('content.html', $content);
    echo "<p>✅ 內容已儲存成功！</p>";
    echo "<a href='environmental_sustainability_edit.php'>返回編輯頁</a>";
}
