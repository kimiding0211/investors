<?php
require '../web_config.php';

$sql = " select * from dividend ";
$result = $pdo->query($sql);
$rs = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>昱泉國際投資人 股務作業</title>
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
                        股務作業
                    </div>
                    <table class="table">
                        <div class="m-3">
                            <?php echo $rs[0]['text']; ?>
                        </div>
                    </table>
                </div>

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


</body>

</html>