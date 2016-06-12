<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
//$ITEMNO = $_SESSION['ITEMNO'];
$ORDNO = $_SESSION['ORDNO'];
//$ITEMAMT = htmlentities($_POST['ITEMAMT']);


//for nothing choosed
if($EMAIL != null){
	if($ORDNO != null){
		//echo "將把您導向商品頁<br>";
		echo '<meta http-equiv=REFRESH CONTENT=0.5;url=../Homepages/product_customer.php>';
	}
}
?>