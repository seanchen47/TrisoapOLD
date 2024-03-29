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
    <title>三三社企-管理
    </title>
    <!-- Bootstrap Core CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS-->
    <link href="css/trisoap.css" rel="stylesheet">
  </head>
  <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" class="top">
    <?php
      include("../methods/mysql_connect.php");
      $EMAIL = $_SESSION['EMAIL'];
      $CUSIDT = $_SESSION['CUSIDT'];
      if($EMAIL != null){
        if($CUSIDT == 'A'){
          $queryCUSNM = "SELECT CUSNM FROM CUSMAS where EMAIL = '$EMAIL'";
          $result = mysql_query($queryCUSNM);
          $row = mysql_fetch_row($result);
    ?>
    <!-- Preloader-->
    <div id="preloader">
      <div id="status"></div>
    </div>
    <!-- Navigation-->
    <nav class="navbar navbar-custom navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <h5>
          <?php
              //print "嗨嗨，這裡是三三主頁 <br>";
              print "$row[0]，您好<br>";
          ?>
          </h5>
        
          <!--
          <button type="button" data-toggle="collapse" data-target=".navbar-main-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="#page-top" class="navbar-brand page-scroll">-->
            <!-- Img or text logo-->
            <!--<img src="img/test_sharon/logo5.png" alt="" class="logo"></a>-->

        </div>
        <div class="collapse navbar-collapse navbar-main-collapse">
          <ul class="nav navbar-nav navbar-left">
            <li class="hidden"><a href="#page-top"></a></li>
            <li><a href="../Homepages/index_manager.php">首頁<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            <!--  
            <li><a href="about.html">關於三三<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            
            <li><a href="product.html">產品故事<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            -->
            <li><a href="story.html">三三故事<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            
            <li><a href="../Homepages/product_manager.php">如何購皂<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>

            <li><a href="faq.html">顧客問答<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>

            <li><a href="../Message/Message.php">留心語<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            <!--
            <li><a href="contact.html">聯絡我們<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            -->
            
            <li class="dropdown"><a href="#" class="dropdown-toggle"><span class="lang">管理平台</span><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="../Manager/Update_Manager.php">權限管理</a></li>
                <li><a href="../methods/Update_ITEMMAS1.php">商品管理</a></li>
                <li><a href="../methods/Update_ORDMAS.php">訂單管理</a></li>
                <li><a href="../Message/MSGMAS/Update_MSGMAS.php">留心語管理</a></li>
                <!--<li><a href="../methods/User_logout.php">登出</a></li>-->
              </ul>
            </li>
            
            <li class="dropdown"><a href="#" class="dropdown-toggle"><span class="lang">會員中心/登出</span><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="../Order/ORDMAS.php">查看訂單</a></li>
                <li><a href="../methods/Update_CUSMAS1.php">修改資料</a></li>
                <li><a href="../methods/User_ChangePW1.php">修改密碼</a></li>
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
    <!-- Header-->
    <header data-background="img/test_sharon/pic1.jpg" class="intro">
    <!-- data-background="img/header/5.jpg" -->
      <!-- Intro Header-->
      <div class="intro-body">
        
        <h1>三三 吾鄉皂</h1>
       
        <div data-wow-delay="1.4s" class="scroll-btn hidden-xs wow fadeInDown"><a href="#about" class="page-scroll"><span class="mouse"><span class="weel"><span></span></span></span></a></div>
      </div>
    </header>
    
    <!-- Services Section-->
    <section id="services">
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <h3>三個故事 Tri  Story</h3>
            <p>一切都是從一個座落在寧靜城市裡的、專門開辦二手販售以及手工皂
            製作的小型作業所---「李勝賢文教基金會」開始的</p>
          </div>
       
      </div>
    </section>
    
    <!-- Slider Section-->
    <section id="about-slider">
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <h3>愛的釀皂</h3>
            <p>我們故事的第一主角，就是一個個穿上工作服、蓄勢待發地在一旁準備的憨兒們。我們在學習打皂時，他們活像個監督我們生產流程的督導一般<br>我們非常迅速地在「攪拌」關卡中，不到十分鐘便棄械投降，一旁的憨兒主動地替補了我們的工作，在測量每一種油品時的專注力高的嚇人，連一滴油都不會逃過他們的法眼，當時的我們，深深被這一幅畫面所震懾。</p><a href="#" target="_blank" class="btn btn-dark">更多</a>
          </div>
          <div class="col-lg-6 col-lg-offset-1">
            <div id="carousel-light" class="carousel slide carousel-fade">
              <ol class="carousel-indicators">
                <li data-target="#carousel-light" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-light" data-slide-to="1"></li>
                <li data-target="#carousel-light" data-slide-to="2"></li>
              </ol>
              <div role="listbox" class="carousel-inner">
                <div class="item active"><img src="img/test_sharon/pic2-2.jpg" alt="" class="img-responsive center-block"></div>
                <div class="item"><img src="img/test_sharon/pic2-2.jpg" alt="" class="img-responsive center-block"></div>
                <div class="item"><img src="img/test_sharon/pic2-3.jpg" alt="" class="img-responsive center-block"></div>
                <!--
                <div class="item active"><img src="img/slider/2.png" alt="" class="img-responsive center-block"></div>
                <div class="item"><img src="img/slider/1.png" alt="" class="img-responsive center-block"></div>
                <div class="item"><img src="img/slider/3.png" alt="" class="img-responsive center-block"></div>
                -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Slider Section-->
    <section id="about-slider">
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <h3>吾鄉小農</h3>
            <p>第二個故事主角，就是位於台東的在地小農與三樣特色農作物－米、金針花跟釋迦。<br>
會成為我們主角的原因很簡單，因為他們堅持好品質、有機，照顧農作物像照顧自己的孩子一樣，用山泉水灌溉並使用自然農法，他們的堅持正完全符合我們的經營理念！</p><a href="#" target="_blank" class="btn btn-dark">更多</a>
          </div>
          <div class="col-lg-6 col-lg-offset-1">
            <div id="carousel-light" class="carousel slide carousel-fade">
              <ol class="carousel-indicators">
                <li data-target="#carousel-light" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-light" data-slide-to="1"></li>
                <li data-target="#carousel-light" data-slide-to="2"></li>
              </ol>
              <div role="listbox" class="carousel-inner">
                <div class="item active"><img src="img/slider/2.png" alt="" class="img-responsive center-block"></div>
                <div class="item"><img src="img/slider/1.png" alt="" class="img-responsive center-block"></div>
                <div class="item"><img src="img/slider/3.png" alt="" class="img-responsive center-block"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   

    <!-- Quotes-->
    <section class="section-small bg-img3 text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <p><i class="icon fa fa-quote-left fa-lg"></i></p>
            <h4>社會企業<br><br>第三個故事就是被憨兒們的可愛笑容和在地小農的堅持與用心所深深感動的我們。

在更多的拜訪與研究過後我們發現，
臺灣社福團體做的公益手工皂普遍銷路不佳紛紛面臨困境，不僅人員技術不足、通路不穩、行銷、研發......各項經驗更是挑戰，
讓學員們作皂明明是一件一石二鳥的事情但卻常常成為社福團體的一大困擾。

我們希望串聯起各地區的資源，和社福團體一同打造一個手工皂界的生態。
透過社福團體、社會企業、當地小農三方協力的過程，
並由我們研發當地素材入皂並技術移轉及培訓身障朋友，精煉生產流程再以品牌的力量作行銷與推廣。</h4>

          </div>
        </div>
      </div>
    </section>


    <!-- Footer Section-->
    <section class="footer bg-gray">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3><a href="about.html">關於我們</a></h3>
            <p>一切都是從一個座落在寧靜城市裡的、專門開辦二手販售
以及手工皂製作的小型作業所---「李勝賢文教基金會」開始的參訪李勝賢文教基金會的經驗讓我們留下了深刻的印象那天，我們第一次學做皂，也是第一次深深地被憨兒們打皂時嶄露出來的自信與笑容深深吸引
            </p>
          </div>
          <div class="col-md-4">
            <h3><a href="faq.html">常見問題</a></h3>
            <p>「冷製手工皂」是使用純天然的基底植物油，搭配上鹼水調配
  再經過攪拌、保溫、晾皂等各種精細的過程，而後皂化成一個
  具有不同皂性的產品。有別於一般大型賣場，或是各式衛妝開
  架式商店所販售的工廠壓製肥皂或沐浴精</p>
          </div>
          <div class="col-md-3">
            <h3><a href="contact.html">聯絡我們</a></h3>
            <p><i class="fa fa-phone fa-fw"></i> (03)1234567 <br> <i class="fa fa-envelope fa-fw"></i> loveyou@gamil.com<br> <i class="fa fa-map-marker fa-fw"></i>台灣台北市
            </p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-4">
            <ul class="list-inline">
              <li><a href="/"><i class="fa fa-twitter fa-fw fa-lg"></i></a></li>
              <li><a href="/"><i class="fa fa-facebook fa-fw fa-lg"></i></a></li>
              <li><a href="/"><i class="fa fa-google-plus fa-fw fa-lg"></i></a></li>
              <li><a href="/"><i class="fa fa-linkedin fa-fw fa-lg"></i></a></li>
            </ul>
          </div>
         
          <div class="col-md-3">
            <p class="small">&copy;2016 TriSoap All Rights Reserved</p>
          </div>
        </div>
      </div>
    </section>
    <!-- jQuery-->
    <script src="js/jquery-1.12.3.min.js"></script>
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
      }
      else{
        print "您無權限觀看此頁面!";
            echo '<meta http-equiv=REFRESH CONTENT=2;url=index_Customer.php>';
      }
    }
    else{
          print "您無權限觀看此頁面!";
          echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
    }
    ?>
  </body>
</html>