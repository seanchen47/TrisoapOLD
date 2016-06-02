<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$count = 0;
$message = '';

$CUSNM = htmlentities($_POST['CUSNM']);
$CUSPW1 = htmlentities($_POST['CUSPW1']);
$CUSPW2 = htmlentities($_POST['CUSPW2']);
$CUSADD = htmlentities($_POST['CUSADD']);
$CUSTYPE = $_POST['CUSTYPE'];
$CUSBIRTHY = htmlentities($_POST['CUSBIRTHY']);
$CUSBIRTHM = htmlentities($_POST['CUSBIRTHM']);
$CUSBIRTHD = htmlentities($_POST['CUSBIRTHD']);
$TEL = htmlentities($_POST['TEL']);
$EMAIL = htmlentities($_POST['EMAIL']);
$TAXID = htmlentities($_POST['TAXID']);
$KNOWTYPE = $_POST['KNOWTYPE'];
$SPEINS = htmlentities($_POST['SPEINS']);
$CREATEDATE = date("Y-m-d H:i:s");
$UPDATEDATE = date("Y-m-d H:i:s");

if($EMAIL == null){
        $count += 1;
        $message = $message . '電子信箱欄位不可空白<br>';
}
$queryEMAIL = "SELECT EMAIL FROM CUSMAS where EMAIL = '$EMAIL'";
$result = mysql_query($queryEMAIL);
$row = mysql_fetch_row($result);
if($row[0] != null){
        $count += 1;
        $message = $message . '此電子信箱已存在<br>';
}
if($CUSNM == null){
        $count += 1;
        $message = $message . '姓名欄位不可空白<br>';
}  
if($CUSPW1 == null || $CUSPW2 == null){
        $count += 1;
        $message = $message . '密碼欄位不可空白<br>';
}
if($CUSPW1 != $CUSPW2){
        $count += 1;
        $message = $message . '請重新確認您的密碼<br>';
}
if($CUSTYPE == null){
        $count += 1;
        $message = $message . '膚質欄位不可空白<br>';
}
if($CUSBIRTHY == null || $CUSBIRTHM == null || $CUSBIRTHD == null){
        $count += 1;
        $message = $message . '生日欄位不可空白<br>';
}
if($KNOWTYPE == null){
        $count += 1;
        $message = $message . '如何認識三三欄位不可空白<br>';
}

if($count == 0){
        $sql = "insert into CUSMAS (CUSNM, CUSPW, CUSADD, CUSTYPE, CUSBIRTHY, CUSBIRTHM, CUSBIRTHD, TEL, EMAIL, TAXID, KNOWTYPE, SPEINS, CREATEDATE, UPDATEDATE) values ('$CUSNM', '$CUSPW1', '$CUSADD', '$CUSTYPE', '$CUSBIRTHY', '$CUSBIRTHM', '$CUSBIRTHD', '$TEL', '$EMAIL', '$TAXID', '$KNOWTYPE', '$SPEINS', '$CREATEDATE', '$UPDATEDATE')";
        if(mysql_query($sql)){
                $_SESSION['EMAIL'] = $EMAIL;
                $_SESSION['CUSIDT'] = 'B';
                echo "新增成功";
                echo '<meta http-equiv=REFRESH CONTENT=2;url=HomePage_Customer.php>';
        }
        else{
                echo "新增失敗";
                echo '<meta http-equiv=REFRESH CONTENT=2;url=Create_CUSMAS.php>';
        }
}
else{
        echo $message;
        echo '<meta http-equiv=REFRESH CONTENT=2;url=Create_CUSMAS.php>';
}
?>