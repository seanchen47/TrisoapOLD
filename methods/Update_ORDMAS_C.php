<?php session_start(); ?>
<title>三三吾鄉手工皂 已完成訂單</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null){
        if($CUSIDT == 'A'){
        		echo "已完成訂單：<br>";
                $queryORDMAS = "SELECT * FROM ORDMAS WHERE ACTCODE=1 AND ORDSTAT='C'";
                $result = mysql_query($queryORDMAS);
                while($row = mysql_fetch_array($result)){
                    $ORDNO = $row['ORDNO'];
  					echo "訂單編號:";
                    
                    echo "<form name=\"form\" method=\"post\" action=\"View_ORDITEM_C.php\">";
                    echo "<input type=\"hidden\" name=\"ORDNO\" value=\"$ORDNO\" />";
                    echo "<input type=\"submit\" name=\"button\" value=\"$ORDNO\" />";
                    echo "</form>";
                    
                    echo "訂單種類:".$row['ORDTYPE']." 顧客編號:".$row['EMAIL']." 發票編號:".$row['INVOICENO']." 訂單狀態:".$row['ORDSTAT']." 額外指令:".$row['ORDINST']." 訂單總額:".$row['TOTALPRICE']." 訂單總值:".$row['TOTALAMT']." 建立日期:".$row['CREATEDATE']."</br>";
  				}
  				echo "<br>";
?>
<a href="Update_ORDMAS.php">返回</a> <br>
<?php
        }
        else{
                echo '您無權限觀看此頁面!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePages/index_customer.php>';
        }
}
else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePages/index.php>';
}