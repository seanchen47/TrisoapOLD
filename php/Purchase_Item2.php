<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三三吾鄉手工皂 購買商品</title>
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$message = null;

if($EMAIL != null){
    $sql = "SELECT ACTCODE FROM ITEMMAS where ITEMNO='2'";
    $result = mysql_query($sql);
    $row = mysql_fetch_row($result);
    if($row[0] == '1'){
    	$sql = "SELECT * FROM CUSMAS where EMAIL='$EMAIL'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        if($row[2] == null){
        	$message = $message . '請先更新您的地址<br>';
        }
        if($row[9] == null){
        	$message = $message . '請先更新您的電話<br>';
        }

        if($message != null){
        	echo $message;
        	echo '<meta http-equiv=REFRESH CONTENT=2;url=Update_CUSMAS.php>';
        }
        else{
        	$sql = "SELECT * FROM ITEMMAS where ITEMNO='2'";
        	$result = mysql_query($sql);
        	$row = mysql_fetch_row($result);
            $_SESSION['ITEMNO'] = $row[0];
        	echo "<form name=\"form\" method=\"post\" action=\"Purchase_finish.php\">";
            echo "商品編號：$row[0] <br>";
            echo "商品名稱：$row[1] <br>";
            echo "商品描述：$row[4] <br>";
            echo "商品照片：";
            //echo $row[5];
            echo "<br>";
            echo "商品價格：$row[3] <br>";
            echo "商品數量：<input type=\"text\" name=\"ITEMAMT\" /> <br>";
            echo "<input type=\"submit\" name=\"button\" value=\"確定\" />";
            echo "</form>";
?>
<a href="Product.php">取消</a>
<?php
        }
    }
    else{
        echo "此商品目前下架中";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=Product.php>';
    }
}
else{
	echo '請先登入或註冊!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=HomePage.php>';
}
?>