<!-- 商品2詳細資料 -->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepages/img/misc/favicon.png">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS-->
    <link href="../Homepages/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS-->
    <link href="../Homepages/css/trisoap1.css" rel="stylesheet">
    <!--other pages-->
    <link rel="stylesheet" href="../Homepages/assets/css/main.css">
    <!--end other pages-->

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>三三吾鄉手工皂 購買商品</title>
  </head>

  <body>
    <nav class="navbar navbar-custom navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" data-toggle="collapse" data-target=".navbar-main-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <!-- Img or text logo--><img src="image/logo5.png" alt="" class="logo"></a>

        </div>
        <div class="collapse navbar-collapse navbar-main-collapse">
          <ul class="nav navbar-nav navbar-left">
            <li class="hidden"><a href="#page-top"></a></li>
            <li><a href="../Homepages/index.php">首頁<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            <!--  
            <li><a href="about.html">關於三三<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            
            <li><a href="product.html">產品故事<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            -->
            <li><a href="../Homepages/story.html">三三故事<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            
            <li><a href="../Homepages/product.php">如何購皂<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>

            <li><a href="../Homepages/faq.html">顧客問答<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>

            <li><a href="../Message/Message.php">留心語<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            <!--
            <li><a href="contact.html">聯絡我們<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            -->
            <li class="dropdown"><a href="#" class="dropdown-toggle"><span class="lang">會員中心/登出</span><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">查看訂單</a></li>
                <li><a href="../methods/Update_CUSMAS1.php">修改資料</a></li>
                <li><a href="../methods/User_ChangePW1.php">修改密碼</a></li>
                <li><a href="../methods/Order_Confirm.php">購物車內容</a></li>
                <li><a href="../methods/User_logout.php">登出</a></li>
              </ul>
            </li>
         
            <li class="dropdown"><a href="#" class="dropdown-toggle"><span class="lang">Eng</span><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="english.html">English</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div id="wrapper">
        <!-- Header -->
        <header id="header"><br><br></header>
        <!--Product-->  
        <section id="about-slider">
            <div style="float: left; margin-right: 50px; margin-left: 80px">

            <?php
            include("mysql_connect.php");
            $EMAIL = $_SESSION['EMAIL'];
            $ORDNO = $_SESSION['ORDNO'];  //sth wrong
            $message = null;

            if($EMAIL != null){
                if($ORDNO != null){
                    $sql = "SELECT ACTCODE FROM ITEMMAS where ITEMNO='1'";
                    $result = mysql_query($sql);
                    $row = mysql_fetch_row($result);
                    if($row[0] == '1'){
                        $sql = "SELECT * FROM CUSMAS where EMAIL='$EMAIL'";
                        $result = mysql_query($sql);
                        $row = mysql_fetch_array($result);
                        if($row['CUSADD'] == null){
                            $message = $message . '請先更新您的地址<br>';
                        }
                        if($row['TEL'] == null){
                            $message = $message . '請先更新您的電話<br>';
                        }

                        if($message != null){
                            echo $message;
                            echo '<meta http-equiv=REFRESH CONTENT=2;url=Update_CUSMAS1.php>';
                        }
                        else{
                            $sql = "SELECT * FROM ITEMMAS where ITEMNO='2'";
                            $result = mysql_query($sql);
                            $row = mysql_fetch_row($result);
                            $_SESSION['ITEMNO'] = $row[0];
                            echo "<br><br><form name=\"form\" method=\"post\" action=\"Purchase_finish.php\">";
                            //echo "商品編號：$row[0] <br>";
                            echo "<h1>$row[1]</h1>";
                            echo "<font size=\"4\" >商品描述：xoxoxoxoxoxoxo $row[4] <br>";
                            //echo "商品照片：";
                            //echo $row[5];
                            //echo "<br>";
                            echo "商品價格：$row[3] <br>";
                            echo "訂購數量：<input type=\"text\" name=\"ITEMAMT\" min=\"1\" max=\"50\"/> </font> <br>";
                            echo "<input type=\"submit\" name=\"button\" value=\"加入購物車\" />";
                            echo "<a href=\"../Homepages/product_customer.php\" class=\"btn\" style=\"margin-right:5px;\">取消</a>";
                            echo "</form>";
                ?>
                <a id="cancel" href="../Homepages/product_customer.php"></a>
            </div> <!-- 商品敘述 -->
            <!-- 商品圖片 -->
            <div style="float: left; margin-left: 70px">
                <br><br><br>
                <img src="../Homepages/images/test/soap2.jpg" alt="" height=265 width=450>
            </div>
                
            <?php
                        }
                    }
                    else{
            ?>
                        <script>
                            alert("此商品目前下架中");
                        </script>
            <?php
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=../Product/Product.php>';
                    }
                }
                else{
                    //echo "請先建立訂單<br>";
            ?>
                    <script>
                        alert("請先建立新訂單");
                    </script>
            <?php
                    echo '<meta http-equiv=REFRESH CONTENT=0.5;url=Create_ORDMAS1.php>';
                }
            }
            else{
            ?>
                    <script>
                        alert("請先登入或註冊");
                    </script>
            <?php
                echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePages/index.php>';
            }
            ?>
        </div>
      </section>
    </div>
  </body>
</html>