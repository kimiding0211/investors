<?php
require 'web_config.php';
require 'head.php';
require 'common.php';
require 'sidebar.php';

$sql = " select * from introduction ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="row">
    <div class="col-md-6" style="width:100%">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">公司簡介-基本資料</h3>
                <div class="text-end">
                    <!-- <a href="admin_user_ins.php" class="btn">
                        <button type="submit" class="btn btn-primary" name="save" value="create">新增用戶</button>
                    </a> -->
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">id</th>
                    <th>公司名稱</th>
                    <th>英文全名</th>
                    <th>股票代號</th>
                    <th>語言</th>
                    <th style="width: 40px">狀態</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php for($i=0;$i<count($rs);$i++){ ?>
                <tr class="align-middle">
                    <td><?php echo $rs[$i]['id']; ?></td>
                    <td><?php echo $rs[$i]['name']; ?></td>
                    <td><?php echo $rs[$i]['name_en']; ?></td>
                    <td><?php echo $rs[$i]['code']; ?></td>
                    <td><?php echo $rs[$i]['language']; ?></td>
                    <?php if($rs[$i]['status']==1){ ?>
                    <td><span class="badge text-bg-success">啟用</span></td>
                    <?php }else{ ?>
                    <td><span class="badge text-bg-danger">停用</span></td>
                    <?php } ?>
                    <td>
                        <a href="introduction_edit.php?id=<?php echo $rs[$i]['id'];  ?>" class="btn"  style="width=11%">
                            <button class="btn btn-primary" name="save">編輯</button>
                        </a>
                    </td>
                    
                </tr>
                <?php } ?>
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-end">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
            </div> -->
        </div>
    </div>
</div>
<?php
require 'footer.php';
?>