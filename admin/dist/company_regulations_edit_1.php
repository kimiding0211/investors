<?php
require 'head.php';
require 'sidebar.php';
require 'web_config.php';

$file_status = 1;

if(!empty($_FILES['file']['name'])){
    $file = $_FILES['file'];
    $fileName_str = explode(".", $file['name']);
    $fileName = $_POST['title'].'.'.$fileName_str[1];
    $tmpPath = $file['tmp_name'];

    $uploadDir = __DIR__ . '/images/company_regulations/';
    $destination = $uploadDir . $fileName;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); 
    }

    if (move_uploaded_file($file['tmp_name'], $destination)) {
        $file_status = 1;
    }else{
        $file_status = 0;
    }
}

if ($file_status) {
    $id = $_POST['id'];
    $project_name = $_POST['project_name'];
    $title = $_POST['title'];
    
    $sql = " select * from sustainability_reports where id=$id ";
    $result = $pdo->query($sql);
    $rs = $result->fetchAll(PDO::FETCH_ASSOC);

    if(!empty($fileName)){
        $link_url = 'http://'.$_SERVER['SERVER_NAME'].'/admin/dist/images/company_regulations/'.$fileName;
    }else{
        if($rs[0]['link_url']){
            $link_url = $rs[0]['link_url'];
        }else{
            $link_url = '';
        }
    }

    $sql = " update company_regulations set project_name='$project_name', title='$title', link_url='$link_url'
            where id=$id ";

    $pdo->query($sql);
    echo "<script>alert('資料已更新');window.location.href='company_regulations.php';</script>";
}else{
    echo "<script>alert('上傳失敗');window.location.href='company_regulations.php';</script>";
}



require 'footer.php';
?>