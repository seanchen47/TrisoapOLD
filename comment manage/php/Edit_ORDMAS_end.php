<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$ORDNO = $_SESSION['ORDNO'];
$number = $_SESSION['number'];
$message = null;
$price = 0;

if($EMAIL != null){
        $queryORDNO = "SELECT * FROM ORDMAS where ORDNO='$ORDNO'";
        $result = mysql_query($queryORDNO);
        $row = mysql_fetch_row($result);
        if($row[5] != 'E'){
                $message = $message . '此訂單已進入執行狀態，故無法更新<br>';
        }
        if($row[6] == '1'){
                $message = $message . '無法更新已付款之訂單<br>';
        }
        unset($_SESSION['ORDNO']);
        if($message == null){
                while($number >= 0){
                        $ITEMNOnumber = 'ITEMNO' . "$number";
                        $ITEMAMTnumber = 'ITEMAMT' . "$number";
                        $ITEMNO = $_POST["$ITEMNOnumber"];
                        $ITEMAMT = $_POST["$ITEMAMTnumber"];
                        $sql = "update ORDITEMMAS set ITEMAMT='$ITEMAMT' WHERE ITEMNO='$ITEMNO'";
                        if(!mysql_query($sql)){
                                $message = $message . '更新失敗<br>';
                        }
                $number -= 1;
                }
                unset($_SESSION['number']);
                include("Update_PRICE.php");
                unset($_SESSION['ORDNO']);
        }
        else{
                echo $message;
                echo '<meta http-equiv=REFRESH CONTENT=2;url=Edit_ORDMAS.php>';
        }
        if($message == null){
                echo "更新成功";
                echo '<meta http-equiv=REFRESH CONTENT=2;url=ORDMAS.php>';
        }
        else{
                echo $message;
                echo '<meta http-equiv=REFRESH CONTENT=2;url=Edit_ORDMAS.php>';
        }
}
else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=HomePage.php>';
}
?>