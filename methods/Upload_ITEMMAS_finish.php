<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三三吾鄉手工皂 上市商品</title>

<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$message = null;

if($EMAIL != null){
        if($CUSIDT == 'A'){
                $newITEMNO = $_POST['ITEMNO'];
                if($newITEMNO == null){
                        $message = $message . '商品編號欄位不可空白<br>';
                }
                $queryITEMNO = "SELECT * FROM ITEMMAS where ITEMNO = '$newITEMNO'";
                $result = mysql_query($queryITEMNO);
                $row = mysql_fetch_row($result);
                if($row[6] == '1'){
                        $message = $message . "$row[1]已經上市<br>";
                }

                if($message == null){
                        $_SESSION['newITEMNO'] = $newITEMNO;
?>
<form name="form" method="post" action="Upload_ITEMMAS_end.php">
請再次輸入您的密碼以上市商品<br>
密碼：<input type="password" name="PW" /> <br>
<input type="submit" name="button" value="確定" />
</form>
<?php
                }
                else{
                        echo $message;
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=Upload_ITEMMAS.php>';
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