<?php
require 'head.php';
require 'sidebar.php';
require 'web_config.php';

$id = $_GET['id'];
$sql = " select * from conference where id=$id ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!--begin::Quick Example-->
<div class="card card-primary card-outline mb-4">
    <!--begin::Header-->
    <div class="card-header"><div class="card-title">編輯</div></div>
    <!--end::Header-->
    <!--begin::Form-->
    <form action="conference_edit_1.php" method="post" enctype="multipart/form-data">
    <!--begin::Body-->
    <div class="card-body">
        <input type="id" name="id" class="form-control" hidden="hidden" value="<?php echo $id; ?>"/>
        <div class="mb-3">
        <label class="form-label">年度</label>
        <input name="years" class="form-control" value="<?php echo $rs[0]['years']; ?>"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">時間</label>
        <input name="date" class="form-control" value="<?php echo $rs[0]['date']; ?>"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">地點</label>
        <input name="location" class="form-control" value="<?php echo $rs[0]['location']; ?>"/>
        </div>
        <div class="input-group mb-3">
        <label  class="form-label">檔案(中)</label>
        <input type="file" class="form-control" id="inputGroupFile02" name="file_cn"/>
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>
        <?php if(!empty($rs[0]['link_cn'])){ ?>
        <a href='<?php echo $rs[0]['link_cn']; ?>' target='_blank'>檔案預覽(中)</a>
        <?php } ?>
        <div class="input-group mb-3">
        <label  class="form-label">檔案(英)</label>
        <input type="file" class="form-control" id="inputGroupFile02" name="file_en"/>
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>
        <?php if(!empty($rs[0]['link_en'])){ ?>
        <a href='<?php echo $rs[0]['link_en']; ?>' target='_blank'>檔案預覽(英)</a>
        <?php } ?>
        <div class="mb-3">
        <label  class="form-label">影音連結</label>
        <input name="link_video" class="form-control" value="<?php echo $rs[0]['link_video']; ?>"/>
        </div>
        <!-- <div class="mb-3 form-check">
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