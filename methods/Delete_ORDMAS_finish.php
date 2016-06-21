<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$ORDNO = $_POST['ORDNO'];
$message = null;

if($EMAIL != null){
        $queryORDNO = "SELECT * FROM ORDMAS where ORDNO='$ORDNO'";
        $result = mysql_query($queryORDNO);
        $row = mysql_fetch_row($result);
        date_default_timezone_set('Asia/Taipei');
        $UPDATEDATE = date("Y-m-d H:i:s");
        if($row[5] != 'E'){
                $message = $message . '此訂單已進入執行狀態，故無法取消<br>';
        }
        if($row[6] == '1'){
                $message = $message . '無法取消已付款之訂單<br>';
        }
        if($message == null){
                $sql = "UPDATE ORDMAS SET ACTCODE='0', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
                if(!mysql_query($sql)){
                        $message = $message . '刪除失敗<br>';
                }
        }
        else{
                echo $message;
                echo '<meta http-equiv=REFRESH CONTENT=2;url=Delete_ORDMAS.php>';
        }
        if($message == null){
                echo "取消成功";
                echo '<meta http-equiv=REFRESH CONTENT=2;url=../Order/ORDMAS.php>';
        }
        else{
                echo $message;
                echo '<meta http-equiv=REFRESH CONTENT=2;url=Delete_ORDMAS.php>';
        }
}
else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePages/index.php>';
}
?>