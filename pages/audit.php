<?php
require '../web_config.php';

$sql = " SELECT years FROM audit GROUP BY years ORDER BY years desc ";
$result = $pdo->query($sql);
$rs_years = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>昱泉國際投資人 審計委員會</title>
    <meta name="description" content="昱泉國際投資人官網">
    <link rel="icon" href="../images/logo_simple.png" type="image/x-icon">


    <link rel="stylesheet" href="./css/normalize.css">
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> -->

    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=keyboard_arrow_down" />


    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- MUI -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/mui/3.7.0/css/mui.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/director.css">
</head>

<body>
    <div w3-include-html="../header.html"></div>



    <div class="container d-flex my-3 justify-content-center">
        <ul class="left-nav nav flex-column text-center rounded-1 d-none d-lg-block">
            <?php for($i=0;$i<count($rs_years);$i++){  ?>
            <li class="nav-item" data-target='#card<?php echo $i+1; ?>'>
                <a class="nav-link <?php if($i==0){echo 'active';} ?>" aria-current="page" href="#">
                    <div class="d-flex align-items-center">
                        <svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium mui-bdypmb mx-2" focusable="false"
                            aria-hidden="true" viewBox="0 0 24 24" data-testid="GroupsIcon">
                            <path
                                d="M12 12.75c1.63 0 3.07.39 4.24.9 1.08.48 1.76 1.56 1.76 2.73V18H6v-1.61c0-1.18.68-2.26 1.76-2.73 1.17-.52 2.61-.91 4.24-.91zM4 13c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm1.13 1.1c-.37-.06-.74-.1-1.13-.1-.99 0-1.93.21-2.78.58C.48 14.9 0 15.62 0 16.43V18h4.5v-1.61c0-.83.23-1.61.63-2.29zM20 13c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm4 3.43c0-.81-.48-1.53-1.22-1.85-.85-.37-1.79-.58-2.78-.58-.39 0-.76.04-1.13.1.4.68.63 1.46.63 2.29V18H24v-1.57zM12 6c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3z">
                            </path>
                        </svg>
                        <div class="text-nowrap">第<?php echo $rs_years[$i]['years'] ?>屆審計委員會成員</div>
                    </div>
                </a>
            </li>
            <?php } ?>
        </ul>
        <div class="card-box">
            <!-- 下拉選單 -->
            <div class="dropdown rounded-1 border border-secondary my-2 d-lg-none">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    選擇屆數
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <?php for($i=0;$i<count($rs_years);$i++){  ?>
                    <li><a class="dropdown-item" href="#" data-target='#card<?php echo $i+1; ?>'>第<?php echo $rs_years[$i]['years'] ?>屆審計委員會成員</a></li>
                    <?php } ?>
                    <!-- <li><a class="dropdown-item" href="#" data-target='#card2'>第3屆審計委員會成員</a></li> -->
                    <!-- <li><a class="dropdown-item" href="#" data-target='#card3'>第12屆董事會</a></li> -->
                </ul>
            </div>

            <div class="card shadow-sm" style="width: 100%;">
                <div class="card-body">
                    <?php
                    $sql = " SELECT * FROM audit_content ";
                    $result = $pdo->query($sql);
                    $rs = $result->fetchAll(PDO::FETCH_ASSOC);
                    echo $rs[0]['content'];
                    ?>
                </div>
            </div>

            <!-- 董事會 -->
            <div class="card shadow-sm my-3">
                <?php for($i=0;$i<count($rs_years);$i++){
                    $sql = " SELECT * FROM audit WHERE years=".$rs_years[$i]['years']." order by sort";
                    $result = $pdo->query($sql);
                    $rs = $result->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <div id="card<?php echo $i+1; ?>" class="card-content <?php if($i!=0){echo 'd-none';} ?>">
                    <div class="card-header card-bg fs-1 fw-bolder">
                        第<?php echo $rs_years[$i]['years'] ?>屆審計委員會成員
                    </div>
                    <!-- <div class="card-body"> -->
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                            <tr class="">
                                <th scope="col" class="text-nowrap">職稱</th>
                                <th scope="col" class="text-nowrap">姓名</th>
                                <th scope="col">選任日期</th>
                                <th scope="col">主要經(學)歷</th>
                                <!--  <th scope="col">Handle</th> -->
                            </tr>
                        </thead>
                        <tbody class="my-auto align-middle">
                            <?php for($j=0;$j<count($rs);$j++){ ?>
                            <tr>
                                <th scope="row"><?php echo $rs[$j]['identity'] ?></th>
                                <td class="text-nowrap"><?php echo $rs[$j]['name'] ?></td>
                                <td><?php echo $rs[$j]['election_date'] ?></td>
                                <td><?php echo $rs[$j]['main_experience'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>




    <div w3-include-html="../footer.html"></div>



    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <!-- MUI -->
    <!-- <script src="https://cdn.bootcss.com/mui/3.7.0/js/mui.min.js"></script> -->
    <!-- W3 -->
    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <script>
        w3.includeHTML();
    </script>
    <script>
        const cardContents = document.querySelectorAll('.card-content');
        const dropdownButton = document.getElementById('dropdownMenuButton1');

        // 封裝切換卡片的函式
        function switchCard(targetSelector, text) {
            // 隱藏所有卡片
            cardContents.forEach(card => card.classList.add('d-none'));

            // 顯示指定卡片
            const target = document.querySelector(targetSelector);
            if (target) target.classList.remove('d-none');

            // 更新 dropdown 按鈕文字
            if (dropdownButton) {
                dropdownButton.textContent = text.trim();
            }
        }

        // 監聽 dropdown-item（手機板）
        const dropdownItems = document.querySelectorAll('.dropdown-item');
        dropdownItems.forEach(item => {
            item.addEventListener('click', e => {
                e.preventDefault();
                switchCard(item.getAttribute('data-target'), item.textContent);
            });
        });

        // 監聽 nav-item（桌面版）
        const navItems = document.querySelectorAll('.nav-item[data-target]');
        navItems.forEach(item => {
            item.addEventListener('click', e => {
                e.preventDefault();
                switchCard(item.getAttribute('data-target'), item.textContent);
            });
        });

    </script>

</body>

</html>