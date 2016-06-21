<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$number = $_SESSION['number'];
$message = null;

if($EMAIL != null){
        if($CUSIDT == 'A'){
                date_default_timezone_set('Asia/Taipei');
                $PUBLICDATE = date("Y-m-d H:i:s");
                while($number >= 0){
                        $MSGNOnumber = 'MSGNO' . "$number";
                        $MSGSTATnumber = 'MSGSTAT' . "$number";
                        $MSGNO = $_POST["$MSGNOnumber"];
                        $MSGSTAT = $_POST["$MSGSTATnumber"];
                        if($MSGSTAT == 'F'){
                                $sql = "UPDATE MSGMAS SET ACTCODE='0' WHERE MSGNO='$MSGNO'";
                        }
                        elseif($MSGSTAT == 'D'){
                                $sql = "UPDATE MSGMAS SET MSGSTAT='$MSGSTAT', PUBLICDATE='$PUBLICDATE' WHERE MSGNO='$MSGNO'";
                        }
                        else{
                                $sql = "UPDATE MSGMAS SET MSGSTAT='$MSGSTAT' WHERE MSGNO='$MSGNO'";
                        }
                        if(!mysql_query($sql)){
                                $message = $message . '儲存失敗<br>';
                        }
                $number -= 1;
                }
                unset($_SESSION['number']);
                if($message == null)
                        echo "儲存成功";
                else
                        echo "儲存失敗";
                echo '<meta http-equiv=REFRESH CONTENT=2;url=Update_MSGMAS.php>';
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
?>