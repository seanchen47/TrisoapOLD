<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$ITEMNO = $_SESSION['ITEMNO'];
$ORDNO = $_SESSION['ORDNO'];
$ITEMAMT = htmlentities($_POST['ITEMAMT']);

if($EMAIL != null){
	if($ITEMNO != null){
		if($ORDNO == null){
			echo "請先建立訂單<br>";
			echo '<meta http-equiv=REFRESH CONTENT=2;url=Create_ORDMAS.php>';
		}
		else{
			$CREATEDATE = date("Y-m-d H:i:s");
        	$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "insert into ORDITEMMAS (ORDNO, ITEMNO, ITEMAMT, CREATEDATE, UPDATEDATE) values ('$ORDNO', '$ITEMNO', '$ITEMAMT', '$CREATEDATE', '$UPDATEDATE')";
			unset($_SESSION['ITEMNO']);
			if(mysql_query($sql)){
				echo "成功加入購物車<br>";
				include("Update_PRICE.php");
?>
				<a href="Product.php">繼續購物</a> <br>
				<a href="Cashing.php">結帳</a> <br>
<?php
			}
			else{
				echo "加入購物車失敗<br>";
				echo '<meta http-equiv=REFRESH CONTENT=2;url=Product.php>';
			}
		}
	}
	else{
		echo "將把您導向商品頁<br>";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=Product.php>';
	}
}
else{
	echo '您無權限觀看此頁面!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=HomePage.php>';
}
?>