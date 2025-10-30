<?php
require 'web_config.php';
require 'head.php';
require 'sidebar.php';

$sql = " select * from shareholders_meeting ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="row">
    <div class="col-md-6" style="width:100%">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">股務資訊-股東會</h3>
                <div class="text-end">
                    <a href="shareholders_meeting_ins.php" class="btn">
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
                    <th>股東會</th>
                    <th>時間</th>
                    <th>地點</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php for($i=0;$i<count($rs);$i++){ ?>
                <tr class="align-middle">
                    <td><?php echo $rs[$i]['id']; ?></td>
                    <td><?php echo $rs[$i]['name']; ?></td>
                    <td><?php echo $rs[$i]['date']; ?></td>
                    <td><?php echo $rs[$i]['location']; ?></td>
                    <td>
                        <?php if(!empty($rs[$i]['meeting_notice'])){ ?>
                        <a href='<?php echo $rs[$i]['meeting_notice']; ?>' target='_blank'>開會通知書</a>
                        <?php } ?>
                        <?php if(!empty($rs[$i]['meeting_procedure_manual'])){ ?>
                        <a href='<?php echo $rs[$i]['meeting_procedure_manual']; ?>' target='_blank'>議事手冊</a>
                        <?php } ?>
                        <?php if(!empty($rs[$i]['major_shareholders'])){ ?>
                        <a href='<?php echo $rs[$i]['major_shareholders']; ?>' target='_blank'>主要股東名單</a>
                        <?php } ?>
                        <?php if(!empty($rs[$i]['annual_report'])){ ?>
                        <a href='<?php echo $rs[$i]['annual_report']; ?>' target='_blank'>股東會年報</a>
                        <?php } ?>
                        <?php if(!empty($rs[$i]['minutes'])){ ?>
                        <a href='<?php echo $rs[$i]['minutes']; ?>' target='_blank'>股東會議事錄</a>
                        <?php } ?>
                    </td>
                    <td>
                        <a href="shareholders_meeting_edit.php?id=<?php echo $rs[$i]['id'];  ?>" class="btn"  style="width=11%">
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