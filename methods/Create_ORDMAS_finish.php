<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
//$ITEMNO = $_SESSION['ITEMNO'];
//$ORDNO = $_SESSION['ORDNO'];
$ORDTYPE = htmlentities($_POST['ORDTYPE']);  //sth wrong
$ORD_INST = htmlentities($_POST['ORD_INST']);  //sth wrong
if($EMAIL != null){
	$sql = "SELECT * FROM OWNMAS where COMPANYNM='Trisoap'";
    $result = mysql_query($sql);
    $row = mysql_fetch_row($result);
    date_default_timezone_set('Asia/Taipei');
    $CREATEDATE = date("Y-m-d H:i:s");
    $UPDATEDATE = date("Y-m-d H:i:s");
    if($ORDTYPE == 'G'){
        $SHIPFEE = 20;
    	$sql = "insert into ORDMAS (ORDNO, ORDTYPE, CUSNO, ORD_INST, SHIPFEE, CREATEDATE, UPDATEDATE) values ('$row[5]', '$ORDTYPE', '$EMAIL', '$ORD_INST', '$SHIPFEE', '$CREATEDATE', '$UPDATEDATE')";
    	if(mysql_query($sql)){
    		$sql = "UPDATE OWNMAS SET NORDNOG=NORDNOG+1 where COMPANYNM='Trisoap'";
    		mysql_query($sql);
    		$_SESSION['ORDNO'] = $row[5];
    		//echo "建立訂單成功";
?>
            <script>
                alert("訂單建立成功");
            </script>
<?php
    		echo '<meta http-equiv=REFRESH CONTENT=0.5;url=Purchase_finish1.php>';
    	}
    	else{
    		echo "建立訂單失敗";
    		echo '<meta http-equiv=REFRESH CONTENT=2;url=Create_ORDMAS.php>';
    	}
    }
    else{
        $SHIPFEE = 50;
    	$sql = "insert into ORDMAS (ORDNO, ORDTYPE, CUSNO, ORD_INST, SHIPFEE, CREATEDATE, UPDATEDATE) values ('$row[6]', '$ORDTYPE', '$EMAIL', '$ORD_INST', '$SHIPFEE', '$CREATEDATE', '$UPDATEDATE')";
    	if(mysql_query($sql)){
    		$sql = "UPDATE OWNMAS SET NORDNOS=NORDNOS+1 where COMPANYNM='Trisoap'";
    		mysql_query($sql);
    		$_SESSION['ORDNO'] = $row[6];
    		//echo "建立訂單成功";
?>
            <script>
                alert("訂單建立成功，請重新選擇商品");
            </script>
<?php
    		echo '<meta http-equiv=REFRESH CONTENT=0.5;url=Purchase_finish.php>';
    	}
    	else{
    		echo "建立訂單失敗";
    		echo '<meta http-equiv=REFRESH CONTENT=2;url=Create_ORDMAS.php>';
    	}
    }
}
else{
	echo '您無權限觀看此頁面!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePages/index.php>';
}
