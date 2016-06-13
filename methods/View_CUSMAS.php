<?php session_start(); ?>
<title>三三吾鄉手工皂 查看顧客</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null){
        if($CUSIDT == 'A'){
                $queryCustomer = "SELECT * FROM CUSMAS where CUSIDT='B'";
                $result = mysql_query($queryOrder);
                while($row = mysql_fetch_array($result)){
                        echo "電子信箱:".$row['EMAIL']." 顧客姓名:".$row['CUSNM']." 顧客地址:".$row['CUSADD']." 顧客膚質:".$row['CUSTYPE']." 顧客生日:".$row['CUSBIRTHY']."/".$row['CUSBIRTHM']."/"$row['CUSBIRTHD']" 電話號碼:".$row['TEL']." 信用狀態:".$row['CREDITSTAT']." 狀態:".$row['ACTCODE']." 建立日期:".$row['CREATEDATE']." 最後修改日期:".$row['UPDATETEDATE']."<br>";
                }
?>
<a href="../HomePages/index_manager.php">返回</a> <br>
<?php
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