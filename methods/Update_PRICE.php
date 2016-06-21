<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$queryORDNO = "SELECT * FROM ORDMAS where ORDNO='$ORDNO'";
$result = mysql_query($queryORDNO);
$row = mysql_fetch_array($result);
$TOTALPRICE = $row['TOTALPRICE'];
$SHIPFEE = $row['SHIPFEE'];
$TOTALAMT = $row['TOTALAMT'];
$queryORDITEM = "SELECT * FROM ORDITEMMAS where ORDNO='$ORDNO'";
$result = mysql_query($queryORDITEM);
while($row = mysql_fetch_array($result)){
	$ITEMNO = $row['ITEMNO'];
	$queryMONEY = "SELECT PRICE FROM ITEMMAS where ITEMNO='$ITEMNO'";
	$end = mysql_query($queryMONEY);
	$ITEMPRICE = mysql_fetch_row($end);
	$price += ($row['ORDAMT'] * $ITEMPRICE[0]);
}
$TOTALPRICE = $price;
$sql = "UPDATE ORDMAS SET TOTALPRICE='$TOTALPRICE' WHERE ORDNO='$ORDNO'";
mysql_query($sql);
$TOTALAMT = $price + $SHIPFEE;
$sql = "UPDATE ORDMAS SET TOTALAMT='$TOTALAMT' WHERE ORDNO='$ORDNO'";
mysql_query($sql);
?>