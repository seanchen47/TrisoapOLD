<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$newITEMNO = $_SESSION['newITEMNO'];
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
                        $sql = "UPDATE ITEMMAS SET ACTCODE='0' WHERE ITEMNO='$newITEMNO'";
                        unset($_SESSION['newITEMNO']);
                        if(mysql_query($sql)){
                                echo '下架成功';
                                echo '<meta http-equiv=REFRESH CONTENT=2;url=Update_ITEMMAS.php>';
                        }
                        else{
                                echo '下架失敗';
                                echo '<meta http-equiv=REFRESH CONTENT=2;url=Delete_ITEMMAS.php>';
                        }
                }
                else{
                        echo $message;
                        unset($_SESSION['newITEMNO']);
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=Delete_ITEMMAS.php>';
                }
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