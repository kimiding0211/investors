<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'head.php';
require 'sidebar.php';
require 'web_config.php';

// 檢查是否有送出表單
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file_status_cn = 1;
    $file_status_en = 1;

    if(!empty($_FILES['file_cn']['name'])){
        $file = $_FILES['file_cn'];
        $fileName_str = explode(".", $file['name']);
        $fileName_cn = $_POST['years'].'法人說明會.'.$fileName_str[1];
        $tmpPath = $file['tmp_name'];

        $uploadDir = __DIR__ . '/images/conference/'.$_POST['years'].'/';
        $destination = $uploadDir . $fileName_cn;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); 
        }

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            $file_status_cn = 1;
        }else{
            $file_status_cn = 0;
        }
    }

    if(!empty($_FILES['file_en']['name'])){
        $file = $_FILES['file_en'];
        $fileName_str = explode(".", $file['name']);
        $fileName_en = $_POST['years'].'法人說明會.'.$fileName_str[1];
        $tmpPath = $file['tmp_name'];

        $uploadDir = __DIR__ . '/images/conference/'.$_POST['years'].'/';
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

    if ($file_status_cn && $file_status_en) {
        $years = $_POST['years'];
        $date = $_POST['date'];
        $location = $_POST['location'];
        $link_video = $_POST['link_video'];
        $link_cn = (!empty($fileName_cn)) ? 'http://investorst.interserv.com.tw/admin/dist/images/conference/'.$years.'/'.$fileName_cn : '';
        $link_en = (!empty($fileName_en)) ? 'http://investorst.interserv.com.tw/admin/dist/images/conference/'.$years.'/'.$fileName_en : '';

        $sql = " insert into conference set years='$years', date='$date', location='$location', link_video='$link_video', link_cn='$link_cn', link_en='$link_en' ";
        $pdo->query($sql);
        echo "<script>alert('資料已新增');window.location.href='conference.php';</script>";
    }else{
        echo "<script>alert('上傳失敗');window.location.href='conference.php';</script>";
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
        <label  class="form-label">時間</label>
        <input name="date" class="form-control"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">地點</label>
        <input name="location" class="form-control"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">檔案連結(中)</label>
        <input type="file" class="form-control" id="inputGroupFile01" name="file_cn"/>
        <label class="input-group-text" for="inputGroupFile01">Upload</label>
        </div>
        <div class="mb-3">
        <label  class="form-label">檔案連結(英)</label>
        <input type="file" class="form-control" id="inputGroupFile02" name="file_en"/>
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>
        <div class="mb-3">
        <label  class="form-label">影音連結</label>
        <input name="link_video" class="form-control"/>
        </div>
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
        <a href="conference.php" class="btn btn-primary">返回</a>
    </div>
    <!--end::Footer-->
    </form>
    <!--end::Form-->
</div>
<!--end::Quick Example-->

<?php
require 'footer.php';
?>