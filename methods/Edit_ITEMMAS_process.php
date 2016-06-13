<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三三吾鄉手工皂 更新商品</title>
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$newITEMNO = $_POST['ITEMNO'];
$message = null;

if($EMAIL != null){
        if($CUSIDT == 'A'){
                if($newITEMNO == null){
                        $message = $message . '商品編號欄位不可空白<br>';
                }
                $sql = "SELECT * FROM ITEMMAS where ITEMNO='$newITEMNO'";
                $result = mysql_query($sql);
                $row = mysql_fetch_row($result);
                if($row[0] == null){
                        $message = $message . '查無此商品編號之商品<br>';
                }
                if($message == null){
                        $_SESSION['newITEMNO'] = $newITEMNO;
                        echo "<form name=\"form\" method=\"post\" action=\"Edit_ITEMMAS_finish.php\" Enctype=\"multipart/form-data>";
                        echo "商品編號：$ITEMNO <br>";
                        echo "商品名稱：<input type=\"text\" name=\"ITEMNM\" value=\"$row[1]\" /> <br>";
                        echo "商品數量：<input type=\"text\" name=\"ITEMAMT\" value=\"$row[2]\" /> <br>";
                        echo "商品價格：<input type=\"text\" name=\"PRICE\" value=\"$row[3]\" /> <br>";
                        echo "商品照片：<input type=\"file\" name=\"PHOTO\" /> <br>";
                        echo "商品敘述：<input type=\"text\" name=\"DESCRIPTION\" value=\"$row[4]\" /> <br>";
                        echo "<input type=\"submit\" name=\"button\" value=\"確定\" />";
                        echo "</form>";
?>
<a href="Update_ITEMMAS.php">取消</a>
<?php
                }
                else{
                        echo $message;
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
?>