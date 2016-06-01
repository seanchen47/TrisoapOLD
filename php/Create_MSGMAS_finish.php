<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$message = null;

if($EMAIL != null){
    $MSGTXT = $_POST['MSGTXT'];
    $MSGVIDEO = $_POST['MSGVIDEO'];
    $MSGPHOTOTYPE = $_FILES["MSGPHOTO"]["type"];
    $file = fopen($_FILES["MSGPHOTO"]["tmp_name"], "rb");
    $fileContents = fread($file, filesize($_FILES["MSGPHOTO"]["tmp_name"])); 
    fclose($file);
    $MSGPHOTO = base64_encode($fileContents);
    if($MSGTXT == null){
        $message = $message . '留言文字欄位不可空白<br>';
    }
    if($MSGPHOTO == null && $MSGVIDEO == null){
        $message = $message . '留言照片及留言影片請擇一上傳<br>';
    }
    if($MSGPHOTO != null && $MSGVIDEO != null){
        $message = $message . '由於您同時上傳照片及影片，系統已自動捨棄您的留言影片';
    }
    if($message == null || $message == '由於您同時上傳照片及影片，系統已自動捨棄您的留言影片'){
        if($message != null)
            echo $message;
        $sql = "SELECT * FROM OWNMAS where COMPANYNM='Trisoap'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        if($MSGPHOTO != null){
            $enter = "insert into MSGMAS (MSGNO, CUSNO, MSGTXT, MSGPHOTO, MSGPHOTOTYPE) values ('$row[7]', '$EMAIL', '$MSGTXT', '$MSGPHOTO', '$MSGPHOTOTYPE')";
        }
        else{
            $enter = "insert into MSGMAS (MSGNO, CUSNO, MSGTXT, MSGVIDEO) values ('$row[7]', '$EMAIL', '$MSGTXT', '$MSGVIDEO')";
        }
        if(mysql_query($enter)){
            $sql = "UPDATE OWNMAS SET NMSGNO=NMSGNO+1 where COMPANYNM='Trisoap'";
            mysql_query($sql);
            echo "新增留心語成功";
            echo '<meta http-equiv=REFRESH CONTENT=2;url=Message.php>';
        }
        else{
            echo "新增留心語失敗";
            echo '<meta http-equiv=REFRESH CONTENT=2;url=Create_MSGMAS.php>';
        }
    }
    else{
        echo $message;
        echo '<meta http-equiv=REFRESH CONTENT=2;url=Create_MSGMAS.php>';
    }
}
else{
	echo '您無權限觀看此頁面!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=HomePage.php>';
}
