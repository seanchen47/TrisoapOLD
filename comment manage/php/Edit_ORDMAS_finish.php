<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$ORDNO = $_POST['ORDNO'];
$message = null;
$number = 0;

if($EMAIL != null){
        if($ORDNO == null){
                $message = $message . '訂單編號欄位不可空白<br>';
        }
        if($message == null){
                echo "<form name=\"form\" method=\"post\" action=\"Edit_ORDMAS_end.php\">";
                $sql = "SELECT * FROM ORDITEMMAS where ORDNO='$ORDNO'";
                $result = mysql_query($sql);
                while($row = mysql_fetch_array($result)){
                        $ITEMNO = $row['ITEMNO'];
                        $ITEMNOnumber = 'ITEMNO' . "$number";
                        echo "商品編號：$ITEMNO <br>";
                        echo "<input type=\"hidden\" name=\"$ITEMNOnumber\" value=\"$ITEMNO\" />";
                        $queryORDITEM = "SELECT ITEMNM FROM ITEMMAS where ITEMNO='$ITEMNO'";
                        $queryName = mysql_query($queryORDITEM);
                        $name = mysql_fetch_row($queryName);
                        echo "商品名稱：$name[0] <br>";
                        $ITEMAMTnumber = 'ITEMAMT' . "$number";
                        echo "商品數量：<input type=\"text\" name=\"$ITEMAMTnumber\" value=\"$row[2]\" /> <br><br>";
                        $number += 1;
                }
                echo "<input type=\"submit\" name=\"button\" value=\"確定\" />";
                echo "</form>";
                $_SESSION['ORDNO'] = $ORDNO;
                $_SESSION['number'] = $number - 1;
?>
<a href="Edit_ORDMAS.php">取消</a>
<?php
        }
        
        else{
                echo $message;
                echo '<meta http-equiv=REFRESH CONTENT=2;url=Edit_ORDMAS.php>';
        }
}
else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=HomePage.php>';
}
?>