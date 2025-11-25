<?php
require '../web_config.php';

$sql = " SELECT years FROM shareholders_meeting GROUP BY years ORDER BY years desc ";
$result = $pdo->query($sql);
$rs_years = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>昱泉國際投資人 股東會</title>
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
                        <svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium mui-bdypmb" focusable="false"
                            aria-hidden="true" viewBox="0 0 24 24" data-testid="ContentPasteIcon">
                            <path
                                d="M19 2h-4.18C14.4.84 13.3 0 12 0c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm7 18H5V4h2v3h10V4h2v16z">
                            </path>
                        </svg>
                        <div class="text-nowrap">第<?php echo $rs_years[$i]['years'] ?>年股東會</div>
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
                    選擇年數
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <?php for($i=0;$i<count($rs_years);$i++){  ?>
                    <li><a class="dropdown-item" href="#" data-target='#card<?php echo $i+1; ?>'>第<?php echo $rs_years[$i]['years'] ?>年股東會</a></li>
                    <?php } ?>
                    <!-- <li><a class="dropdown-item" href="#" data-target='#card2'>113年財務報表</a></li>
                    <li><a class="dropdown-item" href="#" data-target='#card3'>112年財務報表</a></li>
                    <li><a class="dropdown-item" href="#" data-target='#card4'>111年財務報表</a></li>
                    <li><a class="dropdown-item" href="#" data-target='#card5'>110年財務報表</a></li>
                    <li><a class="dropdown-item" href="#" data-target='#card6'>109年財務報表</a></li> -->
                    <!-- <li><a class="dropdown-item" href="#" data-target='#card7'>108年財務報表</a></li> -->
                </ul>
            </div>

            <!-- 董事會 -->
            <div class="card shadow-sm my-3">
                <?php for($i=0;$i<count($rs_years);$i++){
                    $sql = " SELECT * FROM shareholders_meeting WHERE years=".$rs_years[$i]['years'];
                    $result = $pdo->query($sql);
                    $rs = $result->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <div id="card<?php echo $i+1; ?>" class="card-content <?php if($i!=0){echo 'd-none';} ?>">
                    <div class="card-header card-bg fs-1 fw-bolder">
                        <?php echo $rs_years[$i]['years']; ?>年股東會
                    </div>
                    <table class="table table-striped table-hover mb-0">

                        <thead>
                            <tr>
                                <th scope="col">股東會</th>
                                <th scope="col">時間</th>
                                <th scope="col">地點</th>
                                <th scope="col">資料下載</th>
                                <th scope="col">影音連結</th>
                            </tr>
                        </thead>
                        <tbody class="my-auto align-middle">
                            <?php for($j=0;$j<count($rs);$j++){ ?>
                            <tr>
                                <th scope="row"><?php echo $rs[$j]['name']; ?></th>
                                <td><?php echo $rs[$j]['date']; ?></td>
                                <td><?php echo $rs[$j]['location']; ?></td>
                                <td>
                                    <?php if(!empty($rs[$j]['meeting_notice'])){ ?>
                                    <div>
                                        <a href="<?php echo $rs[$j]['meeting_notice']; ?>"
                                            class="btn card-btn shadow-sm text-nowrap my-1" target="_blank"
                                            rel="noopener noreferrer">
                                            開會通知書
                                        </a>
                                    </div>
                                    <?php } ?>
                                    <?php if(!empty($rs[$j]['meeting_procedure_manual'])){ ?>
                                    <div>
                                        <a href="<?php echo $rs[$j]['meeting_procedure_manual']; ?>"
                                            class="btn card-btn shadow-sm text-nowrap my-1" target="_blank"
                                            rel="noopener noreferrer">
                                            議事手冊
                                        </a>
                                    </div>
                                    <?php } ?>
                                    <?php if(!empty($rs[$j]['major_shareholders'])){ ?>
                                    <div>
                                        <a href="<?php echo $rs[$j]['major_shareholders']; ?>"
                                            class="btn card-btn shadow-sm text-nowrap my-1" target="_blank"
                                            rel="noopener noreferrer">
                                            主要股東名單
                                        </a>
                                    </div>
                                    <?php } ?>
                                    <?php if(!empty($rs[$j]['annual_report'])){ ?>
                                    <div>
                                        <a href="<?php echo $rs[$j]['annual_report']; ?>"
                                            class="btn card-btn shadow-sm text-nowrap my-1" target="_blank"
                                            rel="noopener noreferrer">
                                            股東會年報
                                        </a>
                                    </div>
                                    <?php } ?>
                                    <?php if(!empty($rs[$j]['minutes'])){ ?>
                                    <div>
                                        <a href="<?php echo $rs[$j]['minutes']; ?>"
                                            class="btn card-btn shadow-sm text-nowrap my-1" target="_blank"
                                            rel="noopener noreferrer">
                                            議事手冊
                                        </a>
                                    </div>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if(!empty($rs[$j]['link_video'])){ ?>
                                    <div>
                                        <a type="button" class="btn card-btn shadow-sm text-nowrap my-1"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal<?php if($i!=0){echo $i+1;} ?>">
                                            影音連結
                                        </a>
                                    </div>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php } ?>
                

            </div>
        </div>
        <?php 
            for($i=0;$i<count($rs_years);$i++){
                $sql = " SELECT * FROM shareholders_meeting WHERE years=".$rs_years[$i]['years'];
                $result = $pdo->query($sql);
                $rs = $result->fetchAll(PDO::FETCH_ASSOC);
                for($j=0;$j<count($rs);$j++){
        ?>
        <div class="modal fade" id="exampleModal<?php if($i!=0){echo $i+1;} ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <iframe width="100%" height="536" src="<?php echo $rs[$j]['link_video']; ?>"
                            title="" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>

                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>
        <?php 
                }
            } 
        ?>

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