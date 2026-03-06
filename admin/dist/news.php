<?php
require 'web_config.php';
require 'head.php';
require 'common.php';
require 'sidebar.php';

$sql = " select * from news order by post_date desc ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);

// 檢查是否有送出表單
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $year = $_POST['year'];

    $sql = " select * from news where left(post_date,4)=$year ";
    $result = $pdo->query($sql);
    $rs = $result->fetchAll(PDO::FETCH_ASSOC);

}

?>
<div class="row">
    <div class="col-md-6" style="width:100%">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">最新消息-消息管理</h3>
                <div class="text-end">
                </div>
                <div class="text-end">
                    <a href="news_ins.php" class="btn">
                        <button type="submit" class="btn btn-primary" name="save" value="create">新增</button>
                    </a>
                    <form class="d-flex" role="search" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                        <input style="width: 200px" class="form-control me-2" type="search" name="year" placeholder="年份" aria-label="Search"/>
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">id</th>
                    <th>分類</th>
                    <th>標題</th>
                    <th>發布時間</th>
                    <th style="width: 40px">狀態</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php for($i=0;$i<count($rs);$i++){ ?>
                <tr class="align-middle">
                    <td><?php echo $rs[$i]['id']; ?></td>
                    <td>
                        <?php 
                        $sql = " select * from news_mark where id=".$rs[$i]['mark_id'];
                        $result = $pdo->query($sql);
                        $rs_mark = $result->fetchAll(PDO::FETCH_ASSOC);
                        echo $rs_mark[0]['mark_name'];
                        ?>
                    </td>
                    <td><?php echo $rs[$i]['title']; ?></td>
                    <td><?php echo $rs[$i]['post_date']; ?></td>
                    <?php if($rs[$i]['status']==1){ ?>
                    <td><span class="badge text-bg-success">啟用</span></td>
                    <?php }else{ ?>
                    <td><span class="badge text-bg-danger">停用</span></td>
                    <?php } ?>
                    <td>
                        <a href="news_edit.php?id=<?php echo $rs[$i]['id'];  ?>" class="btn"  style="width=11%">
                            <button class="btn btn-primary" name="save">編輯</button>
                        </a>
                        <?php if($_SESSION['admin_permissions']=='admin' || $_SESSION['admin_permissions']=='editor'){ ?>
                        <a href="news_del.php?id=<?php echo $rs[$i]['id'];  ?>" class="btn" onclick="return confirm('確定刪除這筆資料？')" style="width=11%">
                            <button class="btn btn-primary" name="save">刪除</button>
                        </a>
                        <?php } ?>
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