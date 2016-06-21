<?php session_start(); ?>
<title>三三吾鄉手工皂 強制結束訂單</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null){
        if($CUSIDT == 'A'){
                $ORDNO = $_POST['ORDNO'];
                echo "<form name=\"form\" method=\"post\" action=\"Update_ORDMAS_F_finish.php\">";
                echo "<input type=\"hidden\" name=\"ORDNO\" value=\"$ORDNO\" />";
                $queryORDNO = "SELECT * FROM ORDMAS WHERE ORDNO='$ORDNO'";
                $result = mysql_query($queryORDNO);
                $row = mysql_fetch_array($result);
                    echo "訂單編號：".$ORDNO."<br>";
                    echo "訂單種類：".$row['ORDTYPE']."<br>";
                    echo "顧客編號：".$row['CUSNO']."<br>";
                    echo "額外指令：".$row['ORDINST']."<br>";
                    echo "訂購商品：<br>";
                    
                    $queryDetail = "SELECT * FROM ORDITEMMAS WHERE ORDNO='$ORDNO'";
                    $Detail = mysql_query($queryDetail);
                    while($item = mysql_fetch_array($Detail)){
                        $ITEMNO = $item['ITEMNO'];
                        $ITEMAMT = $item['ORDAMT'];
                        $queryITEMNM = "SELECT * FROM ITEMMAS where ITEMNO='$ITEMNO'";
                        $queryName = mysql_query($queryITEMNM);
                        $name = mysql_fetch_row($queryName);
                        echo "商品編號：".$ITEMNO." 商品名稱：".$name[1]." 商品價格：".$name[3]." 訂購數量：".$ITEMAMT." 總價：".$name[3]*$ITEMAMT."<br>";
                    }

                    echo "訂單總額：".$row['TOTALPRICE']."<br>";
                    echo "運輸費用：".$row['SHIPFEE']."<br>";
                    echo "訂單總值：".$row['TOTALAMT']."<br>";
                    echo "建立日期：".$row['CREATEDATE']."</br>";

                    echo "訂單狀態：<select name=\"ORDSTAT\" >";
                    echo "<option value=\"F\">強制結束</option>";
                    echo "<option value=\"C\">已完成</option>";
                    echo "<option value=\"D\">刪除</option>";
                    echo "</select> <br>";
                    echo "<input type=\"submit\" name=\"button\" value=\"儲存\" />";
                    echo "</form>";
?>
<a href="Update_ORDMAS_F.php">返回</a> <br>
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