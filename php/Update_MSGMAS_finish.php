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
                while($number >= 0){
                        $MSGNOnumber = 'MSGNO' . "$number";
                        $MSGSTATnumber = 'MSGSTAT' . "$number";
                        $MSGNO = $_POST["$MSGNOnumber"];
                        $MSGSTAT = $_POST["$MSGSTATnumber"];
                        if($MSGSTAT == 'F'){
                                $sql = "update MSGMAS set ACTCODE='0' WHERE MSGNO='$MSGNO'";
                        }
                        else{
                                $sql = "update MSGMAS set MSGSTAT='$MSGSTAT' WHERE MSGNO='$MSGNO'";
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
                echo '<meta http-equiv=REFRESH CONTENT=2;url=HomePage_Customer.php>';
        }
}
else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=HomePage.php>';
}
?>