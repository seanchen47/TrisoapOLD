<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="image/icon/favicon.png">
        <title>權限管理</title>
        <meta name="author" content="2016 NTUIM SA GROUP7">
        <meta name="description" content="">
        <!-- bootstrap css -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- custim css -->
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body id="page-top">
        <?php
            include("../methods/mysql_connect.php");
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
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#page-top" class="navbar-brand"><img src="http://placehold.it/125x30" alt="" class="logo"></a>
                </div>
                <div class="collapse navbar-collapse navbar-main-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="../HomePages/index_manager.php">
                                回三三首頁<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="Create_manager.php">
                                新增管理員<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="Delete_manager.php">
                                刪除管理員<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
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
                            <a href="../methods/User_logout.php">
                                登出<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section>
            <div class="container">
                <h2>權限管理</h2>
                <div class="manage">
                    <div class="row">
                        <div class="visible-xs col-xs-2 col-xs-offset-1" id="pills-xs">
                            <a class="btn dropdown-toggle" id="pills-xs-dropdown" data-toggle="dropdown" href="#">
                                全部<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu"></ul>
                        </div>
                        <div class="hidden-xs col-sm-8 col-md-6" id="pills">
                            <ul class="nav nav-pills">
                                <li class="active"><a data-toggle="pill" href="#all">全部</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row table-responsive">
                        <div class="tab-content">
                        <!-- use php for loop to generate each pill -->
                        
                        <!-- 全部 -->
                        <?php switch(0):
                        case 0:
                            $queryManager = "SELECT * FROM CUSMAS WHERE CUSIDT = 'A' AND ACTCODE = '1'"; ?>
                            <div id="all" class="tab-pane fade in active">
                        <?php break; ?>
                        
                        <?php endswitch; ?>
                                <!-- pill content -->
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td>電子信箱</td>
                                            <td>姓名</td>
                                            <td>電話</td>
                                            <td>地址</td>
                                            <td>帳號建立日期</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $result = mysql_query($queryManager);
                                        while($row = mysql_fetch_array($result)){
                                    ?>
                                        <tr>
                                            <!-- 電子信箱 -->
                                            <td>
                                                <?php
                                                    echo $row['EMAIL'];
                                                ?>
                                            </td>
                                            <!-- 姓名 -->
                                            <td>
                                                <?php
                                                    echo $row['CUSNM'];
                                                ?>
                                            </td>
                                            <!-- 電話 -->
                                            <td>
                                                <?php
                                                    echo $row['TEL'];
                                                ?>
                                            </td>
                                            <!-- 地址 -->
                                            <td>
                                                <?php
                                                    echo $row['CUSADD'];
                                                ?>
                                            </td>
                                            <!-- 帳號建立日期 -->
                                            <td>
                                                <?php
                                                    echo $row['CREATEDATE'];
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
                else:
                    print "您無權限觀看此頁面!";
                    echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePage/index_Customer.php>';
                endif;
            else:
                print "您無權限觀看此頁面!";
                echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePage/index.php>';
            endif;
        ?>
    </body>
    <!-- jquery -->
    <script src="js/jquery-1.12.3.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src="js/trisoap.js"></script>
</html>