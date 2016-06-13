<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三三吾鄉手工皂 留心語頁</title>
嗨嗨，這裡是三三留心語頁 <br>
<?php
include("../methods/mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$queryMessage = "SELECT * FROM MSGMAS WHERE MSGSTAT = 'D' AND ACTCODE = '1'";
$result = mysql_query($queryMessage);
while($row = mysql_fetch_array($result)){
	echo "留言編號:".$row['MSGNO']." 顧客編號:".$row['CUSNO']." 留言文字:".$row['MSGTXT']." 留言時間:".$row['CREATEDATE']."";
	if($row['MSGVIDEO'] == null){
		if($row['MSGPHOTO'] != null){
			$PHOTOTYPE = $row['PHOTOTYPE'];
			$PHOTO = base64_decode($row['PHOTO']);
			echo " 留言照片:";
			// echo $PHOTO;
			echo " </br>";
		}
	}
	else{
		echo " 留言影片:";
		// echo $MSGVIDEO;
		echo " </br>";
	}
}
?>
<a href="../methods/Create_MSGMAS.php">新增留心語</a> <br>
<?php
if($EMAIL == null){
?>
<a href="../HomePage/HomePage.php">返回首頁</a> <br>
<?php
}
else{
	if($CUSIDT == 'A'){
?>
		<a href="../HomePage/HomePage_Manager.php">返回首頁</a> <br>
<?php
	}
	else{
?>
		<a href="../HomePage/HomePage_Customer.php">返回首頁</a> <br>
<?php
	}
}
?>
