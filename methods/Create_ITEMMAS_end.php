<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$newITEMNO = $_SESSION['newITEMNO'];
$newITEMNM = $_SESSION['newITEMNM'];
$newITEMAMT = $_SESSION['newITEMAMT'];
$newPRICE = $_SESSION['newPRICE'];
$newPHOTO = $_SESSION['newPHOTO'];
$newPHOTOTYPE = $_SESSION['newPHOTOTYPE'];
$newDESCRIPTION = $_SESSION['newDESCRIPTION'];
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
                        $sql = "insert into ITEMMAS (ITEMNO, ITEMNM, ITEMAMT, PRICE, DESCRIPTION, PHOTO, PHOTOTYPE) values ('$newITEMNO', '$newITEMNM', '$newITEMAMT', '$newPRICE', '$newDESCRIPTION', '$newPHOTO', '$newPHOTOTYPE')";
                        unset($_SESSION['newITEMNO']);
                        unset($_SESSION['newITEMNM']);
                        unset($_SESSION['newITEMAMT']);
                        unset($_SESSION['newPRICE']);
                        unset($_SESSION['newPHOTO']);
                        unset($_SESSION['newPHOTOTYPE']);
                        unset($_SESSION['newDESCRIPTION']);
                        if(mysql_query($sql)){
                                echo '新增成功';
                                echo '<meta http-equiv=REFRESH CONTENT=2;url=Update_ITEMMAS.php>';
                        }
                        else{
                                echo '新增失敗';
                                echo '<meta http-equiv=REFRESH CONTENT=2;url=Create_ITEMMAS.php>';
                        }
                }
                else{
                        echo $message;
                        unset($_SESSION['newITEMNO']);
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=Create_ITEMMAS.php>';
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