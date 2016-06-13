<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$ORDNO = htmlentities($_POST['ORDNO']);
$message = null;

function ViewORDITEM($number){
        include("mysql_connect.php");
        $ORDNO = htmlentities($_POST['ORDNO']);
        $ITEMNOnumber = 'ITEMNO' . "$number";
        $ITEMAMTnumber = 'ITEMAMT' . "$number";
        $sql = "SELECT * FROM ORDITEMMAS where ORDNO='$ORDNO' and ITEMNO='$number'";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
        echo "商品編號：$number <br>";
        echo "<input type=\"hidden\" name=\"$ITEMNOnumber\" value=\"$number\" />";
        $queryORDITEM = "SELECT ITEMNM FROM ITEMMAS where ITEMNO='$number'";
        $queryName = mysql_query($queryORDITEM);
        $name = mysql_fetch_row($queryName);
        echo "商品名稱：$name[0] <br>";
        if($row == false)                        
                echo "商品數量：<input type=\"text\" name=\"$ITEMAMTnumber\" value=\"0\" /> <br><br>";
        else{
                $ITEMAMT = $row['ITEMAMT'];
                echo "商品數量：<input type=\"text\" name=\"$ITEMAMTnumber\" value=\"$ITEMAMT\" /> <br><br>";
        }
}

if($EMAIL != null){
        if($ORDNO == null){
                $message = $message . '訂單編號欄位不可空白<br>';
        }
        if($message == null){
                echo "<form name=\"form\" method=\"post\" action=\"Edit_ORDMAS_end.php\">";
                ViewORDITEM('1');
                ViewORDITEM('2');
                ViewORDITEM('3');
                ViewORDITEM('4');
                echo "<input type=\"submit\" name=\"button\" value=\"確定\" />";
                echo "</form>";
                $_SESSION['ORDNO'] = $ORDNO;
                $_SESSION['number'] = 4;
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
        echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePages/index.php>';
}
?>