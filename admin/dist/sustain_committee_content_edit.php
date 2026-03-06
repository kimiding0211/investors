<?php
require 'head.php';
require 'common.php';
require 'sidebar.php';
require 'web_config.php';

$id = $_GET['id'];
$sql = " select * from sustain_committee_content where id=$id ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<style>
        #editor {
            min-height: 700px;
            border: 1px solid #ccc;
        }
    </style>
<!--begin::Quick Example-->
<div class="card card-primary card-outline mb-4">
    <!--begin::Header-->
    <div class="card-header"><div class="card-title">編輯</div></div>
    <!--end::Header-->
    <!--begin::Form-->
    <form action="sustain_committee_content_edit_1.php" method="post">
    <!--begin::Body-->
    <div class="card-body">
        <input type="id" name="id" class="form-control" hidden="hidden" value="<?php echo $id; ?>"/>
        <div class="mb-3">
        <label class="form-label">語言</label>
        <input name="code" class="form-control" value="<?php echo $rs[0]['code']; ?>"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">內文</label>
        <textarea id="editor" name="draft" style="width: 700px"><?php echo $rs[0]['draft']; ?></textarea>
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
        <button type="submit" class="btn btn-primary">儲存草稿</button>
        <?php if($_SESSION['admin_permissions']=='admin' || $_SESSION['admin_permissions']=='editor'){ ?>
        <a href="sustain_committee_content_edit_2.php?id=<?php echo $rs[0]['id']; ?>" class="btn btn-primary">發布</a>
        <?php } ?>
        <a href="sustain_committee_content.php" class="btn btn-primary">返回</a>
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
</script>