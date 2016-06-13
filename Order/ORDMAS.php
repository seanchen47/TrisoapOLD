<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="image/icon/favicon.png">
		<title>訂單管理</title>
		<meta name="author" content="2016 NTUIM SA GROUP7">
		<meta name="description" content="">
		<!-- bootstrap css -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- fancybox css -->
		<link href="fancyBox/source/jquery.fancybox.css" rel="stylesheet">
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
					</button>
					<a href="#page-top" class="navbar-brand"><img src="http://placehold.it/125x30" alt="" class="logo"></a>
				</div>
				<div class="collapse navbar-collapse navbar-main-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="../methods/Create_ORDMAS.php">建立訂單</a>
						</li>
						<li>
							<a href="../methods/Delete_ORDMAS.php">取消訂單</a>
						</li>
						<li>
							<a href="../methods/Edit_ORDMAS.php">更新訂單</a>
						</li>
						<li>
							<a href="../HomePages/index_Manager.php">
								回三三首頁<i class="fa fa-angle-down" aria-hidden="true"></i>
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
				<h2>訂單管理</h2>
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
								<li><a data-toggle="pill" href="#received">已收到</a></li>
								<li><a data-toggle="pill" href="#processing">處理中</a></li>
								<li><a data-toggle="pill" href="#out_of_stock">缺貨中</a></li>
								<li><a data-toggle="pill" href="#done">已完成</a></li>
								<li><a data-toggle="pill" href="#suspended">已中止</a></li>
							</ul>
						</div>
						<div class="col-xs-7 col-sm-4 col-xs-offset-2 col-sm-offset-0">
							<form action="#" method="get">
								<input type="text" id="search" name="search_criteria" placeholder="新增搜尋條件">
								<label class="click_label" id="search_label">
									<!-- SVG 放大鏡 -->
									<!-- By: Timothy Miller
									License: Creative Commons (Attribution-Share Alike 3.0 Unported) -->
									<!-- xml version="1.0"
									<!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'> -->
									<svg height="16px" id="Layer_1" style="enable-background:new 0 0 16 16;" version="1.1" viewBox="0 0 16 16" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
										<path d="M15.7,14.3l-3.105-3.105C13.473,10.024,14,8.576,14,7c0-3.866-3.134-7-7-7S0,3.134,0,7s3.134,7,7,7  c1.576,0,3.024-0.527,4.194-1.405L14.3,15.7c0.184,0.184,0.38,0.3,0.7,0.3c0.553,0,1-0.447,1-1C16,14.781,15.946,14.546,15.7,14.3z   M2,7c0-2.762,2.238-5,5-5s5,2.238,5,5s-2.238,5-5,5S2,9.762,2,7z"/>
									</svg>
									<input type="submit" name="submit_search" value="">
								</label>
							</form>
						</div>
					</div>
					<div class="row table-responsive">
						<div class="tab-content">
						<!-- use php for loop to generate each pill -->
						<?php for($i = 0; $i < 6; $i++) { ?>
						
						<?php switch($i):
						// 全部（已付款）
						case 0:
							$queryOrder = "SELECT * FROM ORDMAS WHERE ACTCODE = '1'"; ?>
							<div id="all" class="tab-pane fade in active">
						<?php break; ?>
						
						<?php
						// 已收到
						case 1:
							$queryOrder = "SELECT * FROM ORDMAS WHERE ORDSTAT = 'E' AND PAYSTAT = '1'"; ?>
							<div id="received" class="tab-pane fade">
						<?php break; ?>

						<?php
						// 處理中
						case 2:
							$queryOrder = "SELECT * FROM ORDMAS WHERE ORDSTAT = 'R' AND BACKSTAT = '0'"; ?>
							<div id="processing" class="tab-pane fade">
						<?php break; ?>

						<?php
						// 缺貨中
						case 3:
							$queryOrder = "SELECT * FROM ORDMAS WHERE ORDSTAT = 'R' AND BACKSTAT = '1'"; ?>
							<div id="out_of_stock" class="tab-pane fade">
						<?php break; ?>

						<?php
						// 已完成
						case 4:
							$queryOrder = "SELECT * FROM ORDMAS WHERE ORDSTAT = 'C'"; ?>
							<div id="done" class="tab-pane fade">
						<?php break; ?>

						<?php
						// 已中止
						case 5:
							$queryOrder = "SELECT * FROM ORDMAS WHERE ORDSTAT = 'F'"; ?>
							<div id="suspended" class="tab-pane fade">
						<?php break; ?>

						<?php endswitch; ?>
								<!-- pill content -->
								<table class="table table-hover">
									<thead>
										<tr>
											<td>訂單編號</td>
											<td>建立時間</td>
											<td>訂單種類</td>
											<td>訂單狀態</td>
											<td>付款狀態</td>
											<td>備註</td>
											<td>總計金額</td>
										</tr>
									</thead>
									<tbody>
										<?php
									        $result = mysql_query($queryOrder);
									        while($row = mysql_fetch_array($result)){
									    ?>
										<tr>
											<!-- 訂單編號 -->
											<td>
												<a class="various fancybox.ajax ordnos" rel="group" href="../methods/View_ORDMAS.php">
													<?php
														echo $row['ORDNO'];
													?>
												</a>
											</td>
											<!-- 建立時間 -->
											<td>
												<?php
													echo $row['CREATEDATE'];
												?>
											</td>
											<!-- 訂單種類 -->
											<td>
												<?php
													echo $row['ORDTYPE'];
												?>
											</td>
											<!-- 訂單狀態 -->
											<td>
												<?php
													echo $row['ORDSTAT'];
												?>
											</td>
											<!-- 付款狀態 -->
											<td>
												<?php
													echo $row['PAYSTAT'];
												?>
											</td>
											<!-- 備註 -->
											<td>
												<?php
													echo $row['ORD_INST'];
												?>
											</td>
											<!-- 總計金額 -->
											<td>
												<!-- $ sign -->&#36;
												<?php
													echo $row['TOTALAMT'];
												?>
											</td>
										</tr>
										<?php
											}
										?>
									</tbody>
								</table>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
				else:
					print "您無權限觀看此頁面!";
		        	echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePages/index_Customer.php>';
				endif;
			else:
		        print "您無權限觀看此頁面!";
		        echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePages/index.php>';
			endif;
		?>
	</body>
	<!-- jquery -->
	<script src="js/jquery-1.12.3.min.js"></script>
	<!-- bootstrap js -->
	<script src="js/bootstrap.min.js"></script>
	<!-- fancybox js -->
	<script src="fancybox/source/jquery.fancybox.js"></script>
	<!-- custom js -->
	<script src="js/trisoap.js"></script>
</html>