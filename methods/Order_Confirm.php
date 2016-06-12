<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看購物車內容</title>

<?php
include("mysql_connect.php");

$EMAIL = $_SESSION['EMAIL'];
$ORDNO = $_SESSION['ORDNO'];
echo "已選擇的商品";
echo '<br>';

$ItemNo = array("ItemNo");
$ItemName = array("ItemName");
$Price = array(0);
$ItemAmount = array(0);

$sql = "SELECT ITEMNO FROM ORDITEMMAS where ORDNO = '$ORDNO'";
$no_result = mysql_query($sql);
while($no_row = mysql_fetch_row($no_result, MYSQL_NUM)){         //get item node
    $node = $no_row[0];
    $sql = "SELECT ITEMNM FROM ITEMMAS where ITEMNO = '$node'";  //get item name
	$nm_result = mysql_query($sql);
    $nm_row = mysql_fetch_row($nm_result);
    $name = $nm_row[0];
    array_push($ItemName, $name);

    $sql = "SELECT PRICE FROM ITEMMAS where ITEMNO = '$node'";  //get item price
    $p_result = mysql_query($sql);
    $p_row = mysql_fetch_row($p_result);
    $price = $p_row[0];
    array_push($Price, $price);        
}

$sql = "SELECT ITEMAMT FROM ORDITEMMAS where ORDNO = '$ORDNO'";  //get item amount
$amt_result = mysql_query($sql);
$number = mysql_num_rows($amt_result);
while($amt_row = mysql_fetch_row($amt_result, MYSQL_NUM)){
    $amt = $amt_row[0];
    array_push($ItemAmount, $amt);
}

if($number != 0){
    $sql = "SELECT SHIPFEE FROM ORDMAS where ORDNO = '$ORDNO'";  //get shipfee
    $fee_result = mysql_query($sql);
    $fee_row = mysql_fetch_row($fee_result);
    $shipfee = $fee_row[0];
}
else{
    echo "目前沒有選擇任何商品";
    echo '<br>';
    $shipfee = 0;
}

$total = $shipfee;
for($i=1; $i<=$number; $i++){
    echo $ItemName[$i];
    echo "(";
    echo $Price[$i];
    echo "/塊)";
    echo " * ";
    echo $ItemAmount[$i];
    echo " = ";
    $price = $Price[$i] * $ItemAmount[$i];
    echo $price;
    echo "元";
    $total += $price;
    echo '<br>';
}
echo "運費 : ";
echo $shipfee;
echo "元";
echo '<br>';
echo "共計 ";
echo $total;
echo " 元";
echo '<br>';
?>
<a href="cashing_test1.php">確定結帳</a> <br>
<h5>(結帳完成後會自動登出)</h5>
<a href="../Homepages/product_customer.php">返回</a> <br>