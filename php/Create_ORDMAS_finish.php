<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$ORDTYPE = htmlentities($_POST['ORDTYPE']);
$ORD_INST = htmlentities($_POST['ORD_INST']);
if($EMAIL != null){
	$sql = "SELECT * FROM OWNMAS where COMPANYNM='Trisoap'";
    $result = mysql_query($sql);
    $row = mysql_fetch_row($result);
    $CREATEDATE = date("Y-m-d H:i:s");
    $UPDATEDATE = date("Y-m-d H:i:s");
    if($ORDTYPE == 'G'){
        $SHIPFEE = 20;
    	$sql = "insert into ORDMAS (ORDNO, ORDTYPE, CUSNO, ORD_INST, SHIPFEE, CREATEDATE, UPDATEDATE) values ('$row[5]', '$ORDTYPE', '$EMAIL', '$ORD_INST', '$SHIPFEE', '$CREATEDATE', '$UPDATEDATE')";
    	if(mysql_query($sql)){
    		$sql = "UPDATE OWNMAS SET NORDNOG=NORDNOG+1 where COMPANYNM='Trisoap'";
    		mysql_query($sql);
    		$_SESSION['ORDNO'] = $row[5];
    		echo "建立訂單成功";
    		echo '<meta http-equiv=REFRESH CONTENT=2;url=Purchase_finish.php>';
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
    		echo "建立訂單成功";
    		echo '<meta http-equiv=REFRESH CONTENT=2;url=Purchase_finish.php>';
    	}
    	else{
    		echo "建立訂單失敗";
    		echo '<meta http-equiv=REFRESH CONTENT=2;url=Create_ORDMAS.php>';
    	}
    }
}
else{
	echo '您無權限觀看此頁面!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=HomePage.php>';
}
