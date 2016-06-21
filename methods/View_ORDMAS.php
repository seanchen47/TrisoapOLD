<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三三吾鄉手工皂 查看訂單</title>
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$ORDNO = $_POST['ORDNO'];
if($EMAIL != null){
        $queryOrder = "SELECT * FROM ORDMAS where ORDNO='$ORDNO'";
        $result = mysql_query($queryOrder);
        $row = mysql_fetch_row($result);
        echo "訂單編號：$row[0]<br>";
        echo "訂單種類：$row[1]<br>";
        echo "訂單狀態：$row[5]<br>";
        echo "額外指令：$row[7]<br>";
        echo "購買商品：<br>";
        $queryORDITEM = "SELECT * FROM ORDITEMMAS where ORDNO='$ORDNO'";
        $queryDetail = mysql_query($queryORDITEM);
        while($item = mysql_fetch_array($queryDetail)){
                $ITEMNO = $item['ITEMNO'];
                $ITEMAMT = $item['ORDAMT'];
                $queryITEMNM = "SELECT * FROM ITEMMAS where ITEMNO='$ITEMNO'";
                $queryName = mysql_query($queryITEMNM);
                $name = mysql_fetch_row($queryName);
                echo "商品編號：".$ITEMNO." 商品名稱：".$name[1]." 商品價格：".$name[3]." 訂購數量：".$ITEMAMT." 總價：".$name[3]*$ITEMAMT."<br>";
        }
        echo "訂單總額：$row[8]<br>";
        echo "運輸費用：$row[9]<br>";
        echo "訂單總值：$row[10]<br>";
        echo "付款狀態：$row[6]<br>";
?>
<a href="../Order/ORDMAS.php">返回</a>
<?php
}
else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePages/index.php>';
}
?>