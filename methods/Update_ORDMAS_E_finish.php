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
                $sql = "UPDATE ORDMAS SET ORDSTAT='$ORDSTAT', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
                if(mysql_query($sql)
                        echo "儲存成功";
                        $queryEMAIL1 = "SELECT EMAIL FROM ORDMAS WHERE ORDNO='$ORDNO'";
                        $queryEMAIL2 = mysql_query($queryEMAIL1);
                        $queryEMAIL = mysql_fetch_row($queryEMAIL2);
                        $queryName1 = "SELECT CUSNM FROM CUSMAS WHERE EMAIL='$queryEMAIL[0]'";
                        $queryName2 = mysql_query($queryName1);
                        $queryName = mysql_fetch_row($queryName2);

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
                        $mail->Subject = "三三吾鄉訂單處理通知信"; //設定郵件標題        
                        $mail->Body = "＊此信件為系統發出信件，請勿直接回覆，感謝您的配合。謝謝！＊<br>
                        <br>
                        親愛的會員您好：<br>
                        此封信件來自三三吾鄉，告知您三三吾鄉已接獲您此次的訂購需求，我們將以最快速度處理！<br>
                        感謝您對三三吾鄉的支持並承蒙您訂購我們的商品，以下資料是您本次的訂購清單明細，如有問題則請依訂單編號向我們查詢，並來信與我們聯絡，謝謝您！<br>
                        ＊以下幾件事情提醒您<br>
                                1. 三三吾鄉所有商品皆為堅持手作之冷製手工皂，冷製製程繁複需耗費相當多的時間以維持三三吾鄉商品之品質，如若遇缺貨時期還請您耐心等候。<br>
                                2. 三三吾鄉仍保有決定是否接受訂單及出貨與否之權利，出貨以及取貨通知函，將以E-mail方式通知您！<br>
                                3. 請再次確認您所填寫的聯絡資料是否正確，以確保貨品能正確送達到您手上。<br>
                                4. 如商品有任何瑕疵與毀損狀況，請保留發票，並寄信至我們的信箱trisoap2015@gmail.com與我們聯絡，並切勿丟棄商品，保留完整的到貨商品，我們將儘速和您聯繫。<br>
                        Dear TriSoap Member,<br>
                        This is a message from TriSoap SE.<br>
                        Please do not reply this mail directly.<br>
                        We would like to express our biggest appreciation to you that you book our commodities.<br>
                        We will try our best to deal with your booking case as soon as possible and we would like to deliver our sincere thankfulness for your waiting.<br>
                        <br>
                        Thank You.<br>
                        <br>
                        訂單編號：" . $ORDNO . "<br>
                        付款方式：xxxxxx<br>
                        收 件 人：" . $queryName[0] . "<br>
                        訂購商品名稱與數量：<br>";
                        $queryitem1 = "SELECT * FROM ORDITEMMAS WHERE ORDNO='$ORDNO'";
                        $queryitem2 = mysql_query($queryitem1);
                        while($queryitem = mysql_fetch_array($queryitem2)){
                            $mail->Body .= $queryitem['ITEMNO'];
                            $mail->Body .= " x ";
                            $mail->Body .= $queryitem['ORDAMT'];
                            $mail->Body .= "<br>";
                        }
                        $mail->Body .= "<br>
                        三三吾鄉堅持給你最好的服務，如有問題歡迎來信詢問<br>
                        三三吾鄉官方形象網站：http://www.trisoap.com.tw<br>
                        三三吾鄉團隊敬上<br>
                        <br>
                        --------------------反詐騙！三三吾鄉提醒您--------------------<br>
                        ★不操作ATM─  ATM並沒有解除分期付款的選項。<br>
                        ★不透露信用卡資料─  請勿隨意透露信用卡號與到期日。<br>
                        ★求證相關單位─  懷疑來電者身份，請撥警政署防詐騙專線165查證。<br>
                        "; //設定郵件內容                
                        $mail->AddAddress("$queryEMAIL[0]"); //設定收件者郵件及名稱
                        if(!$mail->Send()) {        
                            echo "Mail not sent!";        
                        }
                else
                        echo "儲存失敗";
                echo '<meta http-equiv=REFRESH CONTENT=2;url=Update_ORDMAS_E.php>';
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