<?php
require 'head.php';
require 'common.php';
require 'sidebar.php';
require 'web_config.php';

// 檢查是否有送出表單
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $years = $_POST['years'];
    $identity = $_POST['identity'];
    $identity_en = $_POST['identity_en'];
    $name = $_POST['name'];
    $name_en = $_POST['name_en'];
    $main_experience = $_POST['main_experience'];
    $main_experience_en = $_POST['main_experience_en'];
    $election_date = $_POST['election_date'];
    $sort = $_POST['sort'];
    if(!empty($_POST['status'])){
        $status = $_POST['status'];
    }else{
        $status = 0;
    }

    $sql = " insert into audit set years=$years, identity='$identity', identity_en='$identity_en', name='$name', name_en='$name_en', main_experience='$main_experience', main_experience_en='$main_experience_en', election_date='$election_date', sort=$sort, status=$status ";

    $pdo->query($sql);

    $admin = $_SESSION['admin_name'];
    $now = date("Y-m-d H:i:s");
    $sql = " insert into ins_log set user='$admin', menu='新增審計委員會', datetime='$now' ";
    $pdo->query($sql);
    echo "<script>alert('資料已新增');window.location.href='audit.php';</script>";
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
        <label class="form-label">第幾屆</label>
        <input name="years" class="form-control"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">身份別</label>
        <input name="identity" class="form-control"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">身份別(英)</label>
        <input name="identity_en" class="form-control"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">姓名</label>
        <input name="name" class="form-control"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">姓名(英)</label>
        <input name="name_en" class="form-control"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">主要經(學)歷</label>
        <textarea id="editor" name="main_experience"></textarea>
        </div>
        <div class="mb-3">
        <label  class="form-label">主要經(學)歷(英)</label>
        <textarea id="editor1" name="main_experience_en"></textarea>
        </div>
        <div class="mb-3">
        <label  class="form-label">選任日期</label>
        <input id="datetime" name="election_date" class="form-control"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">排序</label>
        <input name="sort" class="form-control"/>
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
        <a href="audit.php" class="btn btn-primary">返回</a>
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

    $('#editor1').trumbowyg({
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

    // flatpickr("#datetime", {
	// 	enableTime: true,
	// 	dateFormat: "Y-m-d",
	// 	time_24hr: true,
	// 	locale: "zh_tw"  // 使用中文
	// });
</script>