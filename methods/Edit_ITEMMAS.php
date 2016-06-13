<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三三吾鄉手工皂 更新商品</title>
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null){
        if($CUSIDT == 'A'){
                echo "<form name=\"form\" method=\"post\" action=\"Edit_ITEMMAS_process.php\">";
                echo "商品編號：<input type=\"text\" name=\"ITEMNO\" /> <br>";
                echo "<input type=\"submit\" name=\"button\" value=\"確定\" />";
                echo "</form>";
?>
<a href="Update_ITEMMAS.php">取消</a>
<?php
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