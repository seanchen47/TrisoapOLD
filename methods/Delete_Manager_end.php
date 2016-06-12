<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$newEMAIL = $_SESSION['newEMAIL'];
$message = null;

if($EMAIL != null){
        if($CUSIDT == 'A'){
                $PW = $_POST['PW'];
                $queryPW = "SELECT CUSPW FROM CUSMAS where EMAIL = '$EMAIL'";
                $result = mysql_query($queryPW);
                $row = mysql_fetch_row($result);
                if($PW != $row[0]){
                        $message = $message . '密碼錯誤<br>';
                }

                if($message == null){
                        $sql = "UPDATE CUSMAS SET CUSIDT='B' WHERE EMAIL='$newEMAIL'";
                        unset($_SESSION['newEMAIL']);
                        if(mysql_query($sql)){
                                echo '刪除成功';
                                echo '<meta http-equiv=REFRESH CONTENT=2;url=Update_Manager.php>';
                        }
                        else{
                                echo '刪除失敗';
                                echo '<meta http-equiv=REFRESH CONTENT=2;url=Delete_Manager.php>';
                        }
                }
                else{
                        echo $message;
                        unset($_SESSION['newEMAIL']);
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=Delete_Manager.php>';
                }
        }
        else{
                echo '您無權限觀看此頁面!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePage/HomePage_Customer.php>';
        }
}
else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePage/HomePage.php>';
}