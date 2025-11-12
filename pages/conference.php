<?php
require '../web_config.php';

$sql = " SELECT * FROM conference ORDER BY years desc ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>昱泉國際投資人 法人說明會資訊</title>
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
        <div class="card-box">
            <!-- 董事會 -->
            <div class="card shadow-sm my-3">
                <div id="card1" class="card-content">
                    <div class="card-header card-bg fs-1 fw-bolder">
                        法人說明會資訊
                    </div>
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">年度</th>
                                <th scope="col">時間</th>
                                <th scope="col">地點</th>
                                <th scope="col">檔案連結</th>
                                <th scope="col">影音連結</th>
                            </tr>
                        </thead>
                        <tbody class="my-auto align-middle">
                        <?php for($i=0;$i<count($rs);$i++){ ?>
                        <tr>
                                <th scope="row"><?php echo $rs[$i]['years'] ?></th>
                                <td><?php echo $rs[$i]['date'] ?></td>
                                <td><?php echo $rs[$i]['location'] ?></td>
                                <td>
                                    <div>
                                        <a href="<?php echo $rs[$i]['link_cn'] ?>"
                                            class="btn card-btn shadow-sm text-nowrap my-1" target="_blank"
                                            rel="noopener noreferrer">
                                            檔案下載(中)
                                        </a>
                                    </div>
                                    <div>
                                        <a href="<?php echo $rs[$i]['link_en'] ?>"
                                            class="btn card-btn shadow-sm text-nowrap my-1" target="_blank"
                                            rel="noopener noreferrer">
                                            檔案下載(英)
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <a type="button" class="btn card-btn shadow-sm text-nowrap my-1"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal<?php if($i!=0){echo $i+1;} ?>">
                                        影音連結
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <?php for($i=0;$i<count($rs);$i++){ ?>
        <div class="modal fade" id="exampleModal<?php if($i!=0){echo $i+1;} ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="ratio ratio-16x9">
                            <video src="<?php echo $rs[$i]['link_video'] ?>" title="Video"
                                controls=""
                                style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; border-radius: 4px;"></video>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
        <?php } ?>
        
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


</body>

</html>