<?php
require 'head.php';
require 'sidebar.php';
require 'web_config.php';

// 檢查是否有送出表單
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["user_name"]); // 防止 XSS
    $pwd = htmlspecialchars($_POST["user_pwd"]); // 防止 XSS
    $status = htmlspecialchars($_POST["status"]); // 防止 XSS
    $permissions = htmlspecialchars($_POST["permissions"]); // 防止 XSS

    $sql = " select * from admin where name='$name' ";
    $result = $pdo->query($sql);
    $rs = $result->fetchAll(PDO::FETCH_ASSOC);
    if(count($rs)>0){
        echo "<script>alert('帳號已存在');</script>";
    }else{
        $pwd = md5($pwd);
        $sql = " insert into admin set name='$name', password='$pwd', status=$status, permissions='$permissions' ";
        $pdo->query($sql);
        echo "<script>alert('帳號已新增');window.location.href='admin_user.php';</script>";
        // header("Location:admin_user.php");
    }
}
?>

<!--begin::Quick Example-->
<div class="card card-primary card-outline mb-4">
    <!--begin::Header-->
    <div class="card-header"><div class="card-title">新增用戶</div></div>
    <!--end::Header-->
    <!--begin::Form-->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <!--begin::Body-->
    <div class="card-body">
        <div class="mb-3">
        <label class="form-label">名稱</label>
        <input type="name" name="user_name" class="form-control"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">密碼</label>
        <input type="password" name="user_pwd" class="form-control" />
        </div>
        <div class="mb-3">
        <label class="form-label">權限</label>
        <input name="permissions" class="form-control"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">狀態</label>
    
        <select name="status">
            <option value="1">啟用</option>
            <option value="0">停用</option>
        </select>
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
        <button type="submit" class="btn btn-primary">新增</button>
        <a href="admin_user.php" class="btn btn-primary">返回</a>
    </div>
    <!--end::Footer-->
    </form>
    <!--end::Form-->
</div>
<!--end::Quick Example-->

<?php
require 'footer.php';
?>