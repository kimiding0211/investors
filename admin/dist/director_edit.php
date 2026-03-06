<?php
require 'head.php';
require 'common.php';
require 'sidebar.php';
require 'web_config.php';

$id = $_GET['id'];
$sql = " select * from director where id=$id ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!--begin::Quick Example-->
<div class="card card-primary card-outline mb-4">
    <!--begin::Header-->
    <div class="card-header"><div class="card-title">編輯</div></div>
    <!--end::Header-->
    <!--begin::Form-->
    <form action="director_edit_1.php" method="post">
    <!--begin::Body-->
    <div class="card-body">
        <input type="id" name="id" class="form-control" hidden="hidden" value="<?php echo $id; ?>"/>
        <div class="mb-3">
        <label class="form-label">第幾屆</label>
        <input name="years" class="form-control" value="<?php echo $rs[0]['years']; ?>"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">身份別</label>
        <input name="identity" class="form-control" value="<?php echo $rs[0]['identity']; ?>"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">身份別(英)</label>
        <input name="identity_en" class="form-control" value="<?php echo $rs[0]['identity_en']; ?>"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">姓名</label>
        <input name="name" class="form-control" value="<?php echo $rs[0]['name']; ?>"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">姓名(英)</label>
        <input name="name_en" class="form-control" value="<?php echo $rs[0]['name_en']; ?>"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">排序</label>
        <input name="sort" class="form-control" value="<?php echo $rs[0]['sort']; ?>"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">主要經(學)歷</label>
        <textarea id="editor" name="main_experience"><?php echo $rs[0]['main_experience']; ?></textarea>
        </div>
        <div class="mb-3">
        <label  class="form-label">主要經(學)歷(英)</label>
        <textarea id="editor2" name="main_experience_en"><?php echo $rs[0]['main_experience_en']; ?></textarea>
        </div>
        <div class="mb-3">
        <label  class="form-label">目前兼任本公司及其他公司之職務</label>
        <textarea id="editor1" name="currently_serving"><?php echo $rs[0]['currently_serving']; ?></textarea>
        </div>
        <div class="mb-3">
        <label  class="form-label">目前兼任本公司及其他公司之職務(英)</label>
        <textarea id="editor3" name="currently_serving_en"><?php echo $rs[0]['currently_serving_en']; ?></textarea>
        </div>
        <?php if($_SESSION['admin_permissions']=='admin' || $_SESSION['admin_permissions']=='editor'){ ?>
        <div class="mb-3">
        <label  class="form-label">狀態</label>
        <select name="status">
            <option value="1" <?php if($rs[0]['status']==1){echo 'selected';} ?>>啟用</option>
            <option value="0" <?php if($rs[0]['status']==0){echo 'selected';} ?>>停用</option>
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
    $('#editor2').trumbowyg({
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
    $('#editor3').trumbowyg({
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
</script>