<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三三吾鄉手工皂 商品頁</title>
嗨嗨，這裡是三三商品頁 <br>
<?php
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
?>
我是商品1 <br>
<a href="Purchase_Item1.php">加入購物車</a> <br>
我是商品2 <br>
<a href="Purchase_Item2.php">加入購物車</a> <br>
我是商品3 <br>
<a href="Purchase_Item3.php">加入購物車</a> <br>
我是商品4 <br>
<a href="Purchase_Item4.php">加入購物車</a> <br>
<?php
if($EMAIL == null){
?>
<a href="HomePage.php">返回首頁</a> <br>
<?php
}
else{
	if($CUSIDT == 'A'){
?>
		<a href="HomePage_Manager.php">返回首頁</a> <br>
<?php
	}
	else{
?>
		<a href="HomePage_Customer.php">返回首頁</a> <br>
<?php
	}
}
?>
