<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三三吾鄉手工皂 新增管理員</title>

<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$message = null;

if($EMAIL != null){
        if($CUSIDT == 'A'){
                $newEMAIL = $_POST['EMAIL'];
                if($newEMAIL == null){
                        $message = $message . '電子信箱欄位不可空白<br>';
                }
                $queryCUSIDT = "SELECT * FROM CUSMAS where EMAIL = '$newEMAIL'";
                $result = mysql_query($queryCUSIDT);
                $row = mysql_fetch_row($result);
                if($row[0] == 'A'){
                        $message = $message . "$row[1]已經是管理員<br>";
                }

                if($message == null){
                        $_SESSION['newEMAIL'] = $newEMAIL;
?>
<form name="form" method="post" action="Create_Manager_end.php">
請再次輸入您的密碼以新增管理員<br>
密碼：<input type="password" name="PW" /> <br>
<input type="submit" name="button" value="確定" />
</form>
<?php
                }
                else{
                        echo $message;
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=Create_Manager.php>';
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