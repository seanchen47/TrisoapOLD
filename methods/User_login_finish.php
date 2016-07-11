<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$message = '';

$EMAIL = htmlentities($_POST['EMAIL']);
$CUSPW = htmlentities($_POST['CUSPW']);

if($EMAIL == null){
        $message = $message . '電子信箱欄位不可空白 \n';
}
if($CUSPW == null){
        $message = $message . '密碼欄位不可空白 \n';
}

//搜尋資料庫資料
$sql = "SELECT CUSPW FROM CUSMAS where EMAIL = '$EMAIL'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);

if($CUSPW != $row[0]){
        $message = $message . '密碼錯誤 \n';
}

if($message == null){
        $_SESSION['EMAIL'] = $EMAIL;
        $sql = "SELECT CUSIDT FROM CUSMAS where EMAIL = '$EMAIL'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        $_SESSION['CUSIDT'] = $row[0];
        ?>
            <script>
                alert("成功登入");
            </script>
        <?php
        if($row[0] == 'A'){ 
                echo '<meta http-equiv=REFRESH CONTENT=1;url=../Homepages/index_manager.php>';
        }
        else{
                echo '<meta http-equiv=REFRESH CONTENT=1;url=../Homepages/index_customer.php>';
        }
}
else
{
        ?>
            <script>
                alert("<?echo $message;?>");
            </script>
        <?php
        echo '<meta http-equiv=REFRESH CONTENT=1;url=User_login1.php>';
}
?>