<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <title>三三社企-註冊</title>

        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="css/animate.css">
        <!-- Custom Stylesheet -->
        <link rel="stylesheet" href="css/style.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<?php session_start();
include("mysql_connect.php");
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
date_default_timezone_set('Asia/Taipei');
$MAILDATE = date("Y-m-d");

if($EMAIL == null){
        $message = $message . '電子信箱欄位不可空白 \n';
}
$queryEMAIL = "SELECT EMAIL FROM CUSMAS where EMAIL = '$EMAIL'";
$result = mysql_query($queryEMAIL);
$row = mysql_fetch_row($result);
if($row[0] != null){
        $message = $message . '此電子信箱已存在 \n';
}
if($CUSNM == null){
        $message = $message . '姓名欄位不可空白 \n';
}  
if($CUSPW1 == null || $CUSPW2 == null){
        $message = $message . '密碼欄位不可空白 \n';
}
if($CUSPW1 != $CUSPW2){
        $message = $message . '請重新確認您的密碼 \n';
}
if((strlen($CUSPW1) > 15) || (strlen($CUSPW2) > 15)){
        $message = $message . '密碼不可超過15字元 \n';
}
if((ctype_alnum($CUSPW1) == FALSE) || (ctype_alnum($CUSPW2) == FALSE)){
        $message = $message . '密碼必須為英數字 \n';
}
if($CUSTYPE == null){
        $message = $message . '膚質欄位不可空白 \n';
}
if($CUSBIRTHY == null || $CUSBIRTHM == null || $CUSBIRTHD == null){
        $message = $message . '生日欄位不可空白 \n';
}
if($KNOWTYPE == null){
        $message = $message . '如何認識三三欄位不可空白 \n';
}
$_SESSION['CUSNM'] = $CUSNM;
$_SESSION['CUSPW'] = $CUSPW1;
$_SESSION['CUSADD'] = $CUSADD;
$_SESSION['CUSTYPE'] = $CUSTYPE;
$_SESSION['CUSBIRTHY'] = $CUSBIRTHY;
$_SESSION['CUSBIRTHM'] = $CUSBIRTHM;
$_SESSION['CUSBIRTHD'] = $CUSBIRTHD;
$_SESSION['TEL'] = $TEL;
$_SESSION['EMAIL'] = $EMAIL;
$_SESSION['TAXID'] = $TAXID;
$_SESSION['KNOWTYPE'] = $KNOWTYPE;
$_SESSION['SPEINS'] = $SPEINS;
if($message == ''){
        //去除了數字0和1 字母小寫O和L，為了避免辨識不清楚
        $str = "23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ";
        $code = '';
        for ($i = 0; $i < 6; $i++) {
            $code .= $str[mt_rand(0, strlen($str)-1)];
        }
        $_SESSION['COMMIT'] = $code;

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
        $mail->Subject = "三三吾鄉會員註冊驗證碼"; //設定郵件標題        
        $mail->Body = "親愛的三三客戶您好：<br>
        <br>
        我們在此誠摯的感謝您註冊三三吾鄉成為會員，期望未來能有榮幸為您服務。<br>
        <br>
        您的會員註冊驗證碼為 " . $_SESSION['COMMIT'] . " ，請至原註冊頁面輸入以完成會員註冊。<br>
        <br>
        感謝您對三三吾鄉的支持。<br>
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
            ?>
            <script>
            alert("信件未寄出");
            </script>
            <?php       
        }
        ?>
<body>
        <div class="container">
                <div class="top">
                        <!--
                        <h1 id="title" class="hidden"><span id="logo">Daily <span>UI</span></span></h1>
                        -->
                </div>
                <div class="login-box animated fadeInUp">
                        <div class="box-header">
                                <h2>Sign Up</h2>
                        </div>
                        您的會員註冊驗證碼已寄至您的信箱，煩請您前往確認。<br>
                        <form name="form" method="post" action="Create_CUSMAS_end.php">
                                <label for="username">驗證碼*<input type="text" name="VERIFY" /></label><br>
                                <!--
                                <input type="submit" name="button" value="註冊" />
                                -->
                                
                        <!--
                                <label for="username">Username</label>
                                <br/>
                                <input type="text" id="username">
                                <br/>
                                <label for="password">Password</label>
                                <br/>
                                <input type="password" id="password">
                                <br/>
                        -->
                                <button type="submit">Commit</button>
                        <!--
                                <br/>
                                <a href="#"><p class="small">Forgot your password?</p></a>
                        -->
                        </form>
                        <button type="button"></buttom><a href="../Homepages/index.php">取消</a>
                </div>
        </div>
</body>

<script>
        $(document).ready(function () {
        $('#logo').addClass('animated fadeInDown');
        $("input:text:visible:first").focus();
        });
        $('#username').focus(function() {
                $('label[for="username"]').addClass('selected');
        });
        $('#username').blur(function() {
                $('label[for="username"]').removeClass('selected');
        });
</script>
    <?php
}
else{
        ?>
        <script>
            alert("<?echo $message;?>");
        </script>
        <?

        echo '<meta http-equiv=REFRESH CONTENT=2;url=Create_CUSMAS1.php>';
}
?>

</html>