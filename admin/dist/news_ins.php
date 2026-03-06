<?php
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

        $uploadDir = __DIR__ . '/images/news/';
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
        $mark_id = $_POST['mark_id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $post_date = $_POST['post_date'];
        if(!empty($_POST['status'])){
            $status = $_POST['status'];
        }else{
            $status = 0;
        }

        $link_url = (!empty($fileName)) ? 'http://'.$_SERVER['SERVER_NAME'].'/admin/dist/images/news/'.$fileName : '';

        $sql = " insert into news set mark_id='$mark_id', title='$title', content='$content', post_date='$post_date', status='$status' ";
        
        if(!empty($fileName)){
            $link_url = 'http://'.$_SERVER['SERVER_NAME'].'/admin/dist/images/news/'.$fileName;
            $sql.= " , link_url='$link_url' ";
        }
        
        $pdo->query($sql);

        $admin = $_SESSION['admin_name'];
        $now = date("Y-m-d H:i:s");
        $sql = " insert into ins_log set user='$admin', menu='新增消息', datetime='$now' ";
        $pdo->query($sql);
        echo "<script>alert('資料已新增');window.location.href='news.php';</script>";
    }else{
        echo "<script>alert('上傳失敗');window.location.href='news.php';</script>";
    }
}
?>

<!--begin::Quick Example-->
<div class="card card-primary card-outline mb-4">
    <!--begin::Header-->
    <div class="card-header"><div class="card-title">新增</div></div>
    <!--end::Header-->
    <!--begin::Form-->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <!--begin::Body-->
    <div class="card-body">
        <div class="mb-3">
        <label class="form-label">分類</label>
        <select name="mark_id">
            <?php
            $sql = " select * from news_mark ";
            $result = $pdo->query($sql);
            $rs = $result->fetchAll(PDO::FETCH_ASSOC);

            for($i=0;$i<count($rs);$i++){
            ?>
            <option value="<?php echo $rs[$i]['id'] ?>"><?php echo $rs[$i]['mark_name'] ?></option>
            <?php } ?>
        </select>
        </div>
        <div class="mb-3">
        <label  class="form-label">標題</label>
        <input name="title" class="form-control"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">內文</label>
        <textarea id="editor" name="content" style="width: 700px"></textarea>
        </div>
        <div class="mb-3">
        <label  class="form-label">檔案上傳</label>
        <input type="file" class="form-control" id="inputGroupFile01" name="file"/>
        <label class="input-group-text" for="inputGroupFile01">Upload</label>
        </div>
         <div class="mb-3">
        <label  class="form-label">發布時間</label>
        <input id="datetime" name="post_date" class="form-control"/>
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
        <a href="director.php" class="btn btn-primary">返回</a>
    </div>
    <!--end::Footer-->
    </form>
    <!--end::Form-->
</div>
<!--end::Quick Example-->

<?php
require 'footer.php';
?>
<script>
    $('#editor').trumbowyg({
        btns: [
            ['viewHTML'],
            // ['fontsize'],
            ['strong', 'em', 'del', 'underline'],
            ['link', 'upload'],
            ['justifyLeft', 'justifyCenter', 'justifyRight'],
            ['unorderedList', 'orderedList'],
            ['horizontalRule'],
            ['foreColor', 'backColor'],
            // ['table'],
        ],
        plugins: {
            upload: {
                serverPath: 'upload.php', // 你自己的圖片上傳 API
                fileFieldName: 'upload',
                urlPropertyName: 'url' // upload.php 回傳 JSON 裡的圖片網址 key
            }
        }
    });

    flatpickr("#datetime", {
		enableTime: true,
		dateFormat: "Y-m-d H:i",
		time_24hr: true,
		locale: "zh_tw"  // 使用中文
	});
</script>