<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>三三社企-登入</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="top">
			<!--
			<h1 id="title" class="hidden"><span id="logo">Daily <span>UI</span></span></h1>
			-->
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>登入</h2>
			</div>
			<form name="form" method="post" action="User_login_finish.php">
				<label for="username">電子信箱<br><input type="text" name="EMAIL" /></label><br>
				<label for="password">密碼<br><input type="password" name="CUSPW" /></label><br>
				<button type="submit">登入</button>
			<!--
				<br/>
				<a href="#"><p class="small">Forgot your password?</p></a>
			-->
			</form>
			<button type="button"></buttom><a href="../Homepages/index.php">取消</a>
		</div>
	</div>
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