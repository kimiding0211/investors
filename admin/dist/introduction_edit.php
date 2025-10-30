<?php
require 'head.php';
require 'sidebar.php';
require 'web_config.php';

$id = $_GET['id'];
$sql = " select * from introduction where id=$id ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!--begin::Quick Example-->
<div class="card card-primary card-outline mb-4">
    <!--begin::Header-->
    <div class="card-header"><div class="card-title">基本資料編輯</div></div>
    <!--end::Header-->
    <!--begin::Form-->
    <form action="introduction_edit_1.php" method="post">
    <!--begin::Body-->
    <div class="card-body">
        <input type="id" name="id" class="form-control" hidden="hidden" value="<?php echo $id; ?>"/>
        <div class="mb-3">
        <label class="form-label">公司名稱</label>
        <input name="name" class="form-control" value="<?php echo $rs[0]['name']; ?>"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">英文全名</label>
        <input name="name_en" class="form-control" value="<?php echo $rs[0]['name_en']; ?>"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">股票代號</label>
        <input name="code" class="form-control" value="<?php echo $rs[0]['code']; ?>"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">交易市場</label>
        <input name="market" class="form-control" value="<?php echo $rs[0]['market']; ?>"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">產業別</label>
        <input name="industry" class="form-control" value="<?php echo $rs[0]['industry']; ?>"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">成立日期</label>
        <input name="date_of_establishment" class="form-control" value="<?php echo $rs[0]['date_of_establishment']; ?>"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">上櫃日期</label>
        <input name="otc_listing_date" class="form-control" value="<?php echo $rs[0]['otc_listing_date']; ?>"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">實收資本額</label>
        <input name="paid_in_capital" class="form-control" value="<?php echo $rs[0]['paid_in_capital']; ?>"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">股票過戶機構</label>
        <input name="stock_transfer_agency" class="form-control" value="<?php echo $rs[0]['stock_transfer_agency']; ?>"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">簽證會計師</label>
        <input name="visa_accountant" class="form-control" value="<?php echo $rs[0]['visa_accountant']; ?>"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">董事長</label>
        <input name="chairman" class="form-control" value="<?php echo $rs[0]['chairman']; ?>"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">總經理</label>
        <input name="president" class="form-control" value="<?php echo $rs[0]['president']; ?>"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">發言人</label>
        <input name="spokesman" class="form-control" value="<?php echo $rs[0]['spokesman']; ?>"/>
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
        <a href="introduction.php" class="btn btn-primary">返回</a>
    </div>
    <!--end::Footer-->
    </form>
    <!--end::Form-->
</div>
<!--end::Quick Example-->

<?php
require 'footer.php';
?>