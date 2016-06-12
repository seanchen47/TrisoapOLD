<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三三吾鄉手工皂 顧客首頁</title>
<?php
	include("../methods/mysql_connect.php");
	$EMAIL = $_SESSION['EMAIL'];
	$CUSIDT = $_SESSION['CUSIDT'];
	if($EMAIL != null){
		if($CUSIDT == 'A'){
			echo '<meta http-equiv=REFRESH CONTENT=2;url=HomePage_Manager.php>';
		}
		else{
			$queryCUSNM = "SELECT CUSNM FROM CUSMAS where EMAIL = '$EMAIL'";
			$result = mysql_query($queryCUSNM);
			$row = mysql_fetch_row($result);
			print "嗨嗨，這裡是三三主頁 <br>";
			print "$row[0]，您好<br>";
	?>
	<a href="../Product/Product.php">前往商品頁</a> <br>
	<a href="../Message/Message.php">前往留心語頁</a> <br>
	<a href="../Order/ORDMAS.php">前往訂單頁</a> <br>
	<a href="../methods/User_ChangePW.php">更新密碼</a> <br>
	<a href="../methods/Update_CUSMAS.php">更新資料</a> <br>
	<a href="../methods/User_logout.php">登出</a> <br>
	<?php
		}
	}
	else{
        print "您無權限觀看此頁面!";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=HomePage.php>';
	}
?>
