<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="image/icon/favicon.png">
        <title>留心語上傳管理</title>
        <meta name="author" content="2016 NTUIM SA GROUP7">
        <meta name="description" content="">
        <!-- bootstrap css -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- custim css -->
        <link href="css/style1.css" rel="stylesheet">
    </head>
    <body id="page-top">
        <?php
            include("mysql_connect.php");
            $EMAIL = $_SESSION['EMAIL'];
            $CUSIDT = $_SESSION['CUSIDT'];
            if($EMAIL != null):
                if($CUSIDT == 'A'):
                    $queryCUSNM = "SELECT CUSNM FROM CUSMAS where EMAIL = '$EMAIL'";
                    $result = mysql_query($queryCUSNM);
                    $row = mysql_fetch_row($result);
        ?>
        <nav class="navbar navbar-fixed-top nav-custom">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" data-toggle="collapse" data-target=".navbar-main-collapse" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#page-top" class="navbar-brand"><img src="image/logo5.png" alt="" class="logo"></a>
                </div>
                <div class="collapse navbar-collapse navbar-main-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="../Homepages/index_manager.php">
                                回三三首頁<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <!--
                        <li>
                            <a href="#">
                                回留心語首頁<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        -->
                        <li>
                            <!-- 要改成dropdown -->
                            <!-- 更新使用者資料、密碼 -->
                            <a href="#">
                                <?php
                                    echo $row[0]."，您好<br>";
                                ?>
                            </a>
                        </li>
                        <li>
                            <a href="../Homepages/index.php">
                                登出<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section>
        </section>
        <?php
                else:
                    print "您無權限觀看此頁面!";
                    echo '<meta http-equiv=REFRESH CONTENT=2;url=../Homepages/index_customer.php>';
                endif;
            else:
                print "您無權限觀看此頁面!";
                echo '<meta http-equiv=REFRESH CONTENT=2;url=../../Homepages/index.php>';
            endif;
        ?>
    </body>
    <!-- jquery -->
    <script src="js/jquery-1.12.31.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap1.min.js"></script>
    <!-- custom js -->
    <script src="js/trisoap1.js"></script>
</html>