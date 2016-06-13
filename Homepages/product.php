<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/misc/favicon.png">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>三三社企-如何購皂
    </title>
    <!-- Bootstrap Core CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS-->
    <link href="css/trisoap1.css" rel="stylesheet">
    <!--other pages-->
    <link rel="stylesheet" href="assets/css/main.css">
    <!--end other pages-->

  </head>

  <body>
    <?php
    //include("../methods/mysql_connect.php");
    //$EMAIL = $_SESSION['EMAIL'];
    ?>
    <!-- Navigation-->
    <nav class="navbar navbar-custom navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" data-toggle="collapse" data-target=".navbar-main-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <!-- Img or text logo--><img src="img/test_sharon/logo5.png" alt="" class="logo"></a>

        </div>
        <div class="collapse navbar-collapse navbar-main-collapse">
          <ul class="nav navbar-nav navbar-left">
            <li class="hidden"><a href="#page-top"></a></li>
            <li><a href="../Homepages/index.php">首頁<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            <!--  
            <li><a href="about.html">關於三三<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            
            <li><a href="product.html">產品故事<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            -->
            <li><a href="story.html">三三故事<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            
            <li><a href="../Homepages/product.php">如何購皂<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>

            <li><a href="faq.html">顧客問答<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>

            <li><a href="../Message/Message.php">留心語<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            <!--
            <li><a href="contact.html">聯絡我們<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            -->
            <li class="dropdown"><a href="#" class="dropdown-toggle"><span class="lang">註冊/登入</span><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="../methods/Create_CUSMAS1.php">註冊</a></li>
                <li><a href="../methods/User_login1.php">登入</a></li>
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
        
    <!--Products Section-->
    <?php
    //if($EMAIL == null){
    ?>
    <div id="wrapper">
        <!-- Header -->
          <header id="header">
            <span class="avatar"><img src="images/tri.png" alt="" /></span>
          </header>
        <!--Product-->  
        <section id="about-slider">
            <div class="container">
                <!--product1-->
                <div class="row">
                    <div class="col-lg-5">
                        <div class="carousel slide carousel-fade">
                            <div><img src="images/test/soap1.jpg" alt="" height=250 width=430></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-lg-offset-1">
                        <h2>咖啡香皂 NT$300/塊</h2>
                        <p>咖啡芳香療法已經有900年以上的歷史了，<br>咖啡芳香療法可以讓大腦抵抗更大的壓力、防止氧化、
                        提高代謝。<br>你或許不喜歡喝咖啡或身體不允許喝咖啡，但你可以考慮以咖啡制<br>手工皂，來進行咖啡芳箱療法。
                        </p><br>
                        <a href="#" class="btn btn-dark" onclick="myFunction()">加入購物車</a>
                        <script>
                            function myFunction() {
                            alert("請先登入或註冊");
                        }
                        </script><br>
                    </div>
                </div>
                <!--product2-->
                <div class="row">
                    <div class="col-lg-5">
                        <div class="carousel slide carousel-fade">
                            <div><img src="images/test/soap2.jpg" alt="" height=250 width=430></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-lg-offset-1">
                        <h2>稻米香皂 NT$270/塊</h2>
                        <p>調製過程中不添加化學藥劑及介面活性劑，不會刺激肌膚，這種<br>香皂散髮香米香味，具有清潔、
                        保濕、滋潤及美白功效，提升稻<br>米的附加價值。</p><br>
                        <a href="#" class="btn btn-dark" onclick="myFunction()">加入購物車</a>
                        <script>
                            function myFunction() {
                            alert("請先登入或註冊");
                        }
                        </script><br>
                    </div>
                </div>
                <!--product3-->
                <div class="row">
                    <div class="col-lg-5">
                        <div class="carousel slide carousel-fade">
                            <div><img src="images/test/soap3.jpg" alt="" height=250 width=430></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-lg-offset-1">
                        <h2>薰衣草香皂 NT$320/塊</h2>
                        <p>薰衣草能舒緩肌膚，並平衡肌膚的油脂分泌，溫和的質地可幫助<br>紓解肌膚，
                        使用後柔潤舒適不乾澀，給予肌膚滋養效用，
                        讓您擁<br>有柔嫩美肌，散發出的自然香氣，適合全家大小使用。</p><br>
                        <a href="#" class="btn btn-dark" onclick="myFunction()">加入購物車</a>
                        <script>
                            function myFunction() {
                            alert("請先登入或註冊");
                        }
                        </script><br>
                    </div>
                </div>
                <!--product4-->
                <div class="row">
                    <div class="col-lg-5">
                        <div class="carousel slide carousel-fade">
                            <div><img src="images/test/soap4.jpg" alt="" height=250 width=430></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-lg-offset-1">
                        <h2>柳橙香皂 NT$300/塊</h2>
                        <p>秋末冬初正是柳丁豐收的季節，柳丁除了含有豐富膳食纖維與維<br>生素外，
                        從裡到外都有股甜甜淡淡的清香，讓人充滿幸福感。</p><br><br>
                        <a href="#" class="btn btn-dark" onclick="myFunction()">加入購物車</a>
                        <script>
                            function myFunction() {
                            alert("請先登入或註冊");
                        }
                        </script><br>
                    </div>
                </div>
            </div>
        </section>
    
    <!--other pages-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.poptrox.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!--end other pages-->

    <!-- jQuery-->
    <!--
    <script src="js/jquery-1.12.3.min.js"></script>
    -->
    <!-- Bootstrap Core JavaScript-->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript-->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/device.min.js"></script>
    <script src="js/form.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/jquery.shuffle.min.js"></script>
    <script src="js/jquery.parallax.min.js"></script>
    <script src="js/jquery.circle-progress.min.js"></script>
    <script src="js/jquery.swipebox.min.js"></script>
    <script src="js/smoothscroll.min.js"></script>
    <script src="js/tweecool.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.smartmenus.js"></script>
  
        <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3E86i8mx1BZDlAaLcknh_mWl4F70i4os"></script>
        <script src="js/map.js"></script>
      
    <!-- Custom Theme JavaScript-->
    <script src="js/pheromone.js"></script>
  
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php            
        //}
    ?>
  </body>
</html>