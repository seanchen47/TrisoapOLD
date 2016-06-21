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
        $queryORDNO = "SELECT * FROM ORDMAS WHERE ORDNO='$ORDNO'";
        $result = mysql_query($queryORDNO);
        $row = mysql_fetch_array($result);
        if($row['ORDSTAT'] != 'E'){
                $message = $message . '此訂單已進入執行狀態，故無法更新<br>';
        }
        if($row['PAYSTAT'] == '1'){
                $message = $message . '無法更新已付款之訂單<br>';
        }
        unset($_SESSION['ORDNO']);
        if($message == null){
                while($number > 0){
                        date_default_timezone_set('Asia/Taipei');
                        $CREATEDATE = date("Y-m-d H:i:s");
                        $UPDATEDATE = date("Y-m-d H:i:s");
                        $ITEMNOnumber = 'ITEMNO' . "$number";
                        $ITEMAMTnumber = 'ITEMAMT' . "$number";
                        $ITEMNO = $_POST["$ITEMNOnumber"];
                        $ITEMAMT = htmlentities($_POST["$ITEMAMTnumber"]);
                        $sql = "SELECT * FROM ORDITEMMAS WHERE ORDNO='$ORDNO' AND ITEMNO='$number'";
                        $result = mysql_query($sql);
                        $row = mysql_fetch_row($result);
                        if($row != false)
                                $sql = "UPDATE ORDITEMMAS SET ORDAMT='$ITEMAMT', UPDATEDATE='$UPDATEDATE' WHERE ITEMNO='$ITEMNO'";
                        else{
                                if($ITEMAMT != '0')
                                        $sql = "insert into ORDITEMMAS (ORDNO, ITEMNO, ORDAMT, CREATEDATE, UPDATEDATE) values ('$ORDNO', '$ITEMNO', '$ITEMAMT', '$CREATEDATE', '$UPDATEDATE')";
                                else
                                        $sql = null;
                        }
                        if($sql != null){
                                if(!mysql_query($sql))
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
                echo '<meta http-equiv=REFRESH CONTENT=2;url=../Order/ORDMAS.php>';
        }
        else{
                echo $message;
                echo '<meta http-equiv=REFRESH CONTENT=2;url=Edit_ORDMAS.php>';
        }
}
else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePages/index.php>';
}
?>