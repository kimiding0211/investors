<?php
require '../web_config.php';

$sql = " SELECT project_name FROM company_regulations GROUP BY project_name ";
$result = $pdo->query($sql);
$rs_project_name = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>昱泉國際投資人 內部規章與治理機制</title>
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
            <?php for($i=0;$i<count($rs_project_name);$i++){  ?>
            <li class="nav-item" data-target='#card<?php echo $i+1; ?>'>
                <a class="nav-link <?php if($i==0){echo 'active';} ?>" aria-current="page" href="#">
                    <div class="d-flex align-items-center">
                        <svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium mui-bdypmb mx-2" focusable="false"
                            aria-hidden="true" viewBox="0 0 24 24" data-testid="GroupsIcon">
                            <path
                                d="M12 12.75c1.63 0 3.07.39 4.24.9 1.08.48 1.76 1.56 1.76 2.73V18H6v-1.61c0-1.18.68-2.26 1.76-2.73 1.17-.52 2.61-.91 4.24-.91zM4 13c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm1.13 1.1c-.37-.06-.74-.1-1.13-.1-.99 0-1.93.21-2.78.58C.48 14.9 0 15.62 0 16.43V18h4.5v-1.61c0-.83.23-1.61.63-2.29zM20 13c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm4 3.43c0-.81-.48-1.53-1.22-1.85-.85-.37-1.79-.58-2.78-.58-.39 0-.76.04-1.13.1.4.68.63 1.46.63 2.29V18H24v-1.57zM12 6c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3z">
                            </path>
                        </svg>
                        <div class="text-nowrap"><?php echo $rs_project_name[$i]['project_name'] ?></div>
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
                    選擇
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <?php for($i=0;$i<count($rs_project_name);$i++){  ?>
                    <li><a class="dropdown-item" href="#" data-target='#card<?php echo $i+1; ?>'><?php echo $rs_project_name[$i]['project_name'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            
            <!-- 董事會 -->
            <div class="card shadow-sm my-3">
                <?php for($i=0;$i<count($rs_project_name);$i++){
                    $sql = " SELECT * FROM company_regulations WHERE project_name='".$rs_project_name[$i]['project_name']."' order by id";
                    $result = $pdo->query($sql);
                    $rs = $result->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <div id="card<?php echo $i+1; ?>" class="card-content <?php if($i!=0){echo 'd-none';} ?>">
                    <div class="card-header card-bg fs-1 fw-bolder">
                        <?php echo $rs_project_name[$i]['project_name'] ?>
                    </div>
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                            <tr class="">
                                <th scope="col" class="">名稱</th>
                                <th scope="col" class="">檔案連結</th>
                            </tr>
                        </thead>
                        <tbody class="my-auto align-middle">
                            <?php for($j=0;$j<count($rs);$j++){ ?>
                            <tr>
                                <th scope="row"><?php echo $rs[$j]['title'] ?></th>
                                <td class="text-nowrap">
                                    <a href="<?php echo $rs[$j]['link_url'] ?>"
                                        class="btn card-btn shadow-sm text-nowrap" target="_blank"
                                        rel="noopener noreferrer">
                                        檔案下載
                                    </a>
                                </td>
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