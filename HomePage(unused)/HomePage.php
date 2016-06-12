<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三三吾鄉手工皂 首頁</title>
<?php
	include("../methods/mysql_connect.php");
	$EMAIL = $_SESSION['EMAIL'];
	$CUSIDT = $_SESSION['CUSIDT'];
	if($EMAIL == null){
		print "嗨嗨，這裡是三三主頁 <br>";
?>
		<a href="../Product/Product.php">前往商品頁</a> <br>
		<a href="../Message/Message.php">前往留心語頁</a> <br>
		<a href="../methods/Create_CUSMAS.php">註冊</a> <br>
		<a href="../methods/User_login.php">登入</a> <br>
<?php
	}	
	else{
		if($CUSIDT == 'A')
			echo '<meta http-equiv=REFRESH CONTENT=2;url=HomePage_Manager.php>';
        else($CUSIDT == 'B')
        	echo '<meta http-equiv=REFRESH CONTENT=2;url=HomePage_Customer.php>';
	}
?>