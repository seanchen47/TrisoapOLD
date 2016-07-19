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
    date_default_timezone_set('Asia/Taipei');
    $CREATEDATE = date("Y-m-d H:i:s");
    $MAILDATE = date("Y-m-d");
    if($MSGTXT == null){
        $message = $message . '留言文字欄位不可空白<br>';
    }
    if($message == null){
        $savetype = 0;
        $sql = "SELECT * FROM OWNMAS where COMNM='Trisoap'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        if($MSGPHOTO == null && $MSGVIDEO == null)
            $savetype = 1;
        elseif($MSGPHOTO != null && $MSGVIDEO == null)
            $savetype = 2;
        elseif($MSGPHOTO == null && $MSGVIDEO != null)
            $savetype = 3;
        if($savetype = 0){
            $enter = "insert into MSGMAS (MSGNO, EMAIL, MSGTXT, MSGPHOTO, MSGPHOTOTYPE, MSGVIDEO, CREATEDATE) values ('$row[7]', '$EMAIL', '$MSGTXT', '$MSGPHOTO', '$MSGPHOTOTYPE', '$MSGVIDEO', '$CREATEDATE')";
        }
        elseif($savetype = 1){
            $enter = "insert into MSGMAS (MSGNO, EMAIL, MSGTXT, CREATEDATE) values ('$row[7]', '$EMAIL', '$MSGTXT', '$CREATEDATE')";
        }
        elseif($savetype = 2){
            $enter = "insert into MSGMAS (MSGNO, EMAIL, MSGTXT, MSGPHOTO, MSGPHOTOTYPE, CREATEDATE) values ('$row[7]', '$EMAIL', '$MSGTXT', '$MSGPHOTO', '$MSGPHOTOTYPE', '$CREATEDATE')";
        }
        else{    
            $enter = "insert into MSGMAS (MSGNO, EMAIL, MSGTXT, MSGVIDEO, CREATEDATE) values ('$row[7]', '$EMAIL', '$MSGTXT', '$MSGVIDEO', '$CREATEDATE')";
        }
        if(mysql_query($enter)){
            $sql = "UPDATE OWNMAS SET NMSGNO=NMSGNO+1 where COMNM='Trisoap'";
            mysql_query($sql);
            echo "新增留心語成功";

            include("PHPMailerAutoload.php"); //匯入PHPMailer類別       
            $mail= new PHPMailer(); //建立新物件        
            $mail->IsSMTP(); //設定使用SMTP方式寄信        
            $mail->SMTPAuth = true; //設定SMTP需要驗證        
            $mail->SMTPSecure = 'ssl'; // Gmail的SMTP主機需要使用SSL連線   
            $mail->Host = "smtp.gmail.com"; //Gmail的SMTP主機        
            $mail->Port = 465;  //Gmail的SMTP主機的SMTP埠位為465埠。
            $mail->IsHTML(true); //設定郵件內容為HTML        
            $mail->CharSet = "utf-8"; //設定郵件編碼        
            $mail->Username = "trisoap2015@gmail.com"; //設定驗證帳號        
            $mail->Password = "n0n02015"; //設定驗證密碼        
            $mail->From = "trisoap2015@gmail.com"; //設定寄件者信箱        
            $mail->FromName = "三三吾鄉社會企業"; //設定寄件者姓名        
            $mail->Subject = "三三吾鄉希望留心語通知信"; //設定郵件標題        
            $mail->Body = "親愛的三三客戶您好：<br>
            <br>
            我們在此誠摯的感謝您參與三三吾鄉「希望留心語」的活動，本活動的出發便是希望可以透過社福模式的翻轉，讓消費者跟我們的身障夥伴有更多的互動，以讓他們增加和社會的聯結。<br>
            <br>
            目前您所提交的留心語內容已進入審核的程序，為避免惡意散播訊息、惡意攻擊等因素，三三吾鄉團隊將會花1-3天的時間審核各方提交之訊息，若您所投遞的訊息通過後我們將會再來信通知您，並將折扣金附於信中，還請您耐心等候。<br>
            <br>
            感謝您的體諒以及對三三吾鄉的支持，希望您和我們一起共同，持續為身障議題發聲。<br>
            <br>
            三三吾鄉社會企業團隊敬上<br>" .
            $MAILDATE . "<br>
            ________________________________<br>
            <br>
            三三吾鄉社會企業<br>
            地址：106台北市大安區和平東路二段265巷3號<br>
            email : trisaop2015@gmail.com<br>
            網址 : xxxxxxxxxxxxx<br>      
            "; //設定郵件內容                
            $mail->AddAddress("$EMAIL"); //設定收件者郵件及名稱
            if(!$mail->Send()) {        
                echo "Mail not sent!";        
            }

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
    echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePages/index.php>';
}
