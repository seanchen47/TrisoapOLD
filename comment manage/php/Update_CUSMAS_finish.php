<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null)
{
        $CUSNM = $_POST['CUSNM'];
        $CUSADD = $_POST['CUSADD'];
        $CUSTYPE = $_POST['CUSTYPE'];
        $TEL = $_POST['TEL'];
        $SPEINS = $_POST['SPEINS'];
        $TAXID = $_POST['TAXID'];

        $message = null;
        $sql = "update CUSMAS set CUSNM='$CUSNM' WHERE EMAIL='$EMAIL'";
        if(!mysql_query($sql)){
                $message = $message . '更新姓名失敗<br>';
        }
        $sql = "update CUSMAS set CUSADD='$CUSADD' WHERE EMAIL='$EMAIL'";
        if(!mysql_query($sql)){
                $message = $message . '更新地址失敗<br>';
        }
        $sql = "update CUSMAS set CUSTYPE='$CUSTYPE' WHERE EMAIL='$EMAIL'";
        if(!mysql_query($sql)){
                $message = $message . '更新膚質失敗<br>';
        }
        $sql = "update CUSMAS set TEL='$TEL' WHERE EMAIL='$EMAIL'";
        if(!mysql_query($sql)){
                $message = $message . '更新電話失敗<br>';
        }
        $sql = "update CUSMAS set SPEINS='$SPEINS' WHERE EMAIL='$EMAIL'";
        if(!mysql_query($sql)){
                $message = $message . '更新特殊要求失敗<br>';
        }
        $sql = "update CUSMAS set TAXID='$TAXID' WHERE EMAIL='$EMAIL'";
        if(!mysql_query($sql)){
                $message = $message . '更新統一編號失敗<br>';
        }

        if ($message == null){
                echo "更新成功";
                if($CUSIDT == 'A'){
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=HomePage_Manager.php>';
                }
                else{
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=HomePage_Customer.php>';
                }
        }
        else{
                echo $message;
                echo '<meta http-equiv=REFRESH CONTENT=2;url=Update_CUSMAS.php>';
        }
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=HomePage.php>';
}
?>