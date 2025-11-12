<?php
require 'web_config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>昱泉國際投資人官網</title>
    <meta name="description" content="昱泉國際投資人官網">
    <link rel="icon" href="./images/logo_simple.png" type="image/x-icon">


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
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <div w3-include-html="header.html"></div>

    <div class="container container-md">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div id="carouselExampleControls" class="carousel slide my-3" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./images/G9_1600x644.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./images/BH_1600x644.jpg" class="d-block w-100" alt="...">
                        </div>
                        <!-- <div class="carousel-item">
                            <img src="..." class="d-block w-100" alt="...">
                        </div> -->
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!-- Force next columns to break to new line -->
            <div class="w-100"></div>

            <div class="col-12 col-md-12 col-lg-6 py-2">
                <div class="card d-flex flex-row">
                    <div class="card-header card-bg">
                        最新財報資訊
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <?php
                                $sql = " SELECT years FROM financial_statements GROUP BY years ORDER BY years desc LIMIT 3 ";
                                $result = $pdo->query($sql);
                                $rs_years = $result->fetchAll(PDO::FETCH_ASSOC);
                                for($i=0;$i<count($rs_years);$i++){
                                ?>
                                <tr>
                                    <th scope="row" class="align-middle fw-normal"><?php echo $rs_years[$i]['years'] ?></th>
                                    <td class="align-middle">
                                        <?php
                                        $sql = " SELECT * FROM financial_statements WHERE years=".$rs_years[$i]['years'];
                                        $result = $pdo->query($sql);
                                        $rs = $result->fetchAll(PDO::FETCH_ASSOC);
                                        for($j=0;$j<count($rs);$j++){
                                        ?>
                                        <a href="<?php echo $rs[$j]['link_url'] ?>"
                                            class="btn card-btn shadow-sm text-nowrap" target="_blank"
                                            rel="noopener noreferrer">
                                            <?php echo $rs[$j]['quarterly'] ?>
                                        </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                        <a href="/pages/financial_statements.php" class="d-flex justify-content-end card-btn">更多資訊</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6 py-2">
                <div class="card d-flex flex-row">
                    <div class="card-header card-bg">
                        最新公司規章資訊
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <?php
                                $sql = " SELECT * FROM company_regulations LIMIT 3 ";
                                $result = $pdo->query($sql);
                                $rs = $result->fetchAll(PDO::FETCH_ASSOC);
                                for($i=0;$i<count($rs);$i++){
                                ?>
                                <tr>
                                    <th scope="row" class="align-middle fw-normal"><?php echo $rs[$i]['title']; ?></th>
                                    <td class="align-middle">
                                        <!-- <button type="button" class="btn card-btn shadow-sm text-nowrap">檔案下載</button> -->
                                        <a href="<?php echo $rs[$i]['link_url']; ?>"
                                            class="btn card-btn shadow-sm text-nowrap" target="_blank"
                                            rel="noopener noreferrer">
                                            檔案下載
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <a href="/pages/company_regulations.php" class="d-flex justify-content-end card-btn">更多資訊</a>
                    </div>
                </div>
            </div>

            <!-- Force next columns to break to new line -->
            <div class="w-100"></div>

            <div class="col-12 col-md-12 col-lg-6 py-2">

                <div class="card d-flex flex-row ">
                    <div class="card-header card-bg">
                        最新股東會資訊
                    </div>
                    <div class="card-body">
                        <?php
                        $sql = " SELECT * FROM shareholders_meeting ORDER BY years desc, id desc LIMIT 1 ";
                        $result = $pdo->query($sql);
                        $rs_shareholders_meeting = $result->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <div class="d-flex overflow-auto">
                            <div class="col-12 col-md-12 col-lg-6 card-btn d-flex align-middle my-3 px-5 borderR">
                                <div class="align-middle fw-normal text-center d-flex align-items-center">
                                    <?php echo $rs_shareholders_meeting[0]['name']; ?>
                                    <br /><br />
                                    <?php echo $rs_shareholders_meeting[0]['date']; ?>
                                    <br /><br />
                                    <?php echo $rs_shareholders_meeting[0]['location']; ?>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 d-flex flex-column my-3 px-5 ">
                                <?php if(!empty($rs_shareholders_meeting[0]['meeting_notice'])){ ?>
                                <a href="<?php echo $rs_shareholders_meeting[0]['meeting_notice']; ?>"
                                    class="btn card-btn shadow-sm text-nowrap my-1" target="_blank"
                                    rel="noopener noreferrer">
                                    開會通知書
                                </a>
                                <?php } ?>
                                <?php if(!empty($rs_shareholders_meeting[0]['meeting_procedure_manual'])){ ?>
                                <a href="<?php echo $rs_shareholders_meeting[0]['meeting_procedure_manual']; ?>"
                                    class="btn card-btn shadow-sm text-nowrap my-1" target="_blank"
                                    rel="noopener noreferrer">
                                    議事手冊
                                </a>
                                <?php } ?>
                                <?php if(!empty($rs_shareholders_meeting[0]['major_shareholders'])){ ?>
                                <a href="<?php echo $rs_shareholders_meeting[0]['major_shareholders']; ?>"
                                    class="btn card-btn shadow-sm text-nowrap my-1" target="_blank"
                                    rel="noopener noreferrer">
                                    主要股東名單
                                </a>
                                <?php } ?>
                                <?php if(!empty($rs_shareholders_meeting[0]['annual_report'])){ ?>
                                <a href="<?php echo $rs_shareholders_meeting[0]['annual_report']; ?>"
                                    class="btn card-btn shadow-sm text-nowrap my-1" target="_blank"
                                    rel="noopener noreferrer">
                                    股東會年報
                                </a>
                                 <?php } ?>
                                 <?php if(!empty($rs_shareholders_meeting[0]['minutes'])){ ?>
                                <a href="<?php echo $rs_shareholders_meeting[0]['minutes']; ?>"
                                    class="btn card-btn shadow-sm text-nowrap my-1" target="_blank"
                                    rel="noopener noreferrer">
                                    股東會議事錄
                                </a>
                                <?php } ?>
                                <!-- Button trigger modal -->
                                <?php if(!empty($rs_shareholders_meeting[0]['link_video'])){ ?>
                                <a type="button" class="btn card-btn shadow-sm text-nowrap my-1" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    影音連結
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                        <a href="/pages/shareholders_meeting.php" class="d-flex justify-content-end card-btn">更多資訊</a>

                    </div>


                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6 py-2">
                <div class="card d-flex flex-row ">
                    <div class="card-header card-bg">
                        最新法說會資訊
                    </div>
                    <div class="card-body">
                        <?php
                        $sql = " SELECT * FROM conference ORDER BY years desc, id desc LIMIT 1 ";
                        $result = $pdo->query($sql);
                        $rs_conference = $result->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <div class="d-flex overflow-auto">
                            <div class="col-12 col-md-12 col-lg-6 card-btn d-flex align-middle my-3 px-5 borderR">
                                <div class="align-middle fw-normal text-center d-flex align-items-center my-5">
                                    <?php echo $rs_conference[0]['years'].'法人說明會'; ?>
                                    <br /><br /><br />
                                    <?php echo $rs_conference[0]['date']; ?>
                                    <br /><br /><br />
                                    <?php echo $rs_conference[0]['location']; ?>
                                </div>
                            </div>
                            
                            <div class="col-12 col-md-12 col-lg-6 d-flex flex-column my-auto px-5 ">
                                <?php if(!empty($rs_conference[0]['link_cn'])){ ?>
                                <a href="<?php echo $rs_conference[0]['link_cn']; ?>"
                                    class="btn card-btn shadow-sm text-nowrap my-1" target="_blank"
                                    rel="noopener noreferrer">
                                    檔案下載(中)
                                </a>
                                <?php } ?>
                                <?php if(!empty($rs_conference[0]['link_en'])){ ?>
                                <a href="<?php echo $rs_conference[0]['link_en']; ?>"
                                    class="btn card-btn shadow-sm text-nowrap my-1" target="_blank"
                                    rel="noopener noreferrer">
                                    檔案下載(英)
                                </a>
                                <?php } ?>
                                <?php if(!empty($rs_conference[0]['link_video'])){ ?>
                                <a type="button" class="btn card-btn shadow-sm text-nowrap my-1" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal2">
                                    影音連結
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                        <a href="/pages/conference.php" class="d-flex justify-content-end card-btn">更多資訊</a>

                    </div>
                </div>
            </div>

            <!-- 最新股東會資訊 影音連結 -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <iframe width="100%" height="536" src="<?php echo $rs_shareholders_meeting[0]['link_video']; ?>"
                                title="20250627股東常會" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>

                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- 最新法說會資訊 影音連結 -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="ratio ratio-16x9">
                                <video src="<?php echo $rs_conference[0]['link_video']; ?>" title="Video"
                                    controls=""
                                    style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; border-radius: 4px;"></video>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div w3-include-html="footer.html"></div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <!-- MUI -->
    <script src="https://cdn.bootcss.com/mui/3.7.0/js/mui.min.js"></script>
    <!-- W3 -->
    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <script>
        w3.includeHTML();
    </script>
</body>

</html>