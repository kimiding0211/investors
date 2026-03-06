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
    $file_status_en = 1;

    if(!empty($_FILES['file']['name'])){
        $file = $_FILES['file'];
        $fileName_str = explode(".", $file['name']);
        $fileName = $_POST['quarterly'].'.'.$fileName_str[1];
        $tmpPath = $file['tmp_name'];

        $uploadDir = __DIR__ . '/images/financial_statements/'.$_POST['years'].'/';
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

    if(!empty($_FILES['file_en']['name'])){
        $file = $_FILES['file_en'];
        $fileName_str = explode(".", $file['name']);
        $fileName_en = $_POST['quarterly'].'_en.'.$fileName_str[1];
        $tmpPath = $file['tmp_name'];

        $uploadDir = __DIR__ . '/images/financial_statements/'.$_POST['years'].'/';
        $destination = $uploadDir . $fileName_en;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); 
        }

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            $file_status_en = 1;
        }else{
            $file_status_en = 0;
        }
    }

    if ($file_status && $file_status_en) {
        $years = $_POST['years'];
        $quarterly = $_POST['quarterly'];
        if(!empty($_POST['status'])){
            $status = $_POST['status'];
        }else{
            $status = 0;
        }

        $sql = " insert into financial_statements set years='$years', quarterly='$quarterly', status=$status ";
        
        if(!empty($fileName)){
            $link_url = "http://".$_SERVER['SERVER_NAME']."/admin/dist/images/financial_statements/$years/$fileName";
            $sql.= " , link_url='$link_url' ";
        }

        if(!empty($fileName_en)){
            $link_en = 'http://'.$_SERVER['SERVER_NAME'].'/admin/dist/images/financial_statements/'.$years.'/'.$fileName_en;
            $sql.= " , link_en='$link_en' ";
        }
        
        $pdo->query($sql);

        $admin = $_SESSION['admin_name'];
        $now = date("Y-m-d H:i:s");
        $sql = " insert into ins_log set user='$admin', menu='新增財務報表', datetime='$now' ";
        $pdo->query($sql);
        echo "<script>alert('資料已新增');window.location.href='financial_statements.php';</script>";
    }else{
        echo "<script>alert('上傳失敗');window.location.href='financial_statements.php';</script>";
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
        <label class="form-label">年度</label>
        <input name="years" class="form-control"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">季度</label>
        <select name="quarterly">
            <option value="Q1">Q1</option>
            <option value="Q2">Q2</option>
            <option value="Q3">Q3</option>
            <option value="Q4">Q4</option>
        </select>
        </div>
        <div class="mb-3">
        <label  class="form-label">檔案(中)</label>
        <input type="file" class="form-control" id="inputGroupFile01" name="file"/>
        <label class="input-group-text" for="inputGroupFile01">Upload</label>
        </div>
        <div class="mb-3">
        <label  class="form-label">檔案(英)</label>
        <input type="file" class="form-control" id="inputGroupFile01" name="file_en"/>
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
        <a href="financial_statements.php" class="btn btn-primary">返回</a>
    </div>
    <!--end::Footer-->
    </form>
    <!--end::Form-->
</div>
<!--end::Quick Example-->

<?php
require 'footer.php';
?>