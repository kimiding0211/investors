<?php
require '../web_config.php';

$sql = " SELECT years FROM financial_statements GROUP BY years ORDER BY years desc ";
$result = $pdo->query($sql);
$rs_years = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>昱泉國際投資人 財務報表</title>
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
                        <svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium mui-bdypmb" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="MonetizationOnIcon">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1 1.05.82 1.87 2.65 1.87 1.96 0 2.4-.98 2.4-1.59 0-.83-.44-1.61-2.67-2.14-2.48-.6-4.18-1.62-4.18-3.67 0-1.72 1.39-2.84 3.11-3.21V4h2.67v1.95c1.86.45 2.79 1.86 2.85 3.39H14.3c-.05-1.11-.64-1.87-2.22-1.87-1.5 0-2.4.68-2.4 1.64 0 .84.65 1.39 2.67 1.91s4.18 1.39 4.18 3.91c-.01 1.83-1.38 2.83-3.12 3.16z"></path>
                        </svg>
                        </svg>
                        <div class="text-nowrap"><?php echo $rs_years[$i]['years'] ?>年財務報表</div>
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
                    <li><a class="dropdown-item" href="#" data-target='#card1'>114年財務報表</a></li>
                    <li><a class="dropdown-item" href="#" data-target='#card2'>113年財務報表</a></li>
                    <li><a class="dropdown-item" href="#" data-target='#card3'>112年財務報表</a></li>
                    <li><a class="dropdown-item" href="#" data-target='#card4'>111年財務報表</a></li>
                    <li><a class="dropdown-item" href="#" data-target='#card5'>110年財務報表</a></li>
                    <li><a class="dropdown-item" href="#" data-target='#card6'>109年財務報表</a></li>
                    <li><a class="dropdown-item" href="#" data-target='#card7'>108年財務報表</a></li>
                </ul>
            </div>

            <!-- <div class="card shadow-sm" style="width: 100%;">
                <div class="card-body">
                    <h5>一、 董事會職責：</h5>
                    <span>(一) 本公司之營運計畫。</span><br>
                    <span>(二) 年度財務報告及半年度財務報告。但半年度財務報告依法令規定無須經會計師查核簽證者，不在此限。</span><br>
                    <span>(三) 依證券交易法（下稱證交法）第十四條之一規定訂定或修正內部控制制度，及內部控制制度有效性之考核。</span><br>
                    <span>(四) 依證交法第三十六條之一規定訂定或修正取得或處分資產、從事衍生性商品交易、資金貸與他人、為他人背書或提供保證之重大財務業務行為之處理程序。</span><br>
                    <span>(五) 募集、發行或私募具有股權性質之有價證券。</span><br>
                    <span>(六) 董事會未設常務董事者，董事長之選任或解任。</span><br>
                    <span>(七) 財務、會計或內部稽核主管之任免。</span><br>
                    <span>(八) 對關係人之捐贈或對非關係人之重大捐贈。</span><br>
                    <span>(九) 董事及經理人薪資報酬。</span><br>
                    <span>(十) 依證交法第十四條之三、其他依法令或章程規定應由股東會決議或董事會決議事項或主管機關規定之重大事項。</span><br><br>
                    <h5>二、 董事會多元化政策</h5>
                    <span>本公司依據《公司治理實務守則》第 20 條及《董事選舉辦法》第 3 條規定，確保董事會成員具備履行職務所需之知識、技能與素養。</span><br>
                    <span>為落實董事會多元化政策，本公司設定以下具體目標：</span><br>
                    <span>(一) 性別多元化：董事會中至少應有一席女性董事。</span><br>
                    <span>(二) 專業多元化：至少一席董事應具備會計或財務專長。</span><br>
                    <span>本公司於 <span>113 年度已符合上述目標</span>，未來將持續檢視並優化董事會成員組成，以確保多元化政策之有效實施，進一步提升公司治理品質。</span>

                 </div>
            </div> -->

            <!-- 董事會 -->
            <div class="card shadow-sm my-3">
                <?php for($i=0;$i<count($rs_years);$i++){
                    $sql = " SELECT * FROM financial_statements WHERE years=".$rs_years[$i]['years'];
                    $result = $pdo->query($sql);
                    $rs = $result->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <div id="card<?php echo $i+1; ?>" class="card-content <?php if($i!=0){echo 'd-none';} ?>">
                    <div class="card-header card-bg fs-1 fw-bolder">
                        <?php echo $rs_years[$i]['years'] ?>年財務報表
                    </div>
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                            <tr class="">
                                <th scope="col" class="">月份</th>
                                <th scope="col" class="">檔案連結</th>
                            </tr>
                        </thead>
                        <tbody class="my-auto align-middle">
                            <?php for($j=0;$j<count($rs);$j++){ ?>
                            <tr>
                                <th scope="row"><?php echo $rs[$j]['quarterly'] ?></th>
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