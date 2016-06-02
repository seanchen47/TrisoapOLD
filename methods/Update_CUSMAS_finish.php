<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null)
{
        $CUSNM = htmlentities($_POST['CUSNM']);
        $CUSADD = htmlentities($_POST['CUSADD']);
        $CUSTYPE = $_POST['CUSTYPE'];
        $TEL = htmlentities($_POST['TEL']);
        $SPEINS = htmlentities($_POST['SPEINS']);
        $TAXID = htmlentities($_POST['TAXID']);
        $UPDATEDATE = date("Y-m-d H:i:s");

        $message = null;
        $sql = "UPDATE CUSMAS SET CUSNM='$CUSNM' WHERE EMAIL='$EMAIL'";
        if(!mysql_query($sql)){
                $message = $message . '更新姓名失敗<br>';
        }
        $sql = "UPDATE CUSMAS SET CUSADD='$CUSADD' WHERE EMAIL='$EMAIL'";
        if(!mysql_query($sql)){
                $message = $message . '更新地址失敗<br>';
        }
        $sql = "UPDATE CUSMAS SET CUSTYPE='$CUSTYPE' WHERE EMAIL='$EMAIL'";
        if(!mysql_query($sql)){
                $message = $message . '更新膚質失敗<br>';
        }
        $sql = "UPDATE CUSMAS SET TEL='$TEL' WHERE EMAIL='$EMAIL'";
        if(!mysql_query($sql)){
                $message = $message . '更新電話失敗<br>';
        }
        $sql = "UPDATE CUSMAS SET SPEINS='$SPEINS' WHERE EMAIL='$EMAIL'";
        if(!mysql_query($sql)){
                $message = $message . '更新特殊要求失敗<br>';
        }
        $sql = "UPDATE CUSMAS SET TAXID='$TAXID' WHERE EMAIL='$EMAIL'";
        if(!mysql_query($sql)){
                $message = $message . '更新統一編號失敗<br>';
        }
        $sql = "UPDATE CUSMAS SET UPDATEDATE='$UPDATEDATE' WHERE EMAIL='$EMAIL'";
        mysql_query($sql);

        if ($message == null){
                echo "更新成功";
                if($CUSIDT == 'A'){
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePage/HomePage_Manager.php>';
                }
                else{
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePage/HomePage_Customer.php>';
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
        echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePage/HomePage.php>';
}
?>