<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$message = null;

if($EMAIL != null){
        if($CUSIDT == 'A'){
                $ORDNO = $_POST['ORDNO'];
                $ORDSTAT = $_POST['ORDSTAT'];
                $UPDATEDATE = date("Y-m-d H:i:s");
                if($ORDSTAT == 'F')
                        $sql = "UPDATE ORDMAS SET ORDSTAT='$ORDSTAT', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
                if($ORDSTAT == 'C'){
                        $queryDetail = "SELECT * FROM ORDITEMMAS WHERE ORDNO='$ORDNO'";
                        $Detail = mysql_query($queryDetail);
                        while($item = mysql_fetch_array($Detail)){
                                $ITEMNO = $item['ITEMNO'];
                                $ITEMAMT = $item['ITEMAMT'];
                                $queryAMT = "SELECT * FROM ITEMMAS WHERE ITEMNO='$ITEMNO'";
                                $result = mysql_query($queryAMT);
                                $AMT = mysql_fetch_row($result);
                                if($AMT[7] == 0){
                                        $message = $message . ""$AMT[1]"目前下架中，儲存失敗<br>";
                                        $sql = "UPDATE ORDMAS SET BACKCODE='1', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
                                }
                                elseif($AMT[2] - $ITEMAMT < 0){
                                        $message = $message . ""$AMT[1]"數量不足，儲存失敗<br>";
                                        $sql = "UPDATE ORDMAS SET BACKCODE='1', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
                                }
                        }
                        if($message == null){
                                $_SESSION['ORIGIN'] = '1';
                                echo '<meta http-equiv=REFRESH CONTENT=2;url=Update_ORDMAS_finish.php>';
                        }
                }
                mysql_query($sql);
                if($message == null)
                        echo "儲存成功";
                else
                        echo $message;
                echo '<meta http-equiv=REFRESH CONTENT=2;url=Update_ORDMAS_1.php>';
        }
        else{
                echo '您無權限觀看此頁面!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=HomePage_Customer.php>';
        }
}
else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=HomePage.php>';
}
?>