<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$message = null;

if($EMAIL != null){
        if($CUSIDT == 'A'){
                $ORDNO = $_POST['ORDNO'];
                $ORDSTAT = $_POST['ORDSTAT'];
                date_default_timezone_set('Asia/Taipei');
                $UPDATEDATE = date("Y-m-d H:i:s");
                $MAILDATE = date("Y-m-d");
                if($ORDSTAT == 'F')
                        $sql = "UPDATE ORDMAS SET ORDSTAT='$ORDSTAT', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
                if($ORDSTAT == 'C'){
                        $queryDetail = "SELECT * FROM ORDITEMMAS WHERE ORDNO='$ORDNO'";
                        $Detail = mysql_query($queryDetail);
                        while($item = mysql_fetch_array($Detail)){
                                $ITEMNO = $item['ITEMNO'];
                                $ITEMAMT = $item['ORDAMT'];
                                $queryAMT = "SELECT * FROM ITEMMAS WHERE ITEMNO='$ITEMNO'";
                                $result = mysql_query($queryAMT);
                                $AMT = mysql_fetch_row($result);
                                if($AMT[7] == 0){
                                        $message = $message . ""$AMT[1]"目前下架中，儲存失敗<br>";
                                        $sql = "UPDATE ORDMAS SET BACKCODE='1', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
                                }
                                elseif($AMT[2] - $ITEMAMT < 0){
                                        $message = $message . ""$AMT[1]"數量不足，儲存失敗<br>";
                                        $sql = "UPDATE ORDMAS SET BACKCODE='1', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
                                }
                        }
                        if($message == null){
                                $_SESSION['ORIGIN'] = '1';
                                $queryEMAIL1 = "SELECT EMAIL FROM ORDMAS WHERE ORDNO='$ORDNO'";
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
                                $mail->Subject = "三三吾鄉出貨通知信"; //設定郵件標題        
                                $mail->Body = "親愛的三三客戶您好：<br>
                                <br>
                                您的訂單（編號 " . $ORDNO . "）已於今日出貨，故來信通知您，產品將於1-3日或依您指定時間到達。<br>
                                您所指定的到貨的時間及需求，我們已請貨運公司”盡量配合”您的需求，但物流過程因交通、配送路線等因素，無法保證一定可以完全依您指定時間到達，敬請見諒，提醒您，若收到貨款後發現有瑕疵，請務必保留原商品並儘速與我們聯絡，感謝您！<br>
                                <br>
                                您所訂購的商品或物流配送過程如有任何問題，都歡迎來信與我們聯絡：trisoap2015@gmail.com<br>
                                <br>
                                非常謝謝您對三三吾鄉的支持，歡迎您再次蒞臨本站！<br>
                                三三吾鄉社會企業<br>" .
                                $MAILDATE ; //設定郵件內容                
                                $mail->AddAddress("$queryEMAIL[0]"); //設定收件者郵件及名稱
                                if(!$mail->Send()) {        
                                    echo "Mail not sent!";        
                                }

                                echo '<meta http-equiv=REFRESH CONTENT=2;url=Update_ORDMAS_finish.php>';
                        }
                }
                mysql_query($sql);
                if($message == null)
                        echo "儲存成功";
                else
                        echo $message;
                echo '<meta http-equiv=REFRESH CONTENT=2;url=Update_ORDMAS_1.php>';
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