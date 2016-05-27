<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三三吾鄉手工皂 管理員首頁</title>
<?php
	include("mysql_connect.php");
	$EMAIL = $_SESSION['EMAIL'];
	$CUSIDT = $_SESSION['CUSIDT'];
	if($EMAIL != null){
		if($CUSIDT == 'A'){
			$queryCUSNM = "SELECT CUSNM FROM CUSMAS where EMAIL = '$EMAIL'";
			$result = mysql_query($queryCUSNM);
			$row = mysql_fetch_row($result);
			print "嗨嗨，這裡是三三主頁 <br>";
			print "$row[0]，您好<br>";	
?>
普通功能：<br>
<a href="Product.php">前往商品頁</a> <br>
<a href="Message.php">前往留心語頁</a> <br>
<a href="ORDMAS.php">前往訂單頁</a> <br>
<a href="User_ChangePW.php">更新密碼</a> <br>
<a href="Update_CUSMAS.php">更新資料</a> <br>
管理員功能：<br>
<a href="Update_Manager.php">前往管理管理員</a> <br>
<a href="Update_ITEMMAS.php">前往管理商品</a> <br>
<a href="Update_ORDMAS.php">前往管理訂單</a> <br>
<a href="Update_MSGMAS.php">前往管理留心語</a> <br><br>
<a href="User_logout.php">登出</a> <br>
<?php
		}
		else{
			print "您無權限觀看此頁面!";
        	echo '<meta http-equiv=REFRESH CONTENT=2;url=HomePage_Customer.php>';
		}
	}
	else{
        print "您無權限觀看此頁面!";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=HomePage.php>';
	}
?>