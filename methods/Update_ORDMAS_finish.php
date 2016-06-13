<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null){
        if($CUSIDT == 'A'){
                echo "請輸入發票編號<br>";
                echo "<form name=\"form\" method=\"post\" action=\"Update_ORDMAS_end.php\">";
                echo "發票編號：<input type=\"text\" name=\"INVOICENO\" /> <br>";
                echo "<input type=\"submit\" name=\"button\" value=\"確定\" />";
                echo "</form>";
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