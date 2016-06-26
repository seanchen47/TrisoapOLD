<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$number = $_SESSION['number'];
$message = null;

if($EMAIL != null){
        if($CUSIDT == 'A'){
                date_default_timezone_set('Asia/Taipei');
                $PUBLICDATE = date("Y-m-d H:i:s");
                $MAILDATE = date("Y-m-d");
                while($number >= 0){
                        $MSGNOnumber = 'MSGNO' . "$number";
                        $MSGSTATnumber = 'MSGSTAT' . "$number";
                        $MSGNO = $_POST["$MSGNOnumber"];
                        $MSGSTAT = $_POST["$MSGSTATnumber"];
                        if($MSGSTAT == 'F'){
                                $sql = "UPDATE MSGMAS SET ACTCODE='0' WHERE MSGNO='$MSGNO'";
                        }
                        elseif($MSGSTAT == 'D'){
                                $sql = "UPDATE MSGMAS SET MSGSTAT='$MSGSTAT', PUBLICDATE='$PUBLICDATE' WHERE MSGNO='$MSGNO'";
                        }
                        elseif($MSGSTAT == 'B'){
                                $sql = "UPDATE MSGMAS SET MSGSTAT='$MSGSTAT' WHERE MSGNO='$MSGNO'";
                                $findREWARD1 = "SELECT REWARDSTAT FROM MSGMAS WHERE MSGNO='$MSGNO'";
                                $findREWARD2 = mysql_query($findREWARD1);
                                $findREWARD3 = mysql_fetch_row($findREWARD2);
                                if($findREWARD3[0] == 0){
                                        $queryEMAIL1 = "SELECT EMAIL FROM MSGMAS WHERE MSGNO='$MSGNO'";
                                        $queryEMAIL2 = mysql_query($queryEMAIL1);
                                        $queryEMAIL = mysql_fetch_row($queryEMAIL2);
                                        include("PHPMailerAutoload.php"); //匯入PHPMailer類別       
                                        $mail= new PHPMailer(); //建立新物件        
                                        $mail->IsSMTP(); //設定使用SMTP方式寄信        
                                        $mail->SMTPAuth = true; //設定SMTP需要驗證        
                                        $mail->SMTPSecure = 'ssl'; // Gmail的SMTP主機需要使用SSL連線   
                                        $mail->Host = "smtp.gmail.com"; //Gamil的SMTP主機        
                                        $mail->Port = 465;  //Gamil的SMTP主機的SMTP埠位為465埠。
                                        $mail->IsHTML(true); //設定郵件內容為HTML        
                                        $mail->CharSet = "utf-8"; //設定郵件編碼        
                                        $mail->Username = "trisoap2015@gmail.com"; //設定驗證帳號        
                                        $mail->Password = "n0n02015"; //設定驗證密碼        
                                        $mail->From = "trisoap2015@gmail.com"; //設定寄件者信箱        
                                        $mail->FromName = "三三吾鄉社會企業"; //設定寄件者姓名        
                                        $mail->Subject = "三三吾鄉希望留心語核可通知"; //設定郵件標題        
                                        $mail->Body = "親愛的三三吾鄉客戶您好：<br>
                                        <br>
                                        首先我們恭喜您近日提交至三三吾鄉網站之「希望留心語」活動已獲得核可。在此誠摯的感謝您參與本次活動，並附贈活動網頁，快去找找您的留言在哪吧！<br>
                                        網站網址：xxxxxxxxxxxxxxxx<br>
                                        <br>
                                        三三吾鄉每半年就會將所蒐集到的顧客回饋統整成影片與照片串流放送回饋給辛苦的三三夥伴們！翻轉社福團體的作風，並讓身障朋友與社會有更多的連結。
                                        <br>
                                        您的回饋折扣金 25 元已匯入您的帳號，將於您下次消費時自動抵用。<br>
                                        <br>
                                        由衷感謝您蒞臨本站。<br>
                                        三三吾鄉期待下次與您的再相遇。<br>
                                        讓我們一起為台灣的身障福利努力。<br>
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
                                        $mail->AddAddress("$queryEMAIL[0]"); //設定收件者郵件及名稱
                                        if(!$mail->Send()) {        
                                            echo "Mail not sent!";        
                                        }

                                        $setREWARD = "UPDATE MSGMAS SET REWARDSTAT='1' WHERE MSGNO='$MSGNO'";
                                        mysql_query($setREWARD);
                                        $putREWARD = "UPDATE CUSMAS SET DISCOUNT=DISCOUNT+25 WHERE EMAIL='$queryEMAIL[0]'";
                                        mysql_query($putREWARD);
                                }
                                else{
                                        $sql = "UPDATE MSGMAS SET MSGSTAT='$MSGSTAT' WHERE MSGNO='$MSGNO'";
                                }
                        {
                        else{
                                $sql = "UPDATE MSGMAS SET MSGSTAT='$MSGSTAT' WHERE MSGNO='$MSGNO'";
                        }
                        if(!mysql_query($sql)){
                                $message = $message . '儲存失敗<br>';
                        }
                $number -= 1;
                }
                unset($_SESSION['number']);
                if($message == null)
                        echo "儲存成功";
                else
                        echo "儲存失敗";
                echo '<meta http-equiv=REFRESH CONTENT=2;url=Update_MSGMAS.php>';
        }
        else{
                echo '您無權限觀看此頁面!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePages/index_customer.php>';
        }
}
else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePages/index.php>';
}
?>