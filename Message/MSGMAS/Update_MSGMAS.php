<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="image/icon/favicon.png">
		<title>留心語管理</title>
		<meta name="author" content="2016 NTUIM SA GROUP7">
		<meta name="description" content="">
		<!-- bootstrap css -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- custim css -->
		<link href="css/style.css" rel="stylesheet">
	</head>
	<body id="page-top">
		<?php
			include("../../methods/mysql_connect.php");
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
							<a href="../../HomePages/index_manager.php">
								回三三首頁<i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="../Message.php">
								回留心語首頁<i class="fa fa-angle-down" aria-hidden="true"></i>
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
							<a href="../../methods/User_logout.php">
								登出<i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<section>
			<div class="container">
				<h2>留言管理</h2>
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
								<li><a data-toggle="pill" href="#sent">已送出</a></li>
								<li><a data-toggle="pill" href="#pass">已通過</a></li>
								<li><a data-toggle="pill" href="#fail">未通過</a></li>
								<li><a data-toggle="pill" href="#published">公開中</a></li>
								<li><a data-toggle="pill" href="#epic">典藏</a></li>
								<li><a data-toggle="pill" href="#letter">編輯信件</a></li>
							</ul>
						</div>
						<a href="#" class="btn btn-primary col-xs-1 col-xs-offset-7 col-sm-offset-2 col-md-offset-4">儲存</a>
					</div>
					<div class="row table-responsive">
						<div class="tab-content">
						<!-- use php for loop to generate each pill -->
						<?php for($i = 0; $i < 6; $i++) { ?>
						
						<!-- 全部 -->
						<?php switch($i):
						case 0:
							$queryMessage = "SELECT * FROM MSGMAS WHERE ACTCODE = '1'"; ?>
							<div id="all" class="tab-pane fade in active">
						<?php break; ?>
						
						<!-- 已送出 -->
						<?php
						case 1:
							$queryMessage = "SELECT * FROM MSGMAS WHERE MSGSTAT = 'A' AND ACTCODE = '1'"; ?>
							<div id="sent" class="tab-pane fade">
						<?php break; ?>
						
						<!-- 已通過 -->
						<?php
						case 2:
							$queryMessage = "SELECT * FROM MSGMAS WHERE MSGSTAT = 'B' AND ACTCODE = '1'"; ?>
							<div id="pass" class="tab-pane fade">
						<?php break; ?>
						
						<!-- 未通過 -->
						<?php
						case 3:
							$queryMessage = "SELECT * FROM MSGMAS WHERE MSGSTAT = 'C' AND ACTCODE = '1'"; ?>
							<div id="fail" class="tab-pane fade">
						<?php break; ?>
						
						<!-- 公開中 -->
						<?php
						case 4:
							$queryMessage = "SELECT * FROM MSGMAS WHERE MSGSTAT = 'D' AND ACTCODE = '1'"; ?>
							<div id="published" class="tab-pane fade">
						<?php break; ?>
						
						<!-- 典藏 -->
						<?php
						case 5:
							$queryMessage = "SELECT * FROM MSGMAS WHERE MSGSTAT = 'E' AND ACTCODE = '1'"; ?>
							<div id="epic" class="tab-pane fade">
						<?php break; ?>
						
						<?php endswitch; ?>
								<!-- pill content -->
								<table class="table table-hover">
									<thead>
										<tr>
											<td>留言編號</td>
											<td>留言時間</td>
											<td>相片/影片</td>
											<td>留言內容</td>
											<td>顧客帳號</td>
											<td>審核狀態</td>
											<td>審核</td>
										</tr>
									</thead>
									<tbody>
									<?php
										$result = mysql_query($queryMessage);
										while($row = mysql_fetch_array($result)){
									?>
										<tr>
											<!-- 留言編號 -->
											<td>
												<?php
													echo $row['MSGNO'];
												?>
											</td>
											<!-- 留言時間 -->
											<td>
												<?php
													echo $row['CREATEDATE'];
												?>
											</td>
											<!-- 相片/影片 -->
											<td>
												<?php
													if($row['MSGVIDEO'] == null){
														$PHOTOTYPE = $row['PHOTOTYPE'];
														$PHOTO = base64_decode($row['PHOTO']);
														echo "照片";
														// echo $PHOTO;
													}
													else{
														echo "影片";
														// echo $MSGVIDEO;
													}
												?>
											</td>
											<!-- <video controls>
													<source src="video/machine_civilization.mp4" type="video/mp4">
													Your browser does not support the <code>video</code> element.
												</video> -->
											<!-- 留言內容 -->
											<td>
												<?php
													echo $row['MSGTXT'];
												?>
											</td>
											<!-- 顧客帳號 -->
											<td>
												<?php
													echo $row['EMAIL'];
												?>
											</td>
											<!-- 審核狀態 default: 等待 -->
											<td id="current_status">等待</td>
											<!-- 審核dropdown -->
											<td>
												<select name="check" id="status" onchange="changeStatus()">
													<option value="" disabled selected>請選擇狀態</option>
													<option value="pass">通過</option>
													<option value="fail">拒絕</option>
												</select>
											</td>
										</tr>
									<?php
										}
									?>
									</tbody>
								</table>
							</div>
						<?php } ?>
							<div class="tab-pane fade">
								<table class="table table-hover">
									<thead>
										<tr>
											<td>信件編號</td>
											<td>信件種類</td>
											<td>信件內容</td>
											<td>編輯</td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><a href="#">L001</a></td>
											<td>接受留言</td>
											<td>
												xxx您好，感謝您喜愛並支持三三吾香皂的產品，收到您的留言我們非常開心…
											</td>
											<td>
												<a href="#" class="btn">編輯</a>
											</td>
										</tr>
										<tr>
											<td><a href="#">L002</a></td>
											<td>婉拒留言</td>
											<td>
												xxx您好，感謝您喜愛並支持三三吾香皂的產品，收到您的留言我們非常開心，但是…
											</td>
											<td>
												<a href="#" class="btn">編輯</a>
											</td>
										</tr>
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
		        	echo '<meta http-equiv=REFRESH CONTENT=2;url=../../HomePages/index_Customer.php>';
				endif;
			else:
		        print "您無權限觀看此頁面!";
		        echo '<meta http-equiv=REFRESH CONTENT=2;url=../../HomePages/index.php>';
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