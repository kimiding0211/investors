<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'head.php';
require 'common.php';
require 'sidebar.php';
require 'web_config.php';

// 檢查是否有送出表單
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file_status = 1;

    if(!empty($_FILES['file']['name'])){
        $file = $_FILES['file'];
        $fileName_str = explode(".", $file['name']);
        $fileName = $_POST['title'].'.'.$fileName_str[1];
        $tmpPath = $file['tmp_name'];

        $uploadDir = __DIR__ . '/images/sustainability_reports/';
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
        $project_name = $_POST['project_name'];
        $title = $_POST['title'];
        if(!empty($_POST['status'])){
            $status = $_POST['status'];
        }else{
            $status = 0;
        }
        
        $sql = " insert into sustainability_reports set project_name='$project_name', title='$title', status=$status ";
        
        if(!empty($fileName)){
            $link_url = 'http://'.$_SERVER['SERVER_NAME'].'/admin/dist/images/sustainability_reports/'.$fileName;
            $sql.= " , link_url='$link_url' ";
        }
        
        $pdo->query($sql);

        $admin = $_SESSION['admin_name'];
        $now = date("Y-m-d H:i:s");
        $sql = " insert into ins_log set user='$admin', menu='新增永續報告與發展政策', datetime='$now' ";
        $pdo->query($sql);
        echo "<script>alert('資料已新增');window.location.href='sustainability_reports.php';</script>";
    }else{
        echo "<script>alert('上傳失敗');window.location.href='sustainability_reports.php';</script>";
    }
}
?>

<!--begin::Quick Example-->
<div class="card card-primary card-outline mb-4">
    <!--begin::Header-->
    <div class="card-header"><div class="card-title">新增</div></div>
    <!--end::Header-->
    <!--begin::Form-->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
    <!--begin::Body-->
    <div class="card-body">
        <div class="mb-3">
        <label class="form-label">項目</label>
        <select name="project_name">
            <option value="永續報告書">永續報告書</option>
            <option value="重要報告">重要報告</option>
        </select>
        </div>
        <div class="mb-3">
        <label  class="form-label">名稱</label>
        <input name="title" class="form-control"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">檔案</label>
        <input type="file" class="form-control" id="inputGroupFile01" name="file"/>
        <label class="input-group-text" for="inputGroupFile01">Upload</label>
        </div>
        <?php if($_SESSION['admin_permissions']=='admin' || $_SESSION['admin_permissions']=='editor'){ ?>
        <div class="mb-3">
        <label  class="form-label">狀態</label>
        <select name="status">
            <option value="1">啟用</option>
            <option value="0">停用</option>
        </select>
        </div>
        <?php } ?>
        <!-- <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" />
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>
        <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" />
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
    </div>
    <!--end::Body-->
    <!--begin::Footer-->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">送出</button>
        <a href="sustainability_reports.php" class="btn btn-primary">返回</a>
    </div>
    <!--end::Footer-->
    </form>
    <!--end::Form-->
</div>
<!--end::Quick Example-->

<?php
require 'footer.php';
?>