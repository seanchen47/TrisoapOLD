<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三三吾鄉手工皂 訂單頁</title>
嗨嗨，這裡是三三訂單頁 <br>
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
if($EMAIL != null){
        echo "您的所有訂單：<br>";
        $queryOrder = "SELECT * FROM ORDMAS where CUSNO='$EMAIL'";
        $result = mysql_query($queryOrder);
        while($row = mysql_fetch_array($result)){
                $ORDNO = $row['ORDNO'];
                echo "訂單編號:".$ORDNO." 訂單種類:".$row['ORDTYPE']." 訂單狀態:".$row['ORDSTAT']." 付款狀態:".$row['PAYSTAT']." 額外指令:".$row['ORD_INST']." 訂單總值:".$row['TOTALAMT']."<br>";
                echo "<form name=\"form\" method=\"post\" action=\"View_ORDMAS.php\">";
                echo "<input type=\"hidden\" name=\"ORDNO\" value=\"$ORDNO\" />";
                echo "<input type=\"submit\" name=\"button\" value=\"查看詳細資料\" />";
                echo "</form> <br>";
        }
?>
<a href="Create_ORDMAS.php">建立訂單</a> <br>
<a href="Delete_ORDMAS.php">取消訂單</a> <br>
<a href="Edit_ORDMAS.php">更新訂單</a> <br><br>
<?php
        if($CUSIDT == 'A'){
?>
<a href="HomePage_Manager.php">返回首頁</a>
<?php
        }
        else{
?>
<a href="HomePage_Customer.php">返回首頁</a>
<?php
        }
}
else{
        echo '請先登入或註冊!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=HomePage.php>';
}
?>