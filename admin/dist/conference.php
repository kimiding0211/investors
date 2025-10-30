<?php
require 'web_config.php';
require 'head.php';
require 'sidebar.php';

$sql = " select * from conference ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="row">
    <div class="col-md-6" style="width:100%">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">財務資訊-法人說明會資訊</h3>
                <div class="text-end">
                    <a href="conference_ins.php" class="btn">
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
                    <th>年度</th>
                    <th>時間</th>
                    <th>地點</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php for($i=0;$i<count($rs);$i++){ ?>
                <tr class="align-middle">
                    <td><?php echo $rs[$i]['id']; ?></td>
                    <td><?php echo $rs[$i]['years']; ?></td>
                    <td><?php echo $rs[$i]['date']; ?></td>
                    <td><?php echo $rs[$i]['location']; ?></td>
                    <td>
                        <a href="conference_edit.php?id=<?php echo $rs[$i]['id'];  ?>" class="btn"  style="width=11%">
                            <button class="btn btn-primary" name="save">編輯</button>
                        </a>
                        <?php if(!empty($rs[$i]['link_cn'])){ ?>
                        <a href='<?php echo $rs[$i]['link_cn']; ?>' target='_blank'>檔案預覽(中)</a>
                        <?php } ?>
                        <?php if(!empty($rs[$i]['link_en'])){ ?>
                        <a href='<?php echo $rs[$i]['link_en']; ?>' target='_blank'>檔案預覽(英)</a>
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