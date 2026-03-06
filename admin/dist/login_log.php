<?php
require 'web_config.php';
require 'common.php';
require 'head.php';
require 'sidebar.php';

// $sql = " select * from news order by post_date desc ";
// $result = $pdo->query($sql);
// $rs = $result->fetchAll(PDO::FETCH_ASSOC);

$perPage = 20; // 每頁筆數
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$offset = ($page - 1) * $perPage;

// 總筆數
$totalSql = "SELECT COUNT(*) FROM login_log";
$total = $pdo->query($totalSql)->fetchColumn();
$totalPages = ceil($total / $perPage);

// 分頁查詢
$sql = "SELECT * FROM login_log ORDER BY datetime DESC LIMIT :limit OFFSET :offset";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="row">
    <div class="col-md-6" style="width:100%">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">使用者登入</h3>
                <div class="text-end">
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">id</th>
                    <th>帳號</th>
                    <th>IP</th>
                    <th>時間</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php for($i=0;$i<count($rs);$i++){ ?>
                <tr class="align-middle">
                    <td><?php echo $rs[$i]['id']; ?></td>
                    <td><?php echo $rs[$i]['user']; ?></td>
                    <td><?php echo $rs[$i]['ip']; ?></td>
                    <td><?php echo $rs[$i]['datetime']; ?></td>
                    
                </tr>
                <?php } ?>
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-end">
                <!-- 上一頁 -->
                <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page-1 ?>">&laquo;</a>
                </li>

                <?php for($i=1; $i<=$totalPages; $i++): ?>
                    <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <!-- 下一頁 -->
                <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page+1 ?>">&raquo;</a>
                </li>
            </ul>
            </div>
        </div>
    </div>
</div>
<?php
require 'footer.php';
?>