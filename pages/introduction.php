<?php
require '../web_config.php';

$sql = " select * from introduction ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>昱泉國際投資人 基本資料</title>
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
    <link rel="stylesheet" href="../css/introduction.css">
</head>

<body>
    <div w3-include-html="../header.html"></div>

    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header card-bg fs-1 fw-bolder">
                基本資料
            </div>
            <!-- <div class="card-body"> -->
            <table class="table table-striped">
                <!-- <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead> -->
                <tbody class="my-auto align-middle">
                    <tr>
                        <th scope="row">公司名稱</th>
                        <!-- <td></td> -->
                        <td><?php echo $rs[0]['name']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">英文全名</th>
                        <!-- <td></td> -->
                        <td><?php echo $rs[0]['name_en']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">股票代號</th>
                        <!-- <td></td> -->
                        <td><?php echo $rs[0]['code']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">交易市場</th>
                        <!-- <td></td> -->
                        <td><?php echo $rs[0]['market']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">產業別</th>
                        <!-- <td></td> -->
                        <td><?php echo $rs[0]['industry']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">成立日期</th>
                        <!-- <td></td> -->
                        <td><?php echo $rs[0]['date_of_establishment']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">上櫃日期</th>
                        <!-- <td></td> -->
                        <td><?php echo $rs[0]['otc_listing_date']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">實收資本額</th>
                        <!-- <td></td> -->
                        <td><?php echo number_format($rs[0]['paid_in_capital']).'元'; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">股票過戶機構</th>
                        <!-- <td></td> -->
                        <td><?php echo $rs[0]['stock_transfer_agency']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">簽證會計師</th>

                        <!-- <td></td> -->
                        <td><?php echo $rs[0]['visa_accountant']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">董事長</th>
                        <!-- <td></td> -->
                        <td><?php echo $rs[0]['chairman']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">總經理</th>
                        <!-- <td></td> -->
                        <td><?php echo $rs[0]['president']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">發言人</th>
                        <!-- <td></td> -->
                        <td><?php echo $rs[0]['spokesman']; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- </div> -->
        </div>
    </div>




    <div w3-include-html="../footer.html"></div>



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