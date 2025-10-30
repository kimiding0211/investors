<?php
require 'head.php';
require 'sidebar.php';
require 'web_config.php';

$admin_id = $_GET['id'];
$sql = " select * from admin where id=$admin_id ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!--begin::Quick Example-->
<div class="card card-primary card-outline mb-4">
    <!--begin::Header-->
    <div class="card-header"><div class="card-title">用戶編輯</div></div>
    <!--end::Header-->
    <!--begin::Form-->
    <form action="admin_user_edit_1.php" method="post">
    <!--begin::Body-->
    <div class="card-body">
        <input type="id" name="id" class="form-control" hidden="hidden" value="<?php echo $admin_id; ?>"/>
        <div class="mb-3">
        <label class="form-label">名稱</label>
        <input type="name" name="user_name" class="form-control" value="<?php echo $rs[0]['name']; ?>"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">密碼</label>
        <input type="password" name="old_pwd" class="form-control" hidden="hidden" value="<?php echo $rs[0]['password']; ?>"/>
        <input type="password" name="user_pwd" class="form-control" value="<?php echo $rs[0]['password']; ?>"/>
        </div>
        <div class="mb-3">
        <label class="form-label">權限</label>
        <input name="permissions" class="form-control" value="<?php echo $rs[0]['permissions']; ?>" <?php if($rs[0]['permissions']!='superadmin'){echo 'readonly';} ?>/>
        </div>
        <div class="mb-3">
        <label  class="form-label">狀態</label>
    
        <select name="status">
            <option value="1" <?php if($rs[0]['status']==1){echo 'selected';} ?>>啟用</option>
            <option value="0" <?php if($rs[0]['status']==0){echo 'selected';} ?>>停用</option>
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
        <button type="submit" class="btn btn-primary">送出</button>
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