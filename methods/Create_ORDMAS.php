<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三三吾鄉手工皂 建立訂單</title>
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
//$CUSIDT = $_SESSION['CUSIDT'];
if($EMAIL != null){
	echo "<form name=\"form\" method=\"post\" action=\"Create_ORDMAS_finish.php\">";
    echo "訂單種類*：<select name=\"ORDTYPE\" /> <br>";
    echo "<option value=\"G\">正常</option>";
	echo "<option value=\"S\">特別處理</option> </select>";
	echo "  選擇特別處理將需要額外的費用<br>";
    echo "額外指令：<textarea name=\"ORDINST\" cols=\"45\" rows=\"5\"></textarea> <br>";
    echo "<input type=\"submit\" name=\"button\" value=\"確定\" />";
    echo "</form>";
?>
<a href="../Homepages/product_customer.php">取消</a>
<?php
}
else{
	echo '請先登入或註冊!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePages/index.php>';
}
?>