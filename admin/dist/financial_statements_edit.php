<?php
require 'head.php';
require 'sidebar.php';
require 'web_config.php';

$id = $_GET['id'];
$sql = " select * from financial_statements where id=$id ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!--begin::Quick Example-->
<div class="card card-primary card-outline mb-4">
    <!--begin::Header-->
    <div class="card-header"><div class="card-title">編輯</div></div>
    <!--end::Header-->
    <!--begin::Form-->
    <form action="financial_statements_edit_1.php" method="post" enctype="multipart/form-data">
    <!--begin::Body-->
    <div class="card-body">
        <input type="id" name="id" class="form-control" hidden="hidden" value="<?php echo $id; ?>"/>
        <div class="mb-3">
        <label class="form-label">項目</label>
        <input name="years" class="form-control" value="<?php echo $rs[0]['years']; ?>"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">名稱</label>
        <input name="quarterly" class="form-control" value="<?php echo $rs[0]['quarterly']; ?>"/>
        </div>
        <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="file"/>
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>
        <?php if(isset($rs[0]['link_url'])){ ?>
        <a href='<?php echo $rs[0]['link_url']; ?>' target='_blank'>檔案預覽</a>
        <?php } ?>
        <!-- <div class="mb-3 form-check">
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