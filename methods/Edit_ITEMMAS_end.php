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
$message1 = null;
$message2 = null;

if($EMAIL != null){
        if($CUSIDT == 'A'){
                $PW = $_POST['PW'];
                $queryPW = "SELECT CUSPW FROM CUSMAS where EMAIL = '$EMAIL'";
                $result = mysql_query($queryPW);
                $row = mysql_fetch_row($result);
                if($PW != $row[0]){
                        $message1 = $message1 . '密碼錯誤<br>';
                }

                if($message1 == null){
                        $sql = "update ITEMMAS set ITEMNM='$newITEMNM' WHERE ITEMNO='$newITEMNO'";
                        if(!mysql_query($sql))
                                $message2 = $message2 . '更新商品名稱失敗<br>';
                        $sql = "update ITEMMAS set ITEMAMT='$newITEMAMT' WHERE ITEMNO='$newITEMNO'";
                        if(!mysql_query($sql))
                                $message2 = $message2 . '更新商品數量失敗<br>';
                        $sql = "update ITEMMAS set PRICE='$newPRICE' WHERE ITEMNO='$newITEMNO'";
                        if(!mysql_query($sql))
                                $message2 = $message2 . '更新商品價格失敗<br>';
                        if($newPHOTO != null){
                                $sql = "update ITEMMAS set PHOTO='$newPHOTO' WHERE ITEMNO='$newITEMNO'";
                                if(!mysql_query($sql)){
                                        $message2 = $message2 . '更新商品照片失敗<br>';
                                }
                        }
                        if($newPHOTOTYPE != null){
                                $sql = "update ITEMMAS set PHOTO='$newPHOTOTYPE' WHERE ITEMNO='$newITEMNO'";
                                if(!mysql_query($sql)){
                                        $message2 = $message2 . '更新商品照片格式失敗<br>';
                                }
                        }
                        $sql = "update ITEMMAS set DESCRIPTION='$newDESCRIPTION' WHERE ITEMNO='$newITEMNO'";
                        if(!mysql_query($sql))
                                $message2 = $message2 . '更新商品敘述失敗<br>';
                        unset($_SESSION['newITEMNO']);
                        unset($_SESSION['newITEMNM']);
                        unset($_SESSION['newITEMAMT']);
                        unset($_SESSION['newPRICE']);
                        unset($_SESSION['newPHOTO']);
                        unset($_SESSION['newPHOTOTYPE']);
                        unset($_SESSION['newDESCRIPTION']);
                        if($message2 == null){
                                echo '更新成功';
                                echo '<meta http-equiv=REFRESH CONTENT=2;url=Update_ITEMMAS.php>';
                        }
                        else{
                                echo '更新失敗';
                                echo '<meta http-equiv=REFRESH CONTENT=2;url=Edit_ITEMMAS.php>';
                        }
                }
                else{
                        echo $message1;
                        unset($_SESSION['newITEMNO']);
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=Edit_ITEMMAS.php>';
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