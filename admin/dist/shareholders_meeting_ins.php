<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'head.php';
require 'sidebar.php';
require 'web_config.php';

// 檢查是否有送出表單
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file_status_meeting_notice = 1;
    $file_status_meeting_procedure_manual = 1;
    $file_status_major_shareholders = 1;
    $file_status_annual_report = 1;
    $file_status_minutes = 1;
    $name = $_POST['name'];

    if(!empty($_FILES['meeting_notice']['name'])){
        $file = $_FILES['meeting_notice'];
        $fileName_str = explode(".", $file['name']);
        $fileName_meeting_notice = '開會通知書.'.$fileName_str[1];
        $tmpPath = $file['tmp_name'];

        $uploadDir = __DIR__ . "/images/shareholders_meeting/$name/";
        $destination = $uploadDir . $fileName_meeting_notice;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); 
        }

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            $file_status_meeting_notice = 1;
        }else{
            $file_status_meeting_notice = 0;
        }
    }

    if(!empty($_FILES['meeting_procedure_manual']['name'])){
        $file = $_FILES['meeting_procedure_manual'];
        $fileName_str = explode(".", $file['name']);
        $fileName_meeting_procedure_manual = '議事手冊.'.$fileName_str[1];
        $tmpPath = $file['tmp_name'];

        $uploadDir = __DIR__ . "/images/shareholders_meeting/$name/";
        $destination = $uploadDir . $fileName_meeting_procedure_manual;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); 
        }

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            $file_status_meeting_procedure_manual = 1;
        }else{
            $file_status_meeting_procedure_manual = 0;
        }
    }

    if(!empty($_FILES['major_shareholders']['name'])){
        $file = $_FILES['major_shareholders'];
        $fileName_str = explode(".", $file['name']);
        $fileName_major_shareholders = '主要股東名單.'.$fileName_str[1];
        $tmpPath = $file['tmp_name'];

        $uploadDir = __DIR__ . "/images/shareholders_meeting/$name/";
        $destination = $uploadDir . $fileName_major_shareholders;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); 
        }

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            $file_status_major_shareholders = 1;
        }else{
            $file_status_major_shareholders = 0;
        }
    }

    if(!empty($_FILES['annual_report']['name'])){
        $file = $_FILES['annual_report'];
        $fileName_str = explode(".", $file['name']);
        $fileName_annual_report = '股東會年報.'.$fileName_str[1];
        $tmpPath = $file['tmp_name'];

        $uploadDir = __DIR__ . "/images/shareholders_meeting/$name/";
        $destination = $uploadDir . $fileName_annual_report;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); 
        }

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            $file_status_annual_report = 1;
        }else{
            $file_status_annual_report = 0;
        }
    }

    if(!empty($_FILES['minutes']['name'])){
        $file = $_FILES['minutes'];
        $fileName_str = explode(".", $file['name']);
        $fileName_minutes ='股東會議事錄.'.$fileName_str[1];
        $tmpPath = $file['tmp_name'];

        $uploadDir = __DIR__ . "/images/shareholders_meeting/$name/";
        $destination = $uploadDir . $fileName_minutes;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); 
        }

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            $file_status_minutes = 1;
        }else{
            $file_status_minutes = 0;
        }
    }

    if ($file_status_meeting_notice && $file_status_meeting_procedure_manual && $file_status_major_shareholders && $file_status_annual_report && $file_status_minutes) {
        $name = $_POST['name'];
        $date = $_POST['date'];
        $location = $_POST['location'];
        $link_video = $_POST['link_video'];
        $meeting_notice = (!empty($fileName_meeting_notice)) ? "http://investorst.interserv.com.tw/admin/dist/images/shareholders_meeting/$name/".$fileName_meeting_notice : '';
        $meeting_procedure_manual = (!empty($fileName_meeting_procedure_manual)) ? "http://investorst.interserv.com.tw/admin/dist/images/shareholders_meeting/$name/".$fileName_meeting_procedure_manual : '';
        $major_shareholders = (!empty($fileName_major_shareholders)) ? "http://investorst.interserv.com.tw/admin/dist/images/shareholders_meeting/$name/".$fileName_major_shareholders : '';
        $annual_report = (!empty($fileName_annual_report)) ? "http://investorst.interserv.com.tw/admin/dist/images/shareholders_meeting/$name/".$fileName_annual_report : '';
        $minutes = (!empty($fileName_minutes)) ? "http://investorst.interserv.com.tw/admin/dist/images/shareholders_meeting/$name/".$fileName_minutes : '';

        $sql = " insert into shareholders_meeting set name='$name', date='$date', location='$location', link_video='$link_video',
                 meeting_notice='$meeting_notice', meeting_procedure_manual='$meeting_procedure_manual', major_shareholders='$major_shareholders', 
                 annual_report='$annual_report', minutes='$minutes' ";
        $pdo->query($sql);
        echo "<script>alert('資料已新增');window.location.href='shareholders_meeting.php';</script>";
    }else{
        echo "<script>alert('上傳失敗');window.location.href='shareholders_meeting.php';</script>";
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
        <label class="form-label">股東會</label>
        <input name="name" class="form-control"/>
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
        <label  class="form-label">開會通知書</label>
        <input type="file" class="form-control" id="inputGroupFile01" name="meeting_notice"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">議事手冊</label>
        <input type="file" class="form-control" id="inputGroupFile02" name="meeting_procedure_manual"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">主要股東名單</label>
        <input type="file" class="form-control" id="inputGroupFile02" name="major_shareholders"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">股東會年報</label>
        <input type="file" class="form-control" id="inputGroupFile02" name="annual_report"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">股東會議事錄</label>
        <input type="file" class="form-control" id="inputGroupFile02" name="minutes"/>
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
        <a href="shareholders_meeting.php" class="btn btn-primary">返回</a>
    </div>
    <!--end::Footer-->
    </form>
    <!--end::Form-->
</div>
<!--end::Quick Example-->

<?php
require 'footer.php';
?>