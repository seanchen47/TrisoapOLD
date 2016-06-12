<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>三三社企-註冊</title>

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
				<h2>Sign Up</h2>
			</div>
			<form name="form" method="post" action="Create_CUSMAS_finish.php">
				<label for="username">電子信箱*<input type="text" name="EMAIL" />  您的姓名*<input type="text" name="CUSNM" /></label><br>
				<label for="password">設定密碼*<input type="password" name="CUSPW1" />  再次輸入*<input type="password" name="CUSPW2" /></label><br>			
				<label for="username">生日_年*<input type="text" name="CUSBIRTHY" /> 生日_月*<input type="text" name="CUSBIRTHM" /> </label><br>
				
				<label for="username">生日_日*<input type="text" name="CUSBIRTHD" />  您的電話<input type="text" name="TEL"/></label><br>
				<label for="username">您的地址<input type="text" name="CUSADD" />  統一編號<input type="text" name="TAXID" /></label><br>
				<label for="username">
					<div class="styled-select">您的膚質*<select name="CUSTYPE">
						<option value=""></option>
					  	<option value="A">乾性</option>
					  	<option value="B">中性</option>
					  	<option value="C">油性</option>
					  	<option value="D">混和性</option>
					</select>  
					如何認識三三*<select name="KNOWTYPE">
						<option value=""></option>
						<option value="A">粉絲專頁</option>
						<option value="B">親友介紹</option>
						<option value="C">媒體宣傳</option>
						<option value="D">實體攤位</option>
						<option value="E">其它</option>
					</select>
					</div>
				</label>
				<label for="username">特殊要求<textarea name="SPEINS" cols="33" rows="3" ></textarea></label><br>
				<!--
				<input type="submit" name="button" value="註冊" />
				-->
				
			<!--
				<label for="username">Username</label>
				<br/>
				<input type="text" id="username">
				<br/>
				<label for="password">Password</label>
				<br/>
				<input type="password" id="password">
				<br/>
			-->
				<button type="submit">Sign Up</button>
			<!--
				<br/>
				<a href="#"><p class="small">Forgot your password?</p></a>
			-->
			</form>
			<button type="button"></buttom><a href="../Homepages/index.html">取消</a>
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