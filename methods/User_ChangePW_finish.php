<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$message = '';
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null){
        $queryEMAIL = "SELECT CUSPW FROM CUSMAS where EMAIL = '$EMAIL'";
        $result = mysql_query($queryEMAIL);
        $row = mysql_fetch_row($result);
        $CUSPW = htmlentities($_POST['CUSPW']);
        $newCUSPW1 = htmlentities($_POST['newCUSPW1']);
        $newCUSPW2 = htmlentities($_POST['newCUSPW2']);
        date_default_timezone_set('Asia/Taipei');
        $UPDATEDATE = date("Y-m-d H:i:s");

        if($CUSPW == null){
                $message = $message . '原始密碼欄位不可空白 \n';
        }
        if($CUSPW != $row[0]){
                $message = $message . '原始密碼錯誤 \n';
        }
        if(($newCUSPW1 == null) || ($newCUSPW2 == null)){
                $message = $message . '新密碼欄位不可空白 \n';
        }
        if((strlen($newCUSPW1) > 15) || (strlen($newCUSPW2) > 15)){
                $message = $message . '密碼不可超過15字元 \n';
        }
        if($newCUSPW1 != $newCUSPW2){
                $message = $message . '請重新確認您的新密碼 \n';
        }
        if((ctype_alnum($newCUSPW1) == FALSE) || (ctype_alnum($newCUSPW2) == FALSE)){
                $message = $message . '密碼必須為英數字 \n';
        }

        if($message == null){
                $sql = "UPDATE CUSMAS SET CUSPW = '$newCUSPW1', UPDATEDATE ='$UPDATEDATE' WHERE EMAIL='$EMAIL'";
                if(mysql_query($sql)){               
?>
                        <script>
                        alert("密碼修改成功");
                        </script>
<?php
                        echo '<meta http-equiv=REFRESH CONTENT=1;url=../Homepages/index.php>';
                        
                }
                else
                {
?>
                        <script>
                        alert("密碼修改失敗");
                        </script>
<?php
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=User_ChangePW1.php>';
                }
        }
        else{
?>
                        <script>
                        alert("<?echo $message;?>");
                        </script>
<?php
                echo '<meta http-equiv=REFRESH CONTENT=2;url=User_ChangePW1.php>';
        }
}
else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePages/index.php>';
}
?>