<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三三吾鄉手工皂 顧客更新密碼</title>
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
if($EMAIL != null){
?>
<form name="form" method="post" action="User_ChangePW_finish.php">
原始密碼：<input type="password" name="CUSPW" /> <br>
新密碼：<input type="password" name="newCUSPW1" /> <br>
再一次輸入新密碼：<input type="password" name="newCUSPW2" /> <br>
<input type="submit" name="button" value="確定" />
</form>
<?php
	if($CUSIDT == 'A'){
?>
<a href="../HomePage/HomePage_Manager.php">取消</a>
<?php
	}
	else{
?>
<a href="../HomePage/HomePage_Customer.php">取消</a>
<?php
	}
}
else{
	echo '您無權限觀看此頁面!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePage/HomePage.php>';
}
?>