<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$message = null;

if($EMAIL != null){
    $MSGTXT = htmlentities($_POST['MSGTXT']);
    $MSGVIDEO = htmlentities($_POST['MSGVIDEO']);
    $MSGPHOTOTYPE = $_FILES["MSGPHOTO"]["type"];
    $file = fopen($_FILES["MSGPHOTO"]["tmp_name"], "rb");
    $fileContents = fread($file, filesize($_FILES["MSGPHOTO"]["tmp_name"])); 
    fclose($file);
    $MSGPHOTO = base64_encode($fileContents);
    $CREATEDATE = date("Y-m-d H:i:s");
    if($MSGTXT == null){
        $message = $message . '留言文字欄位不可空白<br>';
    }
    if($message == null){
        $savetype = 0;
        $sql = "SELECT * FROM OWNMAS where COMPANYNM='Trisoap'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        if($MSGPHOTO == null && $MSGVIDEO == null)
            $savetype = 1;
        elseif($MSGPHOTO != null && $MSGVIDEO == null)
            $savetype = 2;
        elseif($MSGPHOTO == null && $MSGVIDEO != null)
            $savetype = 3;
        if($savetype = 0){
            $enter = "insert into MSGMAS (MSGNO, CUSNO, MSGTXT, MSGPHOTO, MSGPHOTOTYPE, MSGVIDEO, CREATEDATE) values ('$row[7]', '$EMAIL', '$MSGTXT', '$MSGPHOTO', '$MSGPHOTOTYPE', '$MSGVIDEO', '$CREATEDATE')";
        }
        elseif($savetype = 1){
            $enter = "insert into MSGMAS (MSGNO, CUSNO, MSGTXT, CREATEDATE) values ('$row[7]', '$EMAIL', '$MSGTXT', '$CREATEDATE')";
        }
        elseif($savetype = 2){
            $enter = "insert into MSGMAS (MSGNO, CUSNO, MSGTXT, MSGPHOTO, MSGPHOTOTYPE, CREATEDATE) values ('$row[7]', '$EMAIL', '$MSGTXT', '$MSGPHOTO', '$MSGPHOTOTYPE', '$CREATEDATE')";
        }
        else{    
            $enter = "insert into MSGMAS (MSGNO, CUSNO, MSGTXT, MSGVIDEO, CREATEDATE) values ('$row[7]', '$EMAIL', '$MSGTXT', '$MSGVIDEO', '$CREATEDATE')";
        }
        if(mysql_query($enter)){
            $sql = "UPDATE OWNMAS SET NMSGNO=NMSGNO+1 where COMPANYNM='Trisoap'";
            mysql_query($sql);
            echo "新增留心語成功";
            mb_internal_encoding("utf-8");
            $to="$EMAIL";
            $subject=mb_encode_mimeheader("已收到您的留心語","utf-8");
            $message="信件內容";
            $headers="MIME-Version: 1.0\r\n";
            $headers.="Content-type: text/html; charset=utf-8\r\n";
            $headers.="From:".mb_encode_mimeheader("三三吾鄉手工皂","utf-8")."<寄件者電子郵件>\r\n";
            mail($to,$subject,$message,$headers);
            echo '<meta http-equiv=REFRESH CONTENT=2;url=../Message/Message.php>';
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
    echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePage/HomePage.php>';
}
