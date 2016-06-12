<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$count = 0;
$message = null;

$EMAIL = htmlentities($_POST['EMAIL']);
$CUSPW = htmlentities($_POST['CUSPW']);

if($EMAIL == null){
        $count += 1;
        $message = $message . '電子信箱欄位不可空白<br>';
}
if($CUSPW == null){
        $count += 1;
        $message = $message . '密碼欄位不可空白<br>';
}

//搜尋資料庫資料
$sql = "SELECT CUSPW FROM CUSMAS where EMAIL = '$EMAIL'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);

if($CUSPW != $row[0]){
        $count += 1;
        $message = $message . '密碼錯誤<br>';
}

if($count == 0){
        $_SESSION['EMAIL'] = $EMAIL;
        //echo "登入成功";
        $sql = "SELECT CUSIDT FROM CUSMAS where EMAIL = '$EMAIL'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        $_SESSION['CUSIDT'] = $row[0];
        if($row[0] == 'A'){
                echo '<meta http-equiv=REFRESH CONTENT=1;url=../Homepages/index_manager.php>';
        }
        else{
                echo '<meta http-equiv=REFRESH CONTENT=1;url=../Homepages/index_customer.php>';
        }
}
else
{
	echo $message;
        echo '<meta http-equiv=REFRESH CONTENT=1;url=User_login1.php>';
}
?>