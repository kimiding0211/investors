<?php
require 'web_config.php';
require 'head.php';
require 'common.php';
require 'sidebar.php';

$sql = " select * from banner order by id desc ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="row">
    <div class="col-md-6" style="width:100%">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">首頁管理-大圖輪播</h3>
                <div class="text-end">
                    <a href="banner_ins.php" class="btn">
                        <button type="submit" class="btn btn-primary" name="save" value="create">新增</button>
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">id</th>
                    <th>名稱</th>
                    <th>排序</th>
                    <th style="width: 40px">狀態</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php for($i=0;$i<count($rs);$i++){ ?>
                <tr class="align-middle">
                    <td><?php echo $rs[$i]['id']; ?></td>
                    <td><?php echo $rs[$i]['title']; ?></td>
                    <td><?php echo $rs[$i]['sort']; ?></td>
                    <?php if($rs[$i]['status']==1){ ?>
                    <td><span class="badge text-bg-success">啟用</span></td>
                    <?php }else{ ?>
                    <td><span class="badge text-bg-danger">停用</span></td>
                    <?php } ?>
                    <td>
                        <a href="banner_edit.php?id=<?php echo $rs[$i]['id'];  ?>" class="btn"  style="width=11%">
                            <button class="btn btn-primary" name="save">編輯</button>
                        </a>
                        <?php if(isset($rs[$i]['link_url'])){ ?>
                        <a href='<?php echo $rs[$i]['link_url']; ?>' target='_blank'>檔案預覽</a>
                        <?php } ?>
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