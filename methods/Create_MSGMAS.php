<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三三吾鄉手工皂 新增留心語</title>
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$message = null;

if($EMAIL != null){
    echo "*部分為必填<br>";
    echo "顧客帳號：$EMAIL <br>";
    echo "<form name=\"form\" method=\"post\" action=\"Create_MSGMAS_finish.php\" Enctype=\"multipart/form-data>";
    echo "<input type=\"hidden\" name=\"MSG\" /> <br>";
    echo "留言文字*：<input type=\"text\" name=\"MSGTXT\" /> <br>";
    echo "留言照片：<input type=\"file\" name=\"MSGPHOTO\" /> <br>";
    echo "留言影片：<input type=\"text\" name=\"MSGVIDEO\" />  請自行上傳後在此輸入網址<br>";
    echo "<input type=\"submit\" name=\"button\" value=\"確定\" />";
    echo "</form>";
    ?>
<a href="../Message/Message.php">取消</a>
<?php
}
else{
	echo '請先登入或註冊!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePages/index.php>';
}
?>