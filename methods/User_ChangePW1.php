<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>三三社企-修改密碼</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
	<?php
	include("mysql_connect.php");
	$EMAIL = $_SESSION['EMAIL'];
	$CUSIDT = $_SESSION['CUSIDT'];
	if($EMAIL != null){
	?>
	<div class="container">
		<div class="top">
			<!--
			<h1 id="title" class="hidden"><span id="logo">Daily <span>UI</span></span></h1>
			-->
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>修改密碼</h2>
			</div>
			<form name="form" method="post" action="User_ChangePW_finish.php">
				<label for="password">原始密碼<br><input type="password" name="CUSPW" /></label><br>
				<label for="username">密碼限定使用英數字，長度上限為15字元</label><br>
				<label for="password">新密碼<br><input type="password" name="newCUSPW1" /></label><br>
				<label for="password">再一次輸入新密碼<br><input type="password" name="newCUSPW2" /></label><br>
				
				<button type="submit">確定</button>
			<!--
				<br/>
				<a href="#"><p class="small">Forgot your password?</p></a>
			-->
			</form>
			<?php
			if($CUSIDT == 'A'){
			?>
				<button type="button"></buttom><a href="../Homepages/index_manager.php">取消</a>
			<?php
			}
			else{
			?>
				<button type="button"></buttom><a href="../Homepages/index_customer.php">取消</a>
		</div>
	</div>
	<?php
			}
	}
	else{
		echo '您無權限觀看此頁面!';
    	echo '<meta http-equiv=REFRESH CONTENT=2;url=../Homepages/index.php>';
	}
	?>
</body>

<script>
	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown');
    	$("input:text:visible:first").focus();
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
</script>

</html>