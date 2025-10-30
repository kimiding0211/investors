<?php
require 'head.php';
require 'sidebar.php';
require 'web_config.php';

// 檢查是否有送出表單
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $years = $_POST['years'];
    $identity = $_POST['identity'];
    $name = $_POST['name'];
    $main_experience = $_POST['main_experience'];
    $election_date = $_POST['election_date'];

    $sql = " insert into remuneration set years=$years, identity='$identity', name='$name', main_experience='$main_experience', election_date='$election_date' ";

    $pdo->query($sql);
    echo "<script>alert('資料已新增');window.location.href='remuneration.php';</script>";
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
        <label  class="form-label">姓名</label>
        <input name="name" class="form-control"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">主要經(學)歷</label>
        <input name="main_experience" class="form-control"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">選任日期</label>
        <input name="election_date" class="form-control"/>
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
        <a href="remuneration.php" class="btn btn-primary">返回</a>
    </div>
    <!--end::Footer-->
    </form>
    <!--end::Form-->
</div>
<!--end::Quick Example-->

<?php
require 'footer.php';
?>