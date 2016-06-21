<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$count = 0;
$message = null;
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
                $count += 1;
                $message = $message . '原始密碼欄位不可空白<br>';
        }
        if($CUSPW != $row[0]){
                $count += 1;
                $message = $message . '原始密碼錯誤<br>';
        }
        if($newCUSPW1 == null){
                $count += 1;
                $message = $message . '新密碼欄位不可空白<br>';
        }
        if($newCUSPW2 == null){
                $count += 1;
                $message = $message . '再一次輸入新密碼欄位不可空白<br>';
        }  
        if($newCUSPW1 != $newCUSPW2){
                $count += 1;
                $message = $message . '請重新確認您的新密碼<br>';
        }

        if($count == 0){
                $sql = "UPDATE CUSMAS SET CUSPW = '$newCUSPW1', UPDATEDATE ='$UPDATEDATE' WHERE EMAIL='$EMAIL'";
                if(mysql_query($sql))
                {
                        //echo '更新成功';
                        if($CUSIDT == 'A'){          
?>
                                <script>
                                        //function myFunction() {
                                        alert("密碼修改成功，請重新登入");
                                        //}
                                </script>
<?php
                                echo '<meta http-equiv=REFRESH CONTENT=1;url=../Homepages/index.php>';

                        }
                        else{
                                
?>
                                <script>
                                        //function myFunction() {
                                        alert("密碼修改成功，請重新登入");
                                        //}
                                </script>
<?php
                                echo '<meta http-equiv=REFRESH CONTENT=1;url=../Homepages/index.php>';
                        }
                        
                }
                else
                {
                        echo '更新失敗';
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=User_ChangePW.php>';
                }
        }
        else{
                echo $message;
                echo '<meta http-equiv=REFRESH CONTENT=2;url=User_ChangePW.php>';
        }
}
else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePages/index.php>';
}
?>